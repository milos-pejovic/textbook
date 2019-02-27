<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
jQuery(function($){
  
// Controller buttons  
  
var checkBtn = $('#check-answer-button');
var showAnswerBtn = $('#show-answer-button');
var clearAllBtn= $('#clear-all-button');

// Answer styling  
  
function answerUnchecked(inputField) {
	inputField.removeClass('correct-answer wrong-answer');
	inputField.addClass('unchecked-answer');
  	inputField.parents('.single-input-field').find('.fa-check').hide();
  	inputField.parents('.single-input-field ').find('.fa-times').hide();
}
  
function answerCorrect(inputField) {
  
  	console.warn("Correct answer: " + inputField.val());
  
	inputField.removeClass('unchecked-answer wrong-answer');
	inputField.addClass('correct-answer');
  	inputField.parents('.single-input-field').find('.fa-check').show();
  	inputField.parents('.single-input-field').find('.fa-times').hide();
}  
  
function answerWrong(inputField) {
  
  	console.warn("Wrong answer: " + inputField.val());
  
	inputField.removeClass('unchecked-answer correct-answer');
	inputField.addClass('wrong-answer');
  	inputField.parents('.single-input-field').find('.fa-check').hide();
  	inputField.parents('.single-input-field').find('.fa-times').show();
}  
  
// When input field value is changed, text loses color  
  
$('input').on('input', function() {
  	answerUnchecked($(this));
    $(this).removeClass('showing-correct-answers')
});

// Change input field width based on the number of characters in the answer  
  
function changeInputFieldWidth(inputField) {
  	var minInputFieldWidth = 80;
	var valueLength = inputField.val().length;
  	var inputFieldNewWidth = valueLength * 8 + 35;
  
  	if (inputFieldNewWidth < minInputFieldWidth) {
    	inputFieldNewWidth = minInputFieldWidth;
    }
  
  	inputField.css('width', inputFieldNewWidth + 'px');
}  
  
// Assign input field input event handler  
  
$('.exercise input').each(function() {
	$(this).on('input', function() {
    	changeInputFieldWidth($(this));
     	$(this).removeClass('showing-correct-answers');
    });
});
  
// Checking answers 
  
checkBtn.on('click', function() {
  
  console.warn("Checking answers");
  
	$('.exercise input').each(function() {
      
      if ($(this).hasClass('showing-correct-answers')) {
        return;
      } else {
      	var entry = $(this).val();
		
        if (entry !== '') {
          var answers = $(this).attr('data-answers');
          answers = answers.split('|');
          
          for (var i = 0; i < answers.length; i++) {
          	answers[i] = answers[i].trim();
          }
          
          if (answers.indexOf(entry.trim()) != -1) {
            answerCorrect($(this));
          } else {
            answerWrong($(this));
          }
        } else {
          answerUnchecked($(this));
        }
        
      }
      
	});
});

// Showing answers
  
showAnswerBtn.on('click', function() {
	$('.exercise input').each(function() {
		var answers = $(this).attr('data-answers');
      	answers = answers.replace(/\//g, ' / ');
		$(this).val(answers);
      	$(this).addClass('showing-correct-answers');
      	answerUnchecked($(this));
      	changeInputFieldWidth($(this));
	});
});

// Clear all

clearAllBtn.on('click', function() {
	$('.exercise input').each(function() {
      	$(this).removeClass('showing-correct-answers');
		$(this).val('');
      	answerUnchecked($(this));
      	changeInputFieldWidth($(this));
	});
});
});</script>
<!-- end Simple Custom CSS and JS -->
