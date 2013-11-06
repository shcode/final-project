<?php

Doo::loadController("BaseController");
Doo::loadModel("User");
Doo::loadModel("Listing");
Doo::loadModel("Bid");

class BidController extends BaseController
{

    function index()
    {
        Doo::loadHelper('DooPager');
        $page = $this->params['page'];

        $bid = new Bid();
        $bid->user_id = $this->session->user->user_id;

        $total = $listing->count($opt);
        $pager = new DooPager(Doo::conf()->APP_URL . 'bid', $total, 3, 10);

        $pager->prevText = 'Prev';
        $pager->nextText = 'Next';

        $this->data['bid'] = $bid->relateMany(array("User", "Listing"), array(
            "Bid" => array("limit")
        ));
    }

    function add_bid()
    {
        if (isset($_POST['value']) && isset($_POST['listing_id'])) {
            Doo::loadModel("User");
            Doo::loadModel("Listing");
            Doo::loadModel("Bid");

            $listing = new Listing();
            $listing->limit = "first";
            $listing->listing_id = $_POST['listing_id'];
            $hasil = $listing->relateBid(array(
                "desc" => "bid.created_at",
                "limit" => "first"
            ));

            $response = array("status" => false);

            if ($hasil->user_id == $this->session->user->user_id) {
                $response['message'] = "Penjual tidak boleh bid listing sendiri";
            } else if ($hasil->Bid && ($hasil->Bid[0]->user_id == $this->session->user->user_id)) {
                $response['message'] = "Penawaran anda masih memimpin lelang";
            } else if ($hasil->Bid && ($_POST['value'] - $hasil->Bid[0]->value) < $hasil->min_bid) {
                $response['message'] = "Bid anda kurang dari minimum bid";
            } else if (!$hasil->Bid && ($_POST['value'] - $hasil->price) < $hasil->min_bid) {
                $response['message'] = "Bid anda kurang dari minimum bid";
            } else if (strtotime($hasil->end_date) < (time() - 24 * 60 * 60)) {
                $response['message'] = "Lelang telah ditutup " . $hasil->end_date;
            } else if (strtotime($hasil->start_date) > (time() - 24 * 60 * 60)) {
                $response['message'] = "Lelang belum dibuka";
            } else {
                Doo::loadCore('db/DooDbExpression');
                $response['message'] = "Anda berhasil memimpin lelang";
                $response['status'] = true;

                $bid = new Bid();
                $bid->value = $_POST['value'];
                $bid->user_id = $this->session->user->user_id;
                $bid->listing_id = $_POST['listing_id'];
                $bid->created_at = new DooDbExpression('NOW()');

                $bid->insert();

                $log = new Log();
                $log->user_id = $this->session->user->user_id;
                $log->logs = "[user@" . $this->session->user->user_id . "] telah menawar lelang dengan ID [listing@" . $_POST['listing_id'] . "]";
                $log->log_info = "Buat Listing Baru";
                $log->created_at = $now;
            }

            echo json_encode($response);
        }
    }

    function cancel_bid()
    {

    }

}

?>