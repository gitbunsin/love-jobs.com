   // Edit Emergency Contact
   function EditEmergencyContact(id) {

    $('#EditEmergencyContacts').modal('show');
    $('#emergency_contacts_edit').val(id);
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax(
        {
            url: "{{url('admin/employee/show/emergency/contact')}}" + "/" + id,
            type: 'GET',
            data: {

                "id": id,
                "_token": token
            },
            success: function (data){

                $('#name_edit').val(data.name);
                $('#relationship_edit').val(data.relationship);
                $('#work_telephone_edit').val(data.work_telephone);
                $('#home_telephone_edit').val(data.home_telephone);
                $('#mobile_edit').val(data.mobile);

            }
        });
}

// Edit
$('#frmEditEmergencyContacts').validate({ // initialize the plugin
    rules:{
        name_edit : {
            required : true
        },
        relationship_edit : {

            required : true
        }
    },
    submitHandler: function (form) { // for demo

        let token = $("meta[name='csrf-token']").attr("content");

        let id = $('#emergency_contacts_edit').val();
       

        $.ajax(
            {
                url: "{{url('admin/employee/update/emergency/contact')}}" + "/" +  id ,
                type: 'POST',
                data: {

                    "id": id,
                    "employee_id": $('#employee_id').val(),
                    "name" : $('#name_edit').val(),
                    "relationship" : $('#relationship_edit').val(),
                    "mobile" : $('#mobile_edit').val(),
                    "work_telephone" : $('#work_telephone_edit').val(),
                    "home_telephone" : $('#home_telephone_edit').val(),
                    "_token": token

                },
                success: function (data){

                        let ul =

                        "<ul id='ul_emergency_contact' class='ul_id"+data.id+" list'>" +
                        "<li class='manage-list-row clearfix'>" +
                        "<div class='job-info'>" +
                        "<div class='job-details'>" +
                        "<h3 class='job-name'></h3>" +
                        "<small class='job-company'><b>Name :</b> " + data.name + "  </small>" +
                        "<small class='job-company'></i><b>Relationship :</b> " + data.relationship + " </small>" +
                        "<small class='job-update'><i class='ti-time'></i><b>Mobile : </b> " + data.mobile + "  </small>" +
                        "<span class='j-type part-time'></span>" +
                        "</div>" +
                        "</div>";
                        ul += "<div class='job-buttons'><a href='#' onclick='EditEmergencyContact(" + data.id + ");'  class='btn btn-gary manage-btn' data-toggle='tooltip' data-placement='top' title='Edit'><i class='ti-pencil-alt'></i></a></td>"
                        ul += "<a href='#' data-id='" + data.id + "' onclick='DeleteEmergencyContact(this);' class='btn btn-cancel manage-btn' data-toggle='modal' data-placement='top'><i class='ti-close'></i></a></div></li></ul>";

                    $('#ul_emergency_contact').replaceWith(ul);
                    $('#EditEmergencyContacts').modal('hide');
                    toastr.success('Emergency Contacts has been edit  success !.', 'Success ', {timeOut: 5000})

                },error:function (err) {

                   console.log(err);
                }
            });
    }
});



//Emergency Contact
function ShowEmergencyContacts(m) {

    $('#frmShowEmergencyContacts').trigger("reset");
    let id = $(m).data("id");
    $('#ShowEmergencyContacts').modal('show');
    $('#employee_assign_emergency_contacts').val(id);

}

function DeleteEmergencyContact(mm)
{
    let id = $(mm).data("id");
    $('#DeleteEmergencyContact').modal('show');
    $('#emergency_contact_id').val(id);
}


//Deleted Emergency Contact
$('#frmDeleteEmergencyContact').validate({ // initialize the plugin
    submitHandler: function (form) { // for demo

        let token = $("meta[name='csrf-token']").attr("content");

        let id = $('#emergency_contact_id').val();

        console.log(id);

        $.ajax(
            {
                url: "{{url('admin/employee/delete/emergency/contact')}}" + "/" + id,
                type: 'DELETE',
                data: {

                    "id": id,
                    "_token": token
                },
                success: function (data){

                    $('.ul_id'+data.id).remove();
                    $('#DeleteEmergencyContact').modal('hide');
                    toastr.success('Emergency Contacts has been deleted  successfully !.', 'Success ', {timeOut: 5000})

                }
            });
    }
});

