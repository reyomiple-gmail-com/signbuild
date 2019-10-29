//$(document).ready(function () {
//
//    let ii = '';
//    const addSection = $('#add_section');
//
//    const dot = $('.section-tabs li');
//    const selectTab = $('.section-tabs');
//
//    addSection.on('click', addSectionField);
//
//    function addSectionField(e) {
//        e.preventDefault();
//
//
//        let fieldName = $('.sec-name').val();
//
//        const fieldsets = $('#fieldsets');
//
//        let field = ` <fieldset id="basicInfo">
//                            <div class="field-title" align="center">
//                                <h2>` + fieldName + `</h2>
//                            </div>
//                        </fieldset>`;
//
//        let dot = `<li class="dot"></li>`;
//
//        fieldsets.append(field);
//        selectTab.append(dot);
//        //            console.log(  ii++);
//        CloseModal();
//        fieldsetCount();
//        //            numberOfFields(i);
//    }
//
//    $("#next").on("click", function (e) {
//        console.log(e.target);
//        nextSection();
//    });
//
//    function goToSection(i) {
//
//
//        $("fieldset:gt(" + i + ")").removeClass("current").addClass("prev");
//        $("fieldset:lt(" + i + ")").removeClass("current");
//        dot.eq(i).addClass("active-dot").siblings().removeClass("active-dot");
//        //            dot.eq(i).addClass("active-dot").siblings().removeClass("active-dot");
//        //            return false;
//        setTimeout(function () {
//            $("fieldset").eq(i).removeClass("next").addClass("current active");
//            if ($("fieldset.current").index() == 3) {
//                $("#next").hide();
//                $("button[type=submit]").show();
//            } else {
//                $("#next").show();
//                $("button[type=submit]").hide();
//            }
//        }, 80);
//
//    }
//
//    function nextSection() {
//
//        let count = $('.fieldsets fieldset').length;
//        let total = count + ii;
//        console.log(count);
//        let i = $("fieldset.current").index();
//
//        if (i < count) {
//
//            goToSection(i + 1);
//        }
//    }
//    fieldsetCount();
//
//    function fieldsetCount() {
//
//        let count = $('.fieldsets fieldset').length;
//        let btn = $('.btn-event').hide();
//
//        if (count == 0) {
//            //               alert('none');
//        } else if (count = 1) {
//            $('.btn-event#submit').show();
//        } else if (count > 1) {
//            $('.btn-event#next').show();
//        }
//
//    }
//
//
//
//    let btnAddFields = $('#add_section_fields');
//
//    btnAddFields.on('click', Addfields);
//
//    function Addfields(e) {
//        e.preventDefault();
//        $('.form-input').val('');
//        $('#section_modal').show();
//
//
//
//    }
//    $('.close').on('click', CloseModal);
//
//    function CloseModal() {
//        //        alert('test');
//
//        //             $('#section_modal').find();
//        $('#section_modal').hide();
//
//
//    }
//
//
//
//    //
//    //        $(".dot").on("click", function(e) {
//    //            let i = $(this).index();
//    //
//    //            if ($(this).hasClass("active-dot")) {
//    //                goToSection(i);
//    //            } else {
//    //                alert("Please complete previous sections first.");
//    //            }
//    //        });
//
//});
