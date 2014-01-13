<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Quiz</title>

    <link rel="stylesheet" href="resources/quiz.css" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="resources/quiz.js"></script>
    <script type="text/javascript">
    function Answer(text, scores){
        this.text = text;
        this.scores = scores;
    }

    Answer.prototype.toString = function(){
        return this.text;
    }
    Answer.prototype.toHTML = function(){
        this.ref = $(document.createElement('div'))
            .addClass("option")
            .append($(document.createElement('div'))
                .html(this.text)
            )
        ;
        return this.ref;
    }

    function Question(id, text, type, answers, categories){
        this.id = id;
        this.text = text;
        this.answers = answers;
        this.categories = categories;
    }
    Question.prototype.toString = function(){
        return this.text;
    }
    Question.prototype.toHTML = function(){
        var ref = $(document.createElement('div'))
            .addClass('question')
            .append($(document.createElement('div'))
                .html(this.text)
                )
        ;
        $.each(this.answers, function(index, answer){
            ref.append(answer.toHTML());
        });
        this.ref = ref;
        return ref;
    }
    
    answers = [new Answer("Kanye",[0,1]),
               new Answer("KanyE",[1,2])];
    question = new Question(0,"What is your favorite celibrity?", "exclusive", answers,["yo","bo"]);

    //alert(answer1);


    </script>
</head>
<body>

<div id="content">
  <h1>Quiz</h1>

  <div class="question">
    <div>What is your favorite celibrity?</div>
    <div id="q1_a1" class="option_selected"><div>Kanye</div></div>
    <div id="q1_a1" class="option"><div>Kanye</div></div>
    <div id="q1_a1" class="option"><div>Kanye</div></div>
  </div>
</div>

<script type="text/javascript">

content = document.getElementById("content");
$(content).append(question.toHTML());
//alert(question);
</script>
</body>
</html>