// Add
$('#frmShowEmergencyContacts').validate({ // initialize the plugin
    rules:{
        name : {
            required : true
        },
        relationship : {

            required : true
        }
    },
    submitHandler: function (form) { // for demo

        let token = $("meta[name='csrf-token']").attr("content");

        let id = $('#employee_assign_emergency_contacts').val();

        $.ajax(
            {
                url: "{{url('admin/employee/add/emergency/contact')}}" ,
                type: 'POST',
                data: {

                    "id": id,
                    "name" : $('#name').val(),
                    "relationship" : $('#relationship').val(),
                    "mobile" : $('#relationship').val(),
                    "work_telephone" : $('#work_telephone').val(),
                    "home_telephone" : $('#home_telephone').val(),
                    "_token": token

                },
                success: function (data){

                    $('#body_emergency').append(
                        "<ul id='ul_emergency_contact' class='ul_id"+data.id+" list'>" +
                        "<li class='manage-list-row clearfix'>" +
                        "<div class='job-info'>" +
                        "<div class='job-details'>" +
                        "<h3 class='job-name'></h3>" +
                        "<small class='job-company'><b>Name :</b> " + data.name + "  </small>" +
                        "<small class='job-company'></i><b>Relationship :</b> " + data.relationship + " </small>" +
                        "<small class='job-update'><i class='ti-time'></i><b>Mobile : </b> " + data.mobile + "  </small>" +
                        "<span class='j-type part-time'></span>" +
                        "</div>" +
                        "</div>" +
                        "<div class='job-buttons'>" +
                        "<a href='#' onclick='EditEmergencyContact(" + data.id + ");'  class='btn btn-gary manage-btn' data-toggle='tooltip' data-placement='top' title='Edit'><i class='ti-pencil-alt'></i></a>" +
                        "<a href='#' data-id='" + data.id + "' onclick='DeleteEmergencyContact(this);' class='btn btn-cancel manage-btn' data-toggle='modal' data-placement='top'><i class='ti-close'></i></a>" +
                        "</div>" +
                        "</li>" +
                        "</ul>");

                    $('#ShowEmergencyContacts').modal('hide');
                    toastr.success('Emergency Contacts has been added  success !.', 'Success ', {timeOut: 5000})
                },error : function(err){
                    console.log(err);
                }
            });
    }
});
































//show
function  ShowEmployeeAttachment(xx){

    let id = $(xx).data("id");
    $('#AddJobAttachment').modal('show');
    $('#employee_attachment_id').val(id);


}

//delete
function DeleteVacancyAttachment(xxxxx){

    let id = $(xxxxx).data("id");
    $('#Delete').modal('show');
    $('#attachment_id').val(id);

}

$(document).ready(function () {

    $('#frmDeleteJobAttachment').validate({ // initialize the plugin

        submitHandler: function (form) { // for demo

            let token = $("meta[name='csrf-token']").attr("content");

            let id = $('#attachment_id').val();

            $.ajax(
                {
                    url: "{{url('admin/employee/delete/attachment')}}" +"/"+ id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data){

                        if(data == "success"){

                            let concatId = 'tbl_attachment'+id;
                            concatId = concatId.replace(/\s/g, '');
                            document.getElementById(concatId).remove();

                            $('#Delete').modal('hide');
                            toastr.success('Attachment Delete success !.', 'Success ', {timeOut: 5000})

                        }
                    }
                });
        }
    });



    $('#frmJobAttachment').validate({ // initialize the plugin

        rules: {
            file : {

                required : true
            }
        },
        submitHandler: function (form) { // for demo

            let id = $('#employee_attachment_id').val();

            let file_data = $('#file').prop('files')[0];

            let form_data = new FormData();

            form_data.append('file', file_data);

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                url: "{{url('admin/employee/add/attachment')}}" +"/"+ id,
                data: form_data,
                type: 'POST',
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,

                success: function (data){

                    console.log(data);

                    if(data == "success"){

                        $('#AddJobAttachment').modal('hide');
                        toastr.success('Attachment uploaded success  !.', 'Success ', {timeOut: 5000})

                        setTimeout(function(){
                            window.location.reload(1);
                        }, 3000);
                    }
                },error : function (err) {

                    console.log(err);

                }
            });
        }
    });

    // update contact details
    $('#frmContactDetails').validate({ // initialize the plugin
        rules : {
            mobile : {
                required : true
            },
            work_email :
                {
                    required: true
                },
            street1 : {
                required: true

            }
        },
        submitHandler: function (form) { // for demo

            let id = $('#employee_id').val();
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajax(
                {
                    url: "{{url('admin/employee/update/contact')}}" +"/"+ id,
                    type:"POST",
                    data: {
                        "id": id,
                        "_token": token,
                        "mobile" : $('#mobile').val(),
                        "work_email" : $('#work_email').val(),
                        "street1" : $('#street1').val(),
                        "street2" : $('#street2').val(),
                        "city_code" : $('#city_code').val(),
                        "country_code" : $('#country_code').val(),
                        "province_code" : $('#province_code').val(),
                        "zip_code" : $('#zip_code').val(),
                        "telephone" : $('#telephone').val(),
                        "work_telephone" : $('#work_telephone').val(),
                        "other_email" : $('#other_email').val(),
                    },
                    success: function (data){

                        console.log(data);
                        toastr.success('Employee update success !.', 'Success ', {timeOut: 5000})

                    },error : function (err) {

                        console.log(err);
                    }
                });
        }
    });


    //update Employee Details
    $('#frmEmployeeDetails').validate({ // initialize the plugin
        rules : {
            gender : {
                required : true
            },
            marital_status :
                {
                    required: true
                },
            first_name : {

                required : true
            },
            last_name : {

                required : true
            }
        },
        submitHandler: function (form) { // for demo

            let id = $('#employee_id').val();
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajax(
                {
                    url: "{{url('admin/employee/update')}}" +"/"+ id,
                    type:"POST",
                    data: {
                        "id": id,
                        "_token": token,
                        "first_name" : $('#first_name').val(),
                        "last_name" : $('#last_name').val(),
                        "middle_name" : $('#middle_name').val(),
                        "gender" : $('#gender').val(),
                        "marital_status" : $('#marital_status').val(),
                        "other_id" : $('#other_id').val(),
                    },
                    success: function (data){

                        toastr.success('Employee update success !.', 'Success ', {timeOut: 5000})

                    },error : function (err) {

                        console.log(err);
                    }
                });
        }
    });


    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

});