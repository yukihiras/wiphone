function addTaiSanCon() {
    $('#myModal').modal('show');
}
function addSoLuongTS() {
    $('#myModalTS').modal('show');
}
function updateTaiSanCon() {
    $('#updateModal').modal('show');
    event.target;
    console.log(event.target.value);
}
function huy()
{
    $('.alert-danger').hide();
    $('#open').hide();
    $('#myModal')
        .find("input,textarea,select")
        .val('')
        .end()
    $('#myModal').find("select").val(null).trigger("change");
    // $('select[name=nguon_kinh_phi]').val(null).trigger("change");

    $('#myModal').modal('hide');
    // $('#myModal').empty();

}
function huyTS()
{
    $('.alert-danger').hide();
    $('#open').hide();
    $('#myModalTS')
        .find("input,textarea,select")
        .val('')
        .end()
    $('#myModalTS').find("select").val(null).trigger("change");
    // $('select[name=nguon_kinh_phi]').val(null).trigger("change");

    $('#myModalTS').modal('hide');
    // $('#myModal').empty();

}
function huyls()
{
    $('.alert-danger').hide();
    $('#open').hide();
    $('#historyModal')
        .find("input,textarea,select")
        .val('')
        .end()
    $('#historyModal').find("select").val(null).trigger("change");
    // $('select[name=nguon_kinh_phi]').val(null).trigger("change");

    $('#historyModal').modal('hide');
    // $('#myModal').empty();

}

