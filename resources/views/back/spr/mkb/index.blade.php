@extends('medical')

@section('content')

@include('back.spr.mkb.mkb-brick')

@endsection


@section('js')

<script>
$(document).ready(function(){

$('body').on('click', '.classgr1',function(){
  
var link1=$(this).attr('id');

var prevActive= $(this).attr('data1');

var prev= $(this).attr('data');

$('div .all').css('display','none');

//При клике на главную группу пказать подгруппу


 var children = $(this).closest('div.classgr1').find('i').attr('class');
  if (children === 'bi bi-plus'){
     $('div .alldiv-'+link1).css('display', 'block');

      $('div .group-'+link1).show();
      //Запрос на вывод группы левая таблица
      
            $('div .gr1-'+prevActive).each(function() {
  $(this).css('display','block');
});

      $(this).closest('div.classgr1').find('i').removeClass('bi bi-plus').addClass('bi bi-dash');
}
if (children === 'bi bi-dash'){
   $(this).closest('div.classgr1').find('i').removeClass('bi bi-dash').addClass('bi bi-plus');
     $('div .group-'+link1).hide();
       $('div .alldiv-'+link1).hide();
    
 }  

//  $('div .all').css('display','none');
 $('div .all').find('div .ur1-'+prevActive).show();

});

$('body').on('click', '.classgr13',function(){

  
var link=$(this).attr('href');

var link2=$(this).attr('id');

$('div .all').css('display','none');

 // $('div .group-'+link2).css('display','block');

var children = $(this).closest('div.classgr13').find('i').attr('class');
  if (children === 'bi bi-plus'){
      $('div .group-'+link2).show();
      //Запрос на вывод группы левая таблица
      
      $('div .gr2-'+link2).each(function() {
  $(this).css('display','block');
});

      $(this).closest('div.classgr13').find('i').removeClass('bi bi-plus').addClass('bi bi-dash');
}
if (children === 'bi bi-dash'){
   $(this).closest('div.classgr13').find('i').removeClass('bi bi-dash').addClass('bi bi-plus');
     $('div .group-'+link2).hide();
 }  

});



$('body').on('click', '.classgr14',function(){
  
var link=($(this).attr('id'));

$('div .all').css('display','none');

// $('div .groupd-'+link).css('display','block');

var children = $(this).closest('div.classgr14').find('i').attr('class');
  if (children === 'bi bi-plus'){
    // $('div .groupd-'+link).show();

$('div .groupd-'+link).each(function() {
  $(this).css('display','block');
});
      //Запрос на вывод группы левая таблица
      
      $(this).closest('div.classgr14').find('i').removeClass('bi bi-plus').addClass('bi bi-dash');
}
if (children === 'bi bi-dash'){
   $(this).closest('div.classgr14').find('i').removeClass('bi bi-dash').addClass('bi bi-plus');
     $('div .groupd-'+link).hide();
 }  
});

//Очистка формы после поиска по мкб
$(document).on('change', '.radiod',function(e){
 var radiod=$(this).attr('data');

 //alert(radiod);

$(".mkb4").val(radiod);

}); 

//После выбора буквы мкб и шрифта нажатие кнопки Посик
$(document).on('click', '.searchmkb',function(e){
 var g =$('.mkb1').val();
 var g1 =$('.mkb2').val();
 var g2 =$('.mkb3').val();
 var mkbdiag= g+g1+'.'+g2;


    // $(".all").filter(function() {
    //    $(this).toggle($(this).text().indexOf(mkbdiag) > -1)
    // });

    $('div .all').each(function() {
     $(this).toggle($(this).text().indexOf(mkbdiag) > -1)
});

}); 

//Очистка формы после поиска по мкб
$(document).on('click', '.mkbdell',function(e){
  $(".mkb4").val(' ');
}); 


//Форма поиска по словосочетанию
 $('body').on('click', '.btnmkbdiag',function(e){

  $('.messages').css('display','block');
   var nam=$('.mkbdiag').val();

    var  value = $('.mkbdiag').val().toLowerCase();
    
    $(".all").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });

  $('.messages').css('display','none');
   //BaseRecord.gr13($('.mkbdiag').val());
})

   
 }); 

</script>
@endsection