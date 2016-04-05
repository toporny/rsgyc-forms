module.exports = function (grunt) {
  grunt.initConfig({
    env: grunt.option('env') || 'dev',  	
	copy: {
	  main: {
		files: [
			// includes files within path
			{expand: false, src: ['bower_components/jquery/dist/jquery.min.js'], dest: 'public_html/js/jquery.min.js', filter: 'isFile'},
			{expand: false, src: ['bower_components/bootstrap/dist/js/bootstrap.min.js'], dest: 'public_html/js/bootstrap.min.js', filter: 'isFile'},
			{expand: false, src: ['bower_components/bootstrap/dist/css/bootstrap.min.css'], dest: 'public_html/css/bootstrap.min.css', filter: 'isFile'},
			{expand: false, src: ['bower_components/parsleyjs/dist/parsley.js'], dest: 'public_html/js/parsley.js', filter: 'isFile'},
			{expand: false, src: ['bower_components/parsleyjs/dist/parsley.css'], dest: 'public_html/css/parsley.css', filter: 'isFile'},
			{expand: false, src: ['bower_components/stripe/lib/*'], dest: 'public_html/lib/'},
		],
	  },
	}
// c:\Users\uzytkownik\Desktop\1\rsgyc-forms\public_html\lib\bower_components\stripe\lib\Stripe.php
})

grunt.loadNpmTasks('grunt-contrib-copy');

grunt.registerTask('default',
	[
	 'copy'
	]);
};