function addLichSuSuaChua(){
    $('#historyModal').modal('show');
}
$(document).ready(function () {
    $('.daterangepicker-click').daterangepicker({
        autoUpdateInput: false,
        autoApply:false,
        locale: {
            format: 'D/M/Y',
            cancelLabel: 'Clear',

        }
    }, function (start, end, label) {
        // let d = start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY');
        // that[name_data].thoi_gian = d;
        // this.startDate = start;
        // this.endDate = end;
        // $(this).val(d);
        // console.log( this);
    });
    $('.daterangepicker-click').on('apply.daterangepicker', function (ev, picker) {
        let d = picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY');
        // that[name_data].thoi_gian = d;
        $(this).val(d);
    });

    $('.daterangepicker-click').on('cancel.daterangepicker', function (ev, picker) {
        // that[name_data].thoi_gian = '';
        $(this).val('');
    });

    $('#saveTaiSanCon').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var datastring = $("#preview_form").serialize();
        console.log(datastring);
        $.ajax({
            url: "/soluongtaisan/add",
            method: 'post',
            data: datastring,
            success: function(result){
                if(result.errors)
                {
                    $('.alert-danger').html('');
                    $.each(result.errors, function(key, value){
                        $('.alert-danger').show();
                        $('.alert-danger').append('<li>'+value+'</li>');
                    });
                }
                else
                {
                    $('.alert-danger').hide();
                    $('#open').hide();
                    $('#myModal').modal('hide');
                    location.reload();
                }
            }});
    });
    $('#saveLichSuSuaChua').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var datastring = $("#preview_form").serialize();
        console.log(datastring);
        $.ajax({
            url: "/lichsusuachua/add",
            method: 'post',
            data: datastring,
            success: function(result){
                if(result.errors)
                {
                    $('.alert-danger').html('');
                    $.each(result.errors, function(key, value){
                        $('.alert-danger').show();
                        $('.alert-danger').append('<li>'+value+'</li>');
                    });
                }
                else
                {
                    $('.alert-danger').hide();
                    $('#open').hide();
                    $('#historyModal').modal('hide');
                    location.reload();
                }
            }});
    });
    $( "#btnXacNhan" ).click(function() {
        Swal.fire({
            title: 'Thông tin học phí của bạn đúng chưa ?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Đúng`,
            denyButtonText: `Sai`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            var is_xac_nhan = 0 ;
            if (result.isConfirmed) {
                // Swal.fire('Saved!', '', 'success')
                is_xac_nhan = 1;
            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
                is_xac_nhan = 2;
            }
            var dataId = $(this).attr("data-id");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/apps/hoc-vien/ajax-cap-nhat-hoc-phi",
                method:"POST", //First change type to method here
                data:{
                    item_id: dataId,
                    is_xac_nhan:is_xac_nhan
                },
                success:function(response) {
                    // console.log(response.status)
                    if (response.status === 1)
                    {
                        Swal.fire('Xác nhận thông tin học phí của bạn là đúng!', '', 'success')
                    }
                    else if (response.status === 2)
                    {
                        Swal.fire('Xác nhận thông tin học phí của bạn là sai!', '', 'info')
                    }
                },
                error:function(){
                   console.log("Error")
                }

            });
        })
    });

    var progressbar     = $('.progress-bar');

    function validate(formData, jqForm, options) {
        var form = jqForm[0];

        if (!form.file_bai_lam.value) {
            //swal("Thông báo!", "Chưa có bài thi của bạn", "danger");
            Swal.fire({
                icon: 'error',
                title: 'Lỗi ...',
                text: 'Chưa có bài thi để nộp',
            })
            return false;
        }

        if (form.file_bai_lam.files[0].size > 304857600)
        {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi ...',
                text: 'Dung lượng bài thi không vượt quá 300MB',
            })
            return false;
        }
    }
    // var bar = $('.bar');
    // var percent = $('.percent');
    // var status = $('#status');
    //đồng hồ tính giờ
    function makeTimer(interval) {

        //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
        // var endTime = new Date("2 June 2021 23:42:00");
            var  endTime = $('#thoi_gian_ket_thuc').val();
            var startTime = $('#thoi_gian_bat_dau').val();
        // endTime = (Date.parse(endTime) / 1000);
        // console.log(endTime)
        var now = new Date();
        now = (Date.parse(now) / 1000);
        if (startTime > now)
        {
            $("#days").html( "<span class='text-blue'>Chưa đến giờ làm bài</span>")
        }
        else {
            var timeLeft = endTime - now;
            if (timeLeft < 0) {
                $("#days").html("<span>Hết thời gian làm bài</span>")
                $("#hours").empty();
                $("#minutes").empty();
                $("#seconds").empty();
                clearInterval(interval)
                return false;
            }
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }

            $("#days").empty();
            $("#hours").html(hours + ":");
            $("#minutes").html(minutes + ":");
            $("#seconds").html(seconds);
        }

    }

  var interval =  setInterval(function() { makeTimer(interval); }, 1000);
    $(".upload-image").click(function(e){
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/apps/hoc-vien/thi-online/ajax-kiem-tra-nop-bai",
            method:"POST", //First change type to method here
            data:{
                item_id: $("#idHocVien").val(),
                // is_xac_nhan:is_xac_nhan
            },
            success:function(response) {
                if (response.status == 1)
                {
                    Swal.fire('Đã hết thời gian nộp bài', '', 'info')
                    return false;
                }
                else
                {
                    $(".form-horizontal").ajaxForm(
                        {
                            beforeSubmit: validate,
                            // beforeSend: function() {
                            //     status.empty();
                            //     var percentVal = '0%';
                            //     var posterValue = $('input[name=file_bai_lam]').fieldValue();
                            //     bar.width(percentVal)
                            //     percent.html(percentVal);
                            // },
                            // uploadProgress: function(event, position, total, percentComplete) {
                            //     var percentVal = percentComplete + '%';
                            //     bar.width(percentVal)
                            //     percent.html(percentVal);
                            // },
                            // success: function() {
                            //     var percentVal = 'Wait, Saving';
                            //     bar.width(percentVal)
                            //     percent.html(percentVal);
                            // },
                            // complete: function(xhr) {
                            //     // status.html(xhr.responseText);
                            //     alert('Uploaded Successfully');
                            //     // window.location.href = "/file-upload";
                            // }
                            // target: '.preview',
                            beforeSend: function() {
                                $(".progress").css("display","block");
                                progressbar.width('0%');
                                progressbar.text('0%');
                            },
                            uploadProgress: function (event, position, total, percentComplete) {
                                // console.log(total)
                                // var  percentText = Math.round(x * 100 / percentComplete);
                                var progress = Math.round(event.loaded * 100 / event.total);
                                $('.upload-image').prop('disabled', true);
                                progressbar.width(progress + '%');
                                progressbar.text(progress + '%');
                                // var percentValue = percentComplete + '%';
                                // if(percentText == "100") {
                                //     $("#outputImage").show();
                                // }

                            },
                            complete: function(xhr) {
                                console.log(xhr.responseText)
                                // status.html(xhr.responseText);

                                Swal.fire({
                                    // position: 'top-end',
                                    icon: 'success',
                                    title: 'Nộp bài thi thành công',
                                    showConfirmButton: false,
                                    timer: 5000
                                }).then(() => {
                                    var idHocVien = $('#idHocVien').val();
                                    location.href = "/apps/hoc-vien/thi-online/"+idHocVien;
                                })

                            }

                        })
                        .submit();
                }
                // else
                // {
                //     location.href = 'file-bai-thi/' + response.de_thi_id;
                // }
                // console.log(dataId)
                // location.href = 'file-bai-thi/'+1;
                // if (response.status === 1)
                // {
                //     Swal.fire('Xác nhận thông tin học phí của bạn là đúng!', '', 'success')
                // }
                // else if (response.status === 2)
                // {
                //     Swal.fire('Xác nhận thông tin học phí của bạn là sai!', '', 'info')
                // }
            },
            error:function(){
                console.log("Error")
            }

        });

    });
    if ($('.appTuyenSinh').length > 0) {
        let current_hk_huyen = $('#_current_hk_huyen').val();
        let current_hk_tinh = $('#_current_hk_tinh').val();
        if(current_hk_tinh!='')
            loadH(current_hk_tinh,current_hk_huyen);
        let showHide = value => {
            if(parseInt(value)==6){
                $('#sinhvien').hide();
                $('#nguoidilam').show();
            }
            else if(parseInt(value)==7){
                $('#sinhvien').hide();
                $('#nguoidilam').hide();
            }
            else{
                $('#sinhvien').show();
                $('#nguoidilam').hide();
            }
        };
        $('.datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'});
        $('#hk_tinh').change(function () {
            loadH($(this).val());
        });
        let doituong = $('#doi_tuong').val();
        showHide(doituong);
        $('#doi_tuong').change(function () {
            showHide($(this).val());
        });
    }
});
