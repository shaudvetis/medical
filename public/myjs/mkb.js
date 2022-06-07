

 //Запуск страницы справочника мкб
var BaseRecord={
id:'id',
diagnoses:'namedia',
chous:'chous',

//При клике на првую группу пказать подгруппу
ur1: function(ur1){
   var ajaxSetting={
   method: 'get',
   url: '/mkb', 
   data: {
   ur1:ur1,
  },
  success: function(data){
    $('.all_group1'+ BaseRecord.id).html(data.table);
    //Запрос на вывод всех диагнозов правая таблица
    BaseRecord.gr11($(this).attr('data1'));
   },
  error: (error) => {
  console.log(JSON.stringify(error));
 },
};
 $.ajax(ajaxSetting); 
},

//Клик по второй вложенной группе
ur2: function(ur2){
 var ajaxSetting={
 method: 'get',
 url: '/mkb', 
 data: {
 ur2:ur2,
},
success: function(data){
 $('.mkbur4'+BaseRecord.id).html(data.table);
 var arr=BaseRecord.diagnoses;
 var data_json=(arr.filter(arr => arr.gr2 === BaseRecord.chous));
  var str_json="";
   for(var i in data_json) {
   str_json+="<input type='radio' name='name_diagnoses' code='"+data_json[i]['code']+"' data='"+data_json[i]['code']+' '+data_json[i]['namedia']+"'  value='"+data_json[i]['namedia']+"'>"+"<span class='namdia text-muted' id='"+data_json[i]['gr1']+"' value='"+data_json[i]['id']+"'>"+data_json[i]['code']+' '+data_json[i]['namedia']+"</span>"+"<br>";     
  }
 $('.name_diagnoses').html(str_json);
},
error: (error) => {
console.log(JSON.stringify(error));
},
};
$.ajax(ajaxSetting); 
},

//Запрос на вывод всех диагнозов правая таблица
gr11: function(id){
 var ajaxSetting={
 method: 'get',
 url: '/mkb', 
 data: {
 gr1:id,
},
success: function(data){
  $('.name_diagnoses').html(data.table);
},
error: (error) => {
console.log(JSON.stringify(error));
},
};
$.ajax(ajaxSetting); 
},

gr12: function(id){
 var ajaxSetting={
 	success: function(data){

var arr=BaseRecord.diagnoses;
 var data_json=(arr.filter(arr => arr.gr3 === BaseRecord.chous));
// //alert(BaseRecord.name_diag);
   var str_json="";
           for(var i in data_json) {
       str_json+="<input type='radio' class='mt-2 mr-2' code='"+data_json[i]['code']+"' data='"+data_json[i]['code']+' '+data_json[i]['namedia']+"'  name='name_diagnoses' value='"+data_json[i]['namedia']+"'>"+"<span class='namdia text-muted'  id='"+data_json[i]['gr1']+"' value='"+data_json[i]['id']+"'>"+data_json[i]['code']+' '+data_json[i]['namedia']+"</span>"+"<br>";     
    }
 $('.name_diagnoses').html(str_json);
},
error: (error) => {
console.log(JSON.stringify(error));
},
};
$.ajax(ajaxSetting); 
},

gr13: function(id){
 var ajaxSetting={
 method: 'get',
 url: '/mkb', 
 data: {
 searchname:id,
},
 success: function(data){
 $('.name_diagnoses').html(data.table);
},
error: (error) => {
console.log(JSON.stringify(error));
},
};
$.ajax(ajaxSetting); 
},
};