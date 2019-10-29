// // var server = location.protocol+'//'+location.host+'/project/signupcreator/';
// var server = location.protocol+'//'+location.host+'/signupcreator';
//
// show_output();
//
// function show_output() {
//     var url = server+'output/show_output';
//
//     $.ajax({
//         url: url,
//         type:'POST',
//         success: function (res) {
//             // console.log(res);
//
//             if(res.responsecode == 1)
//             {
//                 $('#output').html(res.outputs);
//                 // $('#output').html(res.outputs[0][0]['html_body']);
//             }
//             else
//             {
//                 console.log(res);
//             }
//         }
//     });
// }