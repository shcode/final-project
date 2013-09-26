$(document).ready(function(){
    $("[data-hide]").on("click", function(){
        $(this).closest("." + $(this).attr("data-hide")).hide();
    });
    var validator = $('#reg-form').validate({
        groups: {
            start_date: "start_date1 start_date2",
            end_date: "end_date1 end_date2",
            range: "range_time range_value"
        },
        rules : {
            title: "required",
            description: "required",
            type_id: "required",
            listing_type: "required",
            land: {
                min: 1
            },
            building:{
                min: 1
            },
            bed:{
                min: 1
            },
            bath:{
                min: 1
            },
            maid_bed:{
                min: 1
            },
            maid_bath:{
                min: 1
            },
            electricity: {
                min: 1
            },
            price: {
                required: "#jenis option:selected[class='req-price']",
                min: 1
            },
            range_value:{
                required: "#jenis option:selected[value='Sewa']",
                min: 1
            },
            range_time: {
                required: "#jenis option:selected[value='Sewa']"
            },
            start_price: {
                required: "#jenis option:selected[value='Lelang']",
                min: 1,
            },
            min_bid: {
                required: "#jenis option:selected[value='Lelang']", 
                min: 1,
            },
            start_date1: {
                required: "#jenis option:selected[value='Lelang']"
            },
            start_date2: {
                required: "#jenis option:selected[value='Lelang']"
            },
            end_date1: {
                required: "#jenis option:selected[value='Lelang']"
            },            
            end_date2: {
                required: "#jenis option:selected[value='Lelang']"
            }            
        },
        messages : {
            title: "- Judul belum diisi.",
            description: "- Deskripsi belum diisi.",
            type_id: "- Jenis Properti harus diisi",
            listing_type: "- Jenis Iklan harus diisi",  
            land: {
                min: "- Input untuk Luas Tanah salah.",
            },
            building:{
                min: "- Input untuk Luas Bangunan salah.",
            },
            bed:{
                min: "- Input untuk Jumlah Kamar Tidur salah.",
            },
            bath:{
                min: "- Input untuk Jumlah Kamar Mandi salah.",
            },
            maid_bed:{
                min: "- Input untuk Jumlah Kamar Tidur Pembantu salah.",
            },
            maid_bath:{
                min: "- Input untuk Jumlah Kamar Mandi Pembantu salah.",
            },
            electricity: {
                min: "- Input untuk Listrik salah.",
            },
            price: {
                required: "- Harga belum diisi.",
                min: "- Input untuk Harga salah." 
            },
            range_value:{
                required: "- Jangka Waktu belum diisi.",
                min: "- Input untuk Jangka Waktu salah."
            },
            range_time: {
                required: "- Jangka Waktu belum diisi."
            },
            start_price: {
                required: "- Harga Awal belum diisi.",
                min: "- Input untuk Harga Awal salah."
            },
            min_bid: {
                required: "- Minimal Bid belum diisi.",
                min: "- Input untuk Minimal Bid salah."
            },
            start_date1: {
                required: "- Waktu Mulai belum diisi."
            },
            start_date2: {
                required: "- Waktu Mulai belum diisi."
            },
            end_date1: {
                required: "- Waktu Berakhir belum diisi.",
            },
            end_date2: {
                required: "- Waktu Berakhir belum diisi.",
            }
        },
        errorLabelContainer: $(".alert"),
        onkeyup: false,
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#jenis").change(function(){
        if($(this).val() == "Lelang")
        {
            $("#untuk-lelang").show();
            $("#untuk-jual-sewa").hide();
            $("#untuk-sewa").hide();

            $("#untuk-jual-sewa input").val("");
            $("#untuk-sewa input").val("");

        }
        else if($(this).val() == "Sewa")
        {
            $("#untuk-lelang").hide();
            $("#untuk-jual-sewa").show();
            $("#untuk-sewa").show();

            $("#untuk-lelang input").val("");
        }
        else
        {
            $("#untuk-lelang").hide();
            $("#untuk-jual-sewa").show();
            $("#untuk-sewa").hide();  

            $("#untuk-lelang input").val("");
            $("#untuk-sewa input").val("");
            $("#untuk-sewa select").val("");
        }
    })
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });

    $(".timepicker").timepicker({});    

})
