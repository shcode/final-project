var marker;
var map;
var lng;
var lat;
function initialize() {
    lat = $("#latitude");
    lng = $("#longitude");
    latlng = new google.maps.LatLng(-7.2929, 112.7298);
    var mapOptions = {
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: latlng
    };
    map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);
    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
    });

    google.maps.event.addListener(marker, 'drag', function(e){
        $ll = marker.getPosition();
    
        lng.val($ll.lng());
        lat.val($ll.lat());
    });     
}

function mapUpdate()
{
    $ll = new google.maps.LatLng(lat.value, lng.value);

    marker.setPosition($ll);
    map.setCenter($ll);
}

function mapUpdateAddress()
{
    var propinsi    = $("#propinsi option:selected").text();
    var kota        = $("#kota option:selected").text();
    var kecamatan   = $("#kecamatan option:selected").text(); 
    var alamat      = $("#alamat").val();
    if(propinsi == "Pilih Propinsi" || kota == "Pilih Kota/Kab." || kecamatan == "Pilih Kecamatan" || alamat == "")
        console.log("Empty");
    else
    {
        address = alamat + ", " + kecamatan + ", " + kota + ", " + propinsi + ", Indonesia";
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                latlng = results[0].geometry.location;
                map.setCenter(latlng);
                map.setZoom(15);
                marker.setPosition(latlng);
                lng.val(latlng.lng());
                lat.val(latlng.lat());
            }
        });
    }
}

$(document).ready(function(){
    initialize();
    App.initFancybox();

    $("[data-hide]").on("click", function(){
        $(this).closest("." + $(this).attr("data-hide")).hide();
    });    

    var uploader = $('#uploader').fineUploader({
        request: {
            endpoint: '/proses/upload'
        },
        deleteFile: {
            enabled: true,
            endpoint: '/proses/delete'
        },
        text: {
            uploadButton: '<div class="btn-block"><i class="icon-upload icon-white"></i> Upload File</div>'
        },    
        template: '<div class="qq-uploader span12">' +
                  '<pre class="qq-upload-drop-area span12"><span>{dragZoneText}</span></pre>' +
                  '<div class="controls"><div class="qq-upload-button btn btn-success span12">{uploadButtonText}</div></div>' +
                  '<span class="qq-drop-processing"><span>{dropProcessingText}</span><span class="qq-drop-processing-spinner"></span></span>' +
                  '<ul class="qq-upload-list" style="margin: 30px 10px 10px 10px; text-align: center;"></ul>' +
                '</div>',
        classes: {
            success: 'alert alert-success',
            fail: 'alert alert-error'
        }
    }).on('complete', function (event, id, name, responseJSON) {
        var uuid = $(this).fineUploader("getUuid", id),
            $fileEl = $(this).fineUploader("getItemByFileId", id),
            $viewBtn = $("<a>Close</a>");

        if (responseJSON.success) {
            $viewBtn.addClass("btn btn-small");
            $viewBtn.attr("data-dismiss", "alert");

            $($fileEl).find(".qq-upload-status-text").before($viewBtn);

        var html = '<li class="span3">' +
                        '<a class="thumbnail fancybox-button zoomer" data-rel="upload-image" title="Gambar #' + (id + 1) + '" href="{{rootUrl}}global/img/upload/' + responseJSON.uploadName + '">' +
                            '<div class="overlay-zoom">' +
                                '<img src="{{rootUrl}}global/img/upload/resize/' + responseJSON.nameRaw + '_120x76.jpg" alt="">' +
                                '<div class="zoom-icon"></div>' +
                            '</div>' +
                        '</a>' +
                        '<input name="image[]" type="hidden" value="'+responseJSON.uploadName+'" />' +                         
                    '</li>';
            $(".thumbnails").append(html);
            //App.initFancybox();
        }        
    });

    var validator = $('#reg-form').validate({
        rules : {
            address: "required",
            province_id: "required",
            district_id: "required",
            subdistrict_id: "required",
            zip_code: {
                required: true,
                min: 0
            },
            longitude: {
                required: true
            },
            latitude: {
                required: true
            },
        },
        messages : {
            address: "- Alamat belum diisi.",
            province_id: "- Propinsi belum diisi.",
            district_id: "- Kota belum diisi.",
            subdistrict_id: "- Kecamatan belum diisi.",
            zip_code: {
                required: "- Kode Pos belum diisi.",
                min: "- Kode Pos harus berupa angka."
            },
            longitude: {
                required: "- Longitude belum diisi."
            },
            latitude: {
                required: "- Latitude belum diisi." 
            },
        },
        errorLabelContainer: $(".alert"),
        onkeyup: false,
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#propinsi").change(function(){
        $.getJSON("/proses/getkota", {
            id: $(this).val()
        },function(json){
            var html = "<option value=''>Pilih Kota/Kab</option>";
            for(var i = 0; i < json.length; i++)
            {
                html +=  "<option value='" + json[i].district_id + "'>" + json[i].name + "</option>";
            }
            $("#kota").html(html).removeAttr("readonly");
            $("#kecamatan").html("<option value=''>Pilih Kecamatan</option>").attr("readonly", "readonly");
            mapUpdateAddress();
        })
    });    
    $("#kota").change(function(){
        $.getJSON("/proses/getkecamatan", {
            id: $("#propinsi").val(),
            idkota: $(this).val()
        },function(json){
            var html = "<option value=''>Pilih Kecamatan</option>";
            for(var i = 0; i < json.length; i++)
            {
                html +=  "<option value='" + json[i].subdistrict_id + "'>" + json[i].name + "</option>";
            }
            $("#kecamatan").html(html).removeAttr("readonly");
            mapUpdateAddress();
        })
    });
})