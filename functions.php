<?php

show_admin_bar( false );
add_theme_support( 'post-thumbnails' );

// function my_enqueue($hook) {
//   wp_enqueue_script( 'bundle',
//     get_template_directory_uri() . '/js/build/bundle.js',
//     [ 'wp-editor', 'wp-blocks', 'wp-element', 'wp-components', 'wp-i18n' ]
//   );
// }

// add_action( 'admin_enqueue_scripts', 'my_enqueue' );

// ==========
// Shortcodes
// ==========

// Lead Form

function lead_form( $atts ) {
  $a = shortcode_atts( array(
    'to' => 'bvodola@gmail.com',
    'cta' => 'Enviar dados'
  ), $atts );

  ob_start(); ?>
    <!-- HTML START -->

    <script type='text/javascript'>
      function handleFormSubmit(ev) {
        ev.preventDefault();
        let form = ev.target;
        let self = this;
      
        const _formData = new FormData(form);
        let formData = {};
        for(var e of _formData.entries()) {
          formData[e[0]] = e[1];
        }
      
        setFormState(form, 'SENDING');
      
        axios.post('http://localhost:3000/mail/send/', {
          from: 'leads@emagrecen.do',
          to: formData.to,
          subject: 'Lead Emagrecen.do',
          text: `Nome: ${formData.name}, Telefone: ${formData.phone}`,
        }).then(function() {
          self.setFormState(form, 'DEFAULT');
          self.toggleSuccessAlert();
      
        }).catch(function(err) {
          console.log('Error', err);
          self.setFormState(form, 'DEFAULT');
        });
      }
      
      function setFormState(form, state) {
        let submitButton = form.querySelector('[type=submit]');
      
        if(state === 'SENDING') {
          submitButton.disabled = true;
          submitButton.defaultInnerText = submitButton.innerText;
          submitButton.innerText = 'Enviando...';
        }
      
        if(state === 'DEFAULT') {
          form.reset();
          submitButton.disabled = false;
          submitButton.innerText = submitButton.defaultInnerText;
        }
      };
      
      function toggleSuccessAlert() {
        const alert = document.querySelector('.success-alert');
      
        alert.style.display = 'block';
        setTimeout(function() {alert.style.opacity = 1},200)
        
        setTimeout(function() {
          alert.style.opacity = 0
          setTimeout(function() {alert.style.display = 'none'},200)
        }, 3000)
      
      }
    </script>

    <form onsubmit="handleFormSubmit(event)" class='lead-form'>
      <input type='hidden' name='to' value='<?php echo $a['to'] ?>' />
      <input type='text' name='name' placeholder='Nome' class="round-input" />
      <input type='phone' name='phone' placeholder='Telefone' class="round-input" />
      <input type='submit' value='<?php echo $a['cta'] ?>' class="primary-button" />
    </form>
    <!-- HTML END -->
  <?php return ob_get_clean();
}

add_shortcode( 'lead_form', 'lead_form' );

require get_template_directory() . '/inc/gutenberg.php';