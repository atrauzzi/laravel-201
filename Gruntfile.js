module.exports = function (grunt) {

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-stylus');

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		stylus: {
			compile: {
				files: {
					"public/main.css": "app/stylus/main.css.styl"
				}
			}
		},
		watch: {
			stylesheets: {
				files: "app/stylus/**/*.styl",
				tasks: [
					'stylus'
				]
			}
		}
	});

	grunt.registerTask('default', ['stylus']);
	grunt.registerTask('monitor', ['watch']);

};