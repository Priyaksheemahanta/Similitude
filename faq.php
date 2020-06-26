<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FAQs</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/faq.css">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/a4ec4505ee.js" crossorigin="anonymous"></script>
    <!-- java Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body>
    <section class="colored-section" id="title">
      <!-- <img class="bg" src="colorbg.jpeg" alt=""> -->
      <div class="container-fluid">
        <!-- navbar -->
      <?php include "navbar.php" ?>
</section>

<div class="content">
<h1>FAQs</h1>

<!-- __________________________ SECTIONS ___________________________ -->



<div>
  <input type="checkbox" id="question1" name="q"  class="questions">
  <div class="plus">+</div>
  <label for="question1" class="question">
  What is similiTUDE and how does it work?
  </label>
  <div class="answers">
    <p>similiTUDE is an online free checker for similar text. similiTUDE uses various algorithms to check the similarity between documents to arrive at the similarity check. </p>

  </div>
</div>


<!-- 2_____________________________________________________ -->
<div>
  <input type="checkbox" id="question2" name="q" class="questions">
  <div class="plus">+</div>
  <label for="question2" class="question">
	Why is my text not being checked?

  </label>
  <div class="answers">
<p>1.The content maybe exceeding the limit.</p>
<p>2. Check your connection before proceeding again.</p>
  </div>
</div>
 <!--3 _____________________________________________________ -->
<div>
  <input type="checkbox" id="question3" name="q" class="questions">
  <div class="plus">+</div>
  <label for="question3" class="question">
Why is the similarity check not showing any result?
  </label>
  <div class="answers">
<p>There isn’t any pre existing record of your document in the database to check the similarity with.</p>
  </div>
</div>
<!--4 _____________________________________________________ -->
<div>
  <input type="checkbox" id="question4" name="q" class="questions">
  <div class="plus">+</div>
  <label for="question4" class="question">
Can it check similarities of documents of other language other than English?
  </label>
  <div class="answers">
<p>Currently that feature is not available yet.</p>
  </div>
</div>
<!--5 _____________________________________________________ -->
<div>
  <input type="checkbox" id="question5" name="q" class="questions">
  <div class="plus">+</div>
  <label for="question5" class="question">
	Which similarity check is the best for consideration?
  </label>
  <div class="answers">
<p>Cosine similarity yields the best result for consideration.</p>
  </div>
</div>
<!--6 _____________________________________________________ -->
<div>
  <input type="checkbox" id="question6" name="q" class="questions">
  <div class="plus">+</div>
  <label for="question6" class="question">
How much percent of similarity check can be considered as viably similar?

  </label>
  <div class="answers">
<p>If your document yields a 70% in cosine similarity measure then it can be considered viable.</p>
  </div>
</div>



<!-- __________________________ SECTIONS ___________________________ -->
<br />
<h6 style="text-align:center">For more queries please  <button type="submit" name="submit" class="btn"> <a href="#contact">Contact Us</a> </button> </h6>

</div>

<?php include "footer.php" ?>
</body>
</html>
