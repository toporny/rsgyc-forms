module.exports = function (grunt) {
  grunt.initConfig({
    env: grunt.option('env') || 'dev',  	
	copy: {
	  main: {
	    files: [
			// includes files within path
			{expand: false, src: ['bower_components/jquery/dist/jquery.min.js'], dest: 'public_html/js/jquery.min.js', filter: 'isFile'},
			{expand: false, src: ['bower_components/bootstrap/dist/bootstrap.min.js'], dest: 'public_html/js/bootstrap.min.js', filter: 'isFile'},
			{expand: false, src: ['bower_components/bootstrap/dist/css/bootstrap.min.css'], dest: 'public_html/css/bootstrap.min.css', filter: 'isFile'},
			{expand: false, src: ['bower_components/parsleyjs/src/parsley.js'], dest: 'public_html/js/parsley.js', filter: 'isFile'},
			{expand: false, src: ['bower_components/parsleyjs/dist/parsley.css'], dest: 'public_html/css/parsley.css', filter: 'isFile'},
	    ],
	  },
	}

})

grunt.loadNpmTasks('grunt-contrib-copy');

grunt.registerTask('default',
	[
	 'copy'
	]);
};

