<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="author" content="John Dean">
<title>Select Font Styles</title>
<style>
  fieldset {
    display: inline;
    border-color: blue;
  }
  .hidden {display: none;}
  .italic {font-style: italic;}
  .bold {font-weight: bold;}
  .small-caps {font-variant: small-caps;}
  .underline{text-decoration: underline;}
  
  .red{
  background-color:red;
  color: red;
  }
  .blue{
  background-color:skyblue;
  color: skyblue;
  }
  .green{
  background-color:limegreen;
  color: limegreen;
  }
  .pink{
  background-color:darkorange;
  color: darkorange;
  }

</style>

<script>
  // Apply the user's font selections to text at the
  // bottom of the web page.

  function applyFontSelections(form) {
    // var fontSizeRBs;     // collection of radio buttons
    var fontFeatureCBs;  // collection of checkboxes
    var message;         // message element
    var selectors = "";  // a list of selectors for message

    message = document.getElementById("message");

    // The following value property fails with IE and MS Edge.
    message.style.fontSize =
      form.elements["fontSize"].value;

    message.style.color = 
    form.elements["fontColor"].value;

/*
    // The following works for all browsers:

    fontSizeRBs = form.elements["fontSize"];
    for (let i=0; i<fontSizeRBs.length; i++) {
      if (fontSizeRBs[i].checked) {
        message.style.fontSize = fontSizeRBs[i].value;
      }
    } // end for
*/

    fontFeatureCBs = form.elements["otherFontFeatures"];
    for (let fontFeature of fontFeatureCBs) {
      if (fontFeature.checked) {
        selectors += fontFeature.value + " ";
      }
    } // end for

    message.className = selectors;
    //message.className = "italic bold";
  } // end applyFontSelections
</script>
</head>

<body>
<h3>Make your font selections and click Done.</h3>
<form>
  <fieldset>
    <legend>Font Size</legend>
    <input type="radio" name="fontSize" value=".5em" >.5em<br>
    <input type="radio" name="fontSize" value="1em">1em<br>
    <input type="radio" name="fontSize" value="3em" checked>3em<br>
    <input type="radio" name="fontSize" value="5em">5em
  </fieldset>
  <fieldset>
    <legend>Other Font Features</legend>
    <input type="checkbox" name="otherFontFeatures"
      value="italic">italic<br>
    <input type="checkbox" name="otherFontFeatures"
      value="bold">bold<br>
    <input type="checkbox" name="otherFontFeatures"
      value="small-caps">small-caps<br>
    <input type="checkbox" name="otherFontFeatures"
      value="underline">underline
  </fieldset>
  <fieldset>
    <legend>Font Color</legend>
    <input type="radio" name="fontColor" value="Red"><span class="red">color pick</span><br>
    <input type="radio" name="fontColor" value="SkyBlue"><span class="blue">color pick</span><br>
    <input type="radio" name="fontColor" value="DarkOrange" checked><span class="pink">color pick</span><br>
    <input type="radio" name="fontColor" value="LimeGreen"><span class="green">color pick</span>
  </fieldset>
  <br><br>
  <input type="button" value="Done"
    onclick="applyFontSelections(this.form);">
</form>
<br>
<div class="hidden" id="message">
  The Analytical Engine has no pretensions whatever to
  originate anything. It can do whatever we know how to
  order it to perform.<br>
  &mdash; Ada Lovelace, the world's first computer programmer
</div>
</body>
</html>