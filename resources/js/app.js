/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

 $(document).ready(function(){

 	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);

 	$( ".new-customer-form" ).submit(function( event ) {
  if ( $( ".customer_name" ).val() === '' ) {
     $( ".name_validation" ).text( "Please fill the name of a customer here" ).show().delay(2500).fadeOut( 500 );
     $(".customer_name").css({ 'border' : '1.5px solid #D11A2A' });
  event.preventDefault();
  } else if( $( ".customer_name" ).val().length <= 4 )  {
  		$( ".name_validation" ).text( "the name must contain at least 5 letters" ).show().delay(2500).fadeOut( 500 );
  		$(".customer_name").css({ 'border' : '1.5px solid #D11A2A' });
  event.preventDefault();
 	} else {
 		$(".customer_name").css({ 'border' : 'none' });
 	}

 	if ( $( ".customer_country" ).val() === '' ) {
     $( ".country_validation" ).text( "Please fill the customer's country here" ).show().delay(2500).fadeOut( 500 );
     $(".customer_country").css({ 'border' : '1.5px solid #D11A2A' });
  event.preventDefault();
  } else if( $( ".customer_country" ).val().length <= 2 )  {
  		$( ".country_validation" ).text( "the country must contain at least 3 letters" ).show().delay(2500).fadeOut( 500 );
  		$(".customer_country").css({ 'border' : '1.5px solid #D11A2A' });
  event.preventDefault();
 	} else {
 		$(".customer_country").css({ 'border' : 'none' });
 	}


 	if ( $( ".customer_email" ).val() === '' ) {
     $( ".email_validation" ).text( "Please fill the customer's email here" ).show().delay(2500).fadeOut( 500 );
     $(".customer_email").css({ 'border' : '1.5px solid #D11A2A' });
  event.preventDefault();
  } else {
  	$(".customer_email").css({ 'border' : 'none' });
  }

  var number = $( ".customer_number" );
  cleanNumber = number.val().replace(/\s/g, '');
  if ( cleanNumber === '' ) {
     $( ".number_validation" ).text( "Please fill the customer's number here" ).show().delay(2500).fadeOut( 500 );
     $( ".customer_number" ).css({ 'border' : '1.5px solid #D11A2A' });
  event.preventDefault();
  } else if (!$.isNumeric(cleanNumber))  {
  		$( ".number_validation" ).text( "Number must be numeric" ).show().delay(2500).fadeOut( 500 );
  		$( ".customer_number" ).css({ 'border' : '1.5px solid #D11A2A' });
  event.preventDefault();
 	} else {
 		$( ".customer_number" ).css({ 'border' : 'none' });
 	}

 	if ( $( ".customer_birthday" ).val() === '' ) {
     $( ".birthday_validation" ).text( "Please fill the customer's birth date here" ).show().delay(2500).fadeOut( 500 );
     $(".customer_birthday").css({ 'border' : '1.5px solid #D11A2A' });
  event.preventDefault();
  } else {
  	$(".customer_birthday").css({ 'border' : 'none' });
  }
 

});



 	});
