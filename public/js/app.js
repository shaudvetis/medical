$(function (){
	$('#categorieslist').on('click', 'li', function () {
// console.log($(this));
		$(this).next('ul').toggleClass('active');
        
        var i =  $(this).find('i').attr('class');

        var gr = $(this).attr('class');

        var dat = $(this).attr('data');

        if(i=='icon-plus-circled'){
         $(this).find('i').removeClass('icon-plus-circled').addClass('icon-minus-circled');
           BaseRecord.diagnoses($(this).attr('class'),$(this).attr('data'));
        }
         if(i=='icon-minus-circled'){
         $(this).find('i').removeClass('icon-minus-circled ').addClass('icon-plus-circled');
        }
	})
   
$(document).on('click', '.searchmkb',function(e){
 var g =$('.mkb1').val();
 var g1 =$('.mkb2').val();
 var g2 =$('.mkb3').val();
 var mkbdiag= g+g1+'.'+g2;
 BaseRecord.diagnoses(mkbdiag, 'mkbcode')
})
	
//Очистка формы после поиска по мкб
$(document).on('click', '.mkbdell',function(e){
  $(".mkb4").val(' ');
}); 

//Форма поиска по словосочетанию
 $('body').on('click', '.btnmkbdiag',function(e){
   var name=$('.mkbdiag').val();
   BaseRecord.diagnoses(name, 'mkbsearch')
})

//Форма поиска по словосочетанию
 $('body').on('click', '.btnmkbdiag',function(e){
   var name=$('.mkbdiag').val();
   BaseRecord.diagnoses(name, 'mkbsearch')
})

//Форма поиска по словосочетанию
 $('body').on('change', '.name_diagnoses', function(){
   
   var name=$(this).val();

   //полное с кодом
   var text = $(this).attr('data');

   $('.mkb4').val(text);

   $('.posdiacode').val(name);
   //BaseRecord.diagnoses(name, 'mkbsearch')
})


});


//Запуск страницы справочника мкб
var BaseRecord={

//При клике на првую группу пказать подгруппу
diagnoses: function(name, ur){
   var ajaxSetting={
   method: 'get',
   url: '/mkb', 
   data: {
   ur:ur,
   name:name,
  },
  success: function(data){
   $('.namediagnos').html(data.table);


    // $('.all_group1'+ BaseRecord.id).html(data.table);
    // //Запрос на вывод всех диагнозов правая таблица
    // BaseRecord.gr11($(this).attr('data1'));
   },
  error: (error) => {
  console.log(JSON.stringify(error));
 },
};
 $.ajax(ajaxSetting); 
},
};