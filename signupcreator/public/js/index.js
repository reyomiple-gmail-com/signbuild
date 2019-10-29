// var server = location.protocol+'//'+location.host+'/project/signupcreator';
var server = location.protocol+'//'+location.host+'/signupcreator';


$(document).ready(function () {

    $('.s-elem').on('click', elementHTML);

    let sID = 1;

    function elementHTML(e) {
        e.preventDefault();

        let elemKey = $(this).attr('tagID');
        console.log(elemKey);
        let row = '';
        switch (elemKey) {
            case '1':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Text Box</label>
                              <input type="text" class="form-control" >
                          </div>
                       </div>`;

                break;
            case '2':

                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input ">
                              <label id="lb_` + sID + `">text label</label>
                              <textarea class="form-control" id="tag_` + sID + `"></textarea>
                          </div>
                       </div>`;

                break;
            case '3':

                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input ">
                              <label id="lb_` + sID + `">text label</label>
                              <select class="form-control">
                                <><>
                            </select>
                          </div>
                       </div>`;

                break;
            case '4':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Email</label>
                              <input type="email" class="form-control" >
                          </div>
                       </div>`;

                break;
            case '5':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Password</label>
                              <input type="password" class="form-control" >
                          </div>
                       </div>`;

                break;

            case '6':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Telphone</label>
                              <input type="tel" class="form-control" >
                          </div>
                       </div>`;

                break;

            case '7':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Number</label>
                              <input type="number" class="form-control" >
                          </div>
                       </div>`;

                break;


                break;

            default:
                row = alert('N/A');
                break;
        }
        appendElements(row);

    }

    function appendElements(row) {
        sID++;

        $('#basicInfo').append(row);

        $('.row-holder').on('click', appendEditContainer);
    }




    let btnCreateForm = $('#createForm');

    btnCreateForm.on('click', function () {

        let formName = $('.form-name').val();

        let formId = formName.replace(" ", "_");

        setForm(formId);

        $('#startup').addClass('hide');
        $('#formIndex').removeClass('hide');

    });

    function setForm(formId) {

        let id = formId;


    }



    const ul = $('.components');

    function goToTab(i) {
        console.log(i);

        const btnTab = $('#sectionTabs button');
        //        const btnTab2 = $('#fieldTabs li');
        //        $("fieldset:eq(" + i + ")").removeClass("hide");
        $("#fieldsets fieldset").eq(i).removeClass("hide").siblings().addClass("hide");

        btnTab.eq(i).addClass("active").siblings().removeClass("active");
        //        btnTab2.eq(i).addClass("active").siblings().removeClass("active");
    }


    $("#sectionTabs button").on("click", function (e) {

        let i = $(this).index();

        if (!$(this).hasClass("active")) {
            goToTab(i);
        } else {
            goToTab(i);
        }
    });

    function goToTab2(i) {
        console.log(i);


        const btnTab2 = $('#fieldTabs li');

        $(".sub-fields fieldset").eq(i).removeClass("hide").siblings().addClass("hide");


        btnTab2.eq(i).addClass("active").siblings().removeClass("active");
    }


    $("#fieldTabs li").on("click", function (e) {

        let i = $(this).index();
        console.log(i);
        if (!$(this).hasClass("active")) {
            goToTab2(i);
        } else {
            goToTab2(i);
        }
    });



    var calledonetime = false;

    function appendEditContainer(e) {
        e.preventDefault();
        $(this).siblings().removeClass('is-active');
        $(this).addClass('is-active');

        let id = $(this).attr('id');
        let textLabel = $(this).find('label').text();

        let lastChar = id.substr(id.length - 1);

        //         text box appearance

        let lable = 'set_label_' + lastChar + ''; // LABEL
        let BtnDelete = 'delete_' + lastChar + ''; //Delete row Button
        let dfValue = 'set_val_' + lastChar + ''; // DEFAULT VALUE
        let inst = 'set_val_' + lastChar + ''; // INSTRUCTIONS
        let require = 'set_req_' + lastChar + ''; // INSTRUCTIONS

        //        return false;


        let inputContainer = `
            <div class="row">
                <div class="col">
                    <button class="btn btn-full btn-danger deleteRow" id="` + BtnDelete + `"  >Delete</button>
                </div>
            </div>
             <br><br>
        <div class="text-group ">
         

            <div class="row">
                <div class="col">
                    <div class="form-group change-label-name">
                        <label for="label"  class="component-title">LABEL</label>
                        <input type="text" class="form-control" id='` + lable + `' value="` + textLabel + `"placeholder="Text Label">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="d-vaule" class="component-title">DEFAULT VALUE</label>
                        <input type="text" class="form-control" id="` + dfValue + `">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="" class="component-title">INSTRUCTIONS</label>
                        <textarea name="" id="" rows="3" class="form-control readonly"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label class="component-title">VALIDATION</label>
                </div>
                <div class="col-12">
                    <div class="form-group" style="position: relative">
                        <p>
                            Required field
                            <input type="checkbox" class="checkmark"  id ="` + require + `"style="position: absolute; right:0">
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="" class="">Field Validation</label>
                        <select name="" class="form-control readonly" >
                            <option value="FieldValidation">None</option>
                            <option value="Letters">Letters</option>
                            <option value="Letters&Number">Letters & Number</option>
                            <option value="onlyNumbe">Only Number</option>
                        </select>
                    </div>
                </div>

                
            </div>

            <div class="row">
                <div class="col-12">
                    <label class="component-title">OPTION</label>

                </div>
                <div class="col-12">
                    <div class="form-group" style="position: relative">
                        <p>
                            Hide field
                            <input type="checkbox" class="checkmark" style="position: absolute; right:0">
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group" style="position: relative">
                        <p>
                            Readonly field
                            <input type="checkbox" class="checkmark" style="position: absolute; right:0">
                        </p>
                    </div>
                </div>
            </div>
        </div>`;



        if ($('.side-nav-custom').hasClass('is-active')) {

        } else {
            $('.side-nav-custom').addClass('is-active');
        }

        $('.ef-section-body').html(inputContainer);

        let label_input = $('#' + lable + '');
        console.log(require);

        EditAppearance(label_input, lastChar);

        $('.deleteRow').on('click', DeleteFormRow);

        if ($('#set_req_1').is(':checked')) {
            $(':checkbox').prop('checked', true).attr('checked', 'checked');
            console.log('is checked');
        } else {
            $(':checkbox').prop('checked', false).removeAttr('checked');
            console.log('no event happened');
        }

    }

    $('.go-back').on('click', SlideHide);

    function SlideHide() {
        $(this).parents('.edit-form').removeClass('is-active');
    }


    function EditAppearance(label_input, lastChar) {

        label_input.keyup(function () {

            let lval = $(this).val();
            let ival = $(this).val();

            $('#lb_' + lastChar + '').text(lval);

        });
        // set defaul value
        let attrValue = $(this).attr('value', '');
    }

    function DeleteFormRow(e) {
        e.preventDefault();

        let id = $(this).attr('id');
        let lastChar = id.substr(id.length - 1);
        console.log(id);
        $('#row_' + lastChar + '').remove();
        $(this).parents('.edit-form').removeClass('is-active')
    }


});
