<!-- Header -->
<?php get_header(); ?>

  <main>
    <div class="image-container">
      <div class="overlay-content">
        <div class="main-title">
          <h1 class="title">Inquiry Form</h1>
        </div>
      </div>
      <img id="changePic" class="img-fluid" src="<?php echo get_theme_file_uri('images/FV-img02.jpg'); ?>" alt="">
    </div>
    <div class="main-content">
      <div class="form-container">
        <form id="contact-form">
          <div class="radio-button">
            <label for="" class="text-input-label">
              Tour Plan
              (<span>require</span>)
            </label>
            <div class="md-radio md-radio-inline">
              <input id="all-day" type="radio" name="plan" value="All Day Tour" required>
              <label for="all-day">All Day Tour</label>
            </div>
            <div class="md-radio md-radio-inline">
              <input id="half-day" type="radio" name="plan" value="Half Day Tour">
              <label for="half-day">Half Day Tour</label>
            </div>
            <!-- Error message -------- -->
            <span id="radio-error" class="error-message"></span>
          </div>
          <div class="text-input">
            <label for="" class="text-input-label">
              Name
              (<span>require</span>)
            </label>
            <div>
              <input class="input-form" type="text" name="user_name"> <!--  name属性：user_name -->
              <span id="name-error" class="error-message"></span>
            </div>
          </div>
          <div class="text-input">
            <label for="" class="text-input-label">
              E-mail
              (<span>require</span>)
            </label>
            <div>
              <input class="input-form" type="email" name="user_email"> <!--  name属性：user_email -->
              <span id="email-error" class="error-message"></span>
            </div>
          </div>
          <div class="text-input">
            <label for="" class="text-input-label">
              Email
              (reconfirm)
            </label>
            <div>
              <input class="input-form" type="email" name="confirm_email" id="confirm_email">
              <span id="confirm-email-error" class="error-message"></span>
            </div>
          </div>
          <div class="text-input">
            <label for="" class="text-input-label">
              Phone number
            </label>
            <input class="input-form" type="text" name="user_phone"> <!--  name属性：user_phone -->
          </div>
          <div class="text-input">
            <label for="" class="text-input-label">
              Country
            </label>
            <input class="input-form" type="text" name="user_country"> <!--  name属性：user_country -->
          </div>
          <div class="date-input">
            <label for="" class="text-input-label">
              Preferred tour date
            </label>
            <input class="input-form" type="date" name="start_date"> <!--  name属性：Preferred tour date -->
          </div>
          <div class="text-input">
            <label for="" class="text-input-label">
              How many people will be traveling?
            </label>
            <input class="input-form" type="text" name="number-of-ppl">
          </div>
          <div class="textarea-input">
            <label for="" class="text-input-label">
              Where do you want to go?
            </label>
            <textarea class="textarea-form" name="thePlaceThatyouwant" id="" cols="20" rows="5"></textarea>
          </div>
          <div class="textarea-input">
            <label for="" class="text-input-label">
              Any special requests you want to let us know
            </label>
            <textarea class="textarea-form" name="requests" id="" cols="20" rows="5"></textarea>
          </div>
          <div class="book-container">
            <button type="submit" class="book-now-button">
              BOOK NOW
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php get_footer(); ?>