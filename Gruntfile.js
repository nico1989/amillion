module.exports = function(grunt) {

  grunt.initConfig({
    sass: {
      dist: {
        options: {
          style: 'expanded'
        },
        files: [{ // C'est ici que l'on définit le dossier que l'on souhaite importer
          "expand": true,
          "cwd": "wp-content/themes/amillion/css/",
          "src": ["*.scss"],
          "dest": "wp-content/themes/amillion/css/",
          "ext": ".css"
        }]
      }
    },
    watch: {
      styles: {
        files: 'wp-content/themes/amillion/css/*.scss', // tous les fichiers Sass de n'importe quel dossier
        tasks: ['sass:dist']
      }
    }
  })

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');  

  grunt.registerTask('default', ['sass:dist'])
}