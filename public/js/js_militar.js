/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var idImage = 2;
var max = 2;

$(document).scroll(function(){
    var topHtml = $(document).scrollTop();
    var toBotton = $("#totop");     
    if(topHtml == 0){
        toBotton.css("display","none"); 
    }else{
        toBotton.css("display","block");
    }        
});
function goTo(element, speed){
    var href = element.attr('href');
    var top = $(href).offset().top;
    $("html,body").animate({scrollTop:top},speed);
}
$(document).ready(function (){
   $("[href='#matricula']").hide();
   $("[href='#cursos']").hide();
   $("[href='#documentos']").hide();
   $("[href='#matricula']").hide();
   $("[href='#prova']").hide();
   
   $("[href='#matricula']").slideDown(500).fadeIn(500);
   $("[href='#cursos']").delay(150).slideDown(500).fadeIn(500);
   $("[href='#documentos']").delay(300).slideDown(500).fadeIn(500);
   $("[href='#matricula']").delay(450).slideDown(500).fadeIn(500);
   $("[href='#prova']").delay(600).slideDown(500).fadeIn(500);
   
   $("#totop").css("display","none"); // Escode o botão vermelho Top
});
$(function(){
    $("#destaque a").click(function (e){
        e.preventDefault();
        goTo($(this),500);
    });
    $("#totop a").click(function (e){
        e.preventDefault();
        goTo($(this),500);
    });
});