var questionNumber=1;
var totalQuestions=$("#totq").val();
var tt=$('input[type=radio][name=ans'+questionNumber+']').attr('class');
$('#currentQuestion').val(tt);
$('#currentQuestionno').val(questionNumber);
        if(questionNumber == 1)
        {
            $("#prev").hide();
        }else{
            $("#prev").show();
        }
//alert(baseurl);
$('#prev').click(function(){  
    var qno=$('#currentQuestionno').val()-1;
    for(var i=1;i<=totalQuestions;i++){
                        $('.question'+i).hide();
                    }
    $('.question'+qno).show();
    $('#currentQuestionno').val(qno);
    var tt=$('input[type=radio][name=ans'+qno+']').attr('class');
    $('#currentQuestion').val(tt);
    if(qno <= 0) 
    {
    $('.question1').show();
    $("#currentQuestionno").val(1);
    }
    else if(qno == totalQuestions)
    {                                           
    $("#next").hide(); 
    }
    else
    {
    $("#next").show(); 
    }
    
});

$('#next').click(function(e){
    e.preventDefault();
    var totalQuestions=$("#totq").val();
  for(i=1;i<=totalQuestions;i++){
        $('.question'+i).hide();
        
    }

    var qno=$('#currentQuestionno').val();
    questionNumber=qno;
    var userans=$('input[name=ans'+qno+']:checked').val();
    var q=$('input[type=radio][name=ans'+qno+']').attr('class');   
    var cid=$("#chapterid").val();
    var reg=$("#regno").val();    
    
    $.ajax({
        type: "POST",
        url: baseurl+"student_controller/quiz/saveAns",
        data:"qno="+q+"&ans="+userans+"&cid="+cid+"&userid="+reg,
        beforeSend:function(data){
            $(this).val('Saving..');
            
        },
        success: function (response) {          
            questionNumber++;
            // alert("Next sno"+questionNumber);
            $('.question'+questionNumber).show();
            var tt=$('input[type=radio][name=ans'+questionNumber+']').attr('class');
                                $('#currentQuestion').val(tt);      
                                $('#currentQuestionno').val(questionNumber);    
                                
                                if(questionNumber == totalQuestions)
                                {
                                    $("#next").hide();
                                    $("#prev").show();
                                }else{
                                    $("#next").show(); 
                                    $("#prev").show();
                                }
        },error:function(xhr){
            console.log(xhr);
        }
    });
  
    
});




$("#endexam").click(function(){

    var qno=$('#currentQuestionno').val();
    var userans=$('input[name=ans'+qno+']:checked').val();
    var q=$('input[type=radio][name=ans'+qno+']').attr('class');    
    var cid=$("#chapterid").val();
    var reg=$("#regno").val(); 
    var r = confirm("Are you sure you want to end the exam"); 
    $.ajax({
        type: "POST",
        url: baseurl+"student_controller/quiz/saveAns",
        data:"qno="+q+"&ans="+userans+"&cid="+cid+"&userid="+reg,
        // beforeSend:function(){
        //  return confirm("Are you sure?");
        // },
        success: function (response) {          
            // alert("Are you sure you want to end the exam");
            if (r == true) 
            {
                window.location=baseurl+"student_controller/quiz/resultdisplay?cid="+cid;
            } 
            else 
            {
                
            }
        },error:function(xhr){
            // alert('Error while selecting list..!!');
            console.log(xhr);
        }
    });
});

// $("#endexam").click(function(){

//     var qno=$('#currentQuestionno').val();
//     var userans=$('input[name=ans'+qno+']:checked').val();
//     var q=$('input[type=radio][name=ans'+qno+']').attr('class');    
//     var cid=$("#chapterid").val();
//     var reg=$("#regno").val();  

//     $.ajax({
//         type: "POST",
//         url: baseurl+"student_controller/quiz/saveAns",
//         data:"qno="+q+"&ans="+userans+"&cid="+cid+"&userid="+reg,
//         success: function (response) { 
//             alert("Are you sure you want to end the exam");
//           window.location=baseurl+"student_controller/quiz/resultdisplay?cid="+cid;
//         },error:function(xhr){
//             console.log(xhr);
//         }
//     });
// });