<?php require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');   ?>

<!DOCTYPE html>
<html lang="en">

    <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/head.php'; ?>

    <body>
        <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/header.php'; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/nav.php'; ?>



        <section class="about-section">
      <div class="container-aboutus">
        <div>
          <h1 class="title-aboutUs">Welcome to our unique and exciting Kids Games! </h1>
          <p>
            At Kids games Team Uno, we take pride in presenting a collaborative final project created by five passionate minds in 
            PHP, MySQL, HTML, CSS, and JavaScript, JQuery, Boobstrap. Our mission is to provide an interactive and enjoyable experience 
            that allows you to explore like a kid.
          </p>
        </div>
        <div>
          <h3 class="subtitle-aboutUs"> Our Team: </h3>
          <p>
            We are a team of five developers committed to creating engaging and meaningful content. We came together to 
            merge our individual skills and create a platform that goes beyond simple coding. We are thrilled to introduce 
            you to our final project, which reflects not only our technical expertise but also our dedication and passion 
            for psychology and user experience design.
          </p>
        </div>
        <div>
          <h3 class="subtitle-aboutUs"> Our Vision: </h3>
          <p>
            At Kids games, we believe that self-awareness is to show you how important is to have your brain fresh. 
            We want to provide you with a unique experience that is not only entertaining but also thought-provoking. Our Kids Games 
            is designed to help you explore different habilities with letters and numbers.
          </p>
        </div>
        <div>
          <h3 class="subtitle-aboutUs">Key Features:</h3>
          <p>
            Interactivity: Our website uses modern web technologies to offer you an interactive and engaging experience.
            Attractive Design: We have paid special attention to design to ensure that your experience is visually pleasing and easy to follow.
            Detailed Results: After completing the games, you will receive detailed results to identify if you complete the levels correctly or not.
            Creative Collaboration: This project is the result of collaboration between five creative minds, each bringing their unique expertise to make this experience special.
          </p>
        </div>
        <div>
          <h3 class="subtitle-aboutUs">How It Works:</h3>
          <p>
            Play the Games: Find the solution for all the levels, carefully answer them keep your main fresh.
            Historical Results: After completing the games, you will see all the playes and their results.
          </p>
        </div>
        <div>
          <br/>
          <h4> Thank you for visiting Kids Games Team Uno. We hope you enjoy exploring and playong the games as much as we enjoyed creating 
            this experience for you! Have fun discovering of your habilities with letters and numbers</h4>       
        </div>
      </div>
      
    </section>
    
        <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/footer.php'; ?>
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'db/create.php');?>
    </body>
</html>
