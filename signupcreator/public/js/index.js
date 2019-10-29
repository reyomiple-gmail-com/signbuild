// var server = location.protocol+'//'+location.host+'/project/signupcreator';
var server = location.protocol + '//' + location.host + '/signupcreator';


$(document).ready(function () {

    $('.s-elem').on('click', elementHTML);
    let ii = '';
    let strore_id = "";
    let sID = 1;

    function elementHTML(e) {
        e.preventDefault();
        let fieldID = strore_id;
        //          console.log(fieldID);
        let elemKey = $(this).attr('tagID');
        //          console.log(elemKey);
        let row = '';
        switch (elemKey) {
            case '1':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Text Box</label>
                              <input type="text" class="form-control" tagName="textbox" readonly>
                          </div>
                       </div>`;

                break;
            case '2':

                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input ">
                              <label id="lb_` + sID + `">text label</label>
                              <textarea class="form-control" id="tag_` + sID + `" tagName="textbox" readonly></textarea>
                          </div>
                       </div>`;

                break;
            case '3':

                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input ">
                              <label id="lb_` + sID + `">text label</label>
                              <select class="form-control" readonly tagName="select">
                                <><>
                            </select>
                          </div>
                       </div>`;

                break;
            case '4':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Email</label>
                              <input type="email" class="form-control" tagName="textbox" readonly>
                          </div>
                       </div>`;

                break;
            case '5':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Password</label>
                              <input type="password" class="form-control" tagName="textbox" readonly>
                          </div>
                       </div>`;

                break;

            case '6':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Telphone</label>
                              <input type="tel" class="form-control" tagName="textbox" readonly>
                          </div>
                       </div>`;

                break;

            case '7':


                row = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Number</label>
                              <input type="number" class="form-control" tagName="textbox" readonly>
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

        $('#' + strore_id + '').append(row);

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
        //          console.log(i);

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
        //          console.log(i);


        const btnTab2 = $('#fieldTabs li');

        $(".sub-fields fieldset").eq(i).removeClass("hide").siblings().addClass("hide");


        btnTab2.eq(i).addClass("active").siblings().removeClass("active");
    }


    $("#fieldTabs li").on("click", function (e) {

        let i = $(this).index();
        //          console.log(i);
        if (!$(this).hasClass("active")) {
            goToTab2(i);
        } else {
            goToTab2(i);
        }
    });



    let calledonetime = false;

    function appendEditContainer(e) {
        e.preventDefault();
        $(this).siblings().removeClass('is-active');
        $(this).addClass('is-active');

        let id = $(this).attr('id');
        let textLabel = $(this).find('label').text();
        let element = $(this).find('.form-control').attr('tagName');
        console.log(element);

        let lastChar = id.substr(id.length - 1);

        //         text box appearance

        let lable = 'set_label_' + lastChar + ''; // LABEL
        let BtnDelete = 'delete_' + lastChar + ''; //Delete row Button
        let dfValue = 'set_val_' + lastChar + ''; // DEFAULT VALUE
        let inst = 'set_val_' + lastChar + ''; // INSTRUCTIONS
        let require = 'set_req_' + lastChar + ''; // INSTRUCTIONS

        //        return false;

        let editContainer = '';
        switch (element) {
            case 'select':
                editContainer = `<div class="row">
                                        <div class="col">
                                            <button class="btn btn-full btn-danger deleteRow" id="` + BtnDelete + `"  >Delete</button>
                                        </div>
                                    </div>
                                     <br>
                                     <br>
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
                                            <div class="col col-12">
                                                    <label for="d-vaule" class="component-title">CHOICES</label>
                                                    
                                                
                                            </div>
                                            <div class="col">
                                                <div class="choices-group">
                                                    <div class="input-group">
                                                        <i class="fas fa-times"></i>
                                                        <input type="text" class="form-control" value="Choices 1">
                                                    </div>
                                                    <div class="input-group">
                                                        <i class="fas fa-times"></i>
                                                        <input type="text" class="form-control" value="Choices 2">
                                                    </div>
                                                    <div class="input-group">
                                                        <i class="fas fa-times"></i>
                                                        <input type="text" class="form-control" value="Choices 3">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="btn btn-full btn-default"><i class="fas fa-plus"></i></div>
                                                </div>
                                                 <div class="input-group">
                                                    <div class="btn btn-full btn-default">Import</div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

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

                break;
            case 'radio':
                editContainer = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Text Box</label>
                              <input type="text" class="form-control" readonly>
                          </div>
                       </div>`;

                break;
            case 'checkbox':
                editContainer = `<div class="row row-holder" id="row_` + sID + `">
                            <div class="form-input  ">
                              <label id="lb_` + sID + `">Text Box</label>
                              <input type="text" class="form-control" readonly>
                          </div>
                       </div>`;

                break;
            case 'textbox':
                editContainer = `
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

                break;

            default:
                editContainer = alert('N/A');
                break;
        }




        if ($('.side-nav-custom').hasClass('is-active')) {

        } else {
            $('.side-nav-custom').addClass('is-active');
        }

        $('.ef-section-body').html(editContainer);

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
    /////////////////////////////////////////


    const addSection = $('#add_section');

    const dot = $('.section-dots li');
    const selectTab = $('.section-dots');

    addSection.on('click', addSectionField);

    function addSectionField(e) {
        e.preventDefault();


        let fieldName = $('.sec-name').val();

        const fieldsets = $('#fieldsets');
        if (fieldName != '') {
            let fieldID = fieldName.replace(" ", "_").toLowerCase();
            let tabID = fieldName.replace(" ", "_").toLowerCase();

            let field = ` <fieldset id="` + fieldID + `_field">
                            <div class="field-title" align="center">
                                <h2>` + fieldName + `</h2>
                            </div>
                        </fieldset>`;

            let dot = `<li class="dot"></li>`;

            let tab = `<li><a href="#" class="` +fieldID+ `_field" id="` + fieldID + `" >` + fieldName + `</a></li>`

            fieldsets.append(field);
            selectTab.append(dot);
            $('.sf-title-tabs').append(tab);
            //            console.log(  ii++);
            CloseModal();
            fieldsetCount();
            strore_id = fieldID;
            //            numberOfFields(i);

            let tab_active = $('.sf-title-tabs li a');

            tab_active.on('click', OpenTabActive);
        } else {
            alert('null');
        }


    }

    $("#next").on("click", function (e) {
        console.log(e.target);
        nextSection();
    });

    function goToSection(i) {


        $("fieldset:gt(" + i + ")").removeClass("current").addClass("prev");
        $("fieldset:lt(" + i + ")").removeClass("current");
        dot.eq(i).addClass("active-dot").siblings().removeClass("active-dot");
        //            dot.eq(i).addClass("active-dot").siblings().removeClass("active-dot");
        //            return false;
        setTimeout(function () {
            $("fieldset").eq(i).removeClass("next").addClass("current active");
            if ($("fieldset.current").index() == 3) {
                $("#next").hide();
                $("button[type=submit]").show();
            } else {
                $("#next").show();
                $("button[type=submit]").hide();
            }
        }, 80);

    }

    function nextSection() {

        let count = $('.fieldsets fieldset').length;
        let total = count + ii;
        console.log(count);
        let i = $("fieldset.current").index();

        if (i < count) {

            goToSection(i + 1);
        }
    }
    fieldsetCount();

    function fieldsetCount() {

        let count = $('.fieldsets fieldset').length;
        let btn = $('.btn-event').hide();

        if (count == 0) {
            //               alert('none');
        } else if (count = 1) {
            $('.btn-event#submit').show();
        } else if (count > 1) {
            $('.btn-event#next').show();
        }

    }



    let btnAddFields = $('#add_section_fields');

    btnAddFields.on('click', Addfields);

    function Addfields(e) {
        e.preventDefault();
        $('.form-input').val('');
        $('#section_modal').show();



    }
    $('.close').on('click', CloseModal);

    function CloseModal() {
        // alert('test');

        //$('#section_modal').find();
        $('#section_modal').hide();

    }



    function OpenTabActive(e) {
        e.preventDefault();

        let id = $(this).attr('class');
         let f_id = $(this).attr('id');
        console.log(id);
        
        $('.fieldsets fieldset').hide();

        $('.fieldsets').find('#' + id).show();
        
        strore_id = id;
        //        console.log(data);
    }
});
