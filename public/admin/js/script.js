// $(document).ready(function (){
//     $('#category').change(function (){
//         let categoryVal = $('#category').val();
//         selectModel(categoryVal);
//     });
// });
//
// function selectModel(val) {
//     let model = $('#model');
//     if(val>0){
//         $('#divmodel').fadeIn('slow');
//         model.attr('disabled', false);
//         model.load(
//             {{route('type-models.create')}},
//             {val: val}
//         );
//     }
// }
