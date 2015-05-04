'use strict';
module.exports = function(grunt) {

    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
      
        dirs: {
          css: 'assets/styles',
          img: 'assets/images',
          js:  'assets/js',
        },

        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            sass: {
                files: ['<%= dirs.css %>/**/*.{scss,sass}'],
                tasks: ['sass', 'autoprefixer', 'cssmin']
            },
            jshint: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'uglify']
            },
            js: {
                files: '<%= dirs.js %>/vendor/**/*.js',
                tasks: ['uglify']
            },
            images: {
                files: ['<%= dirs.img %>/**/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            }
        },

        // sass
        sass: {
            dist: {
                options: {
                    style: 'expanded',
                },
                files: {
                    '<%= dirs.css %>/build/style.css': '<%= dirs.css %>/style.scss',
                    '<%= dirs.css %>/build/editor-style.css': '<%= dirs.css %>/editor-style.scss'
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 9', 'ios 6', 'android 4'],
                map: true
            },
            files: {
                expand: true,
                flatten: true,
                src: '<%= dirs.css %>/build/*.css',
                dest: '<%= dirs.css %>/build'
            },
        },

        // css minify
        cssmin: {
            options: {
                keepSpecialComments: 1
            },
            minify: {
                expand: true,
                cwd: '<%= dirs.css %>/build',
                src: ['*.css', '!*.min.css'],
                ext: '.css'
            }
        },

        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                '<%= dirs.js %>/source/**/*.js'
            ]
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            main: {
                options: {
                    sourceMap: '<%= dirs.js %>/main.js.map',
                    sourceMappingURL: 'main.js.map',
                    sourceMapPrefix: 2
                },
                files: {
                    '<%= dirs.js %>/main.min.js': [
                        '<%= dirs.js %>/source/plugins.js',
                        '<%= dirs.js %>/vendor/navigation.js',
                        '<%= dirs.js %>/vendor/skip-link-focus-fix.js',
                        '<%= dirs.js %>/source/main.js'
                    ]
                }
            }
        },
        
        // svg sprite
        svg_sprite: {
          options: {
            mode: {
              symbol: {
                dest: './',
                sprite: 'sprite.symbol.svg'
              } 
            }
          },
          dist: {
            expand: true,
            cwd: '<%= dirs.img %>',
            src: ['**/*.svg','!sprite.symbol.svg'],
            dest: '<%= dirs.img %>',
          },
          
        },

        // image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true,
                    interlaced: true
                },
                files: [{
                    expand: true,
                    cwd: '<%= dirs.img %>/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: '<%= dirs.img %>/'
                }]
            }
        },

        // browserSync
        browserSync: {
            dev: {
                bsFiles: {
                    src : ['**/*.php','style.css', '<%= dirs.js %>/*.js', '<%= dirs.img %>/**/*.{png,jpg,jpeg,gif,webp,svg}']
                },
                options: {
                    watchTask: true,
                    proxy: 'sbcg.dev',
                    port: 8000
                },
            }
        },

        // deploy via rsync
        deploy: {
            options: {
                src: "./",
                args: ["--verbose"],
                exclude: ['.git*', 'node_modules', '.sass-cache', 'Gruntfile.js', 'package.json', '.DS_Store', 'README.md', 'config.rb', '.jshintrc'],
                recursive: true,
                syncDestIgnoreExcl: true
            },
            staging: {
                 options: {
                    dest: "~/path/to/theme",
                    host: "user@host.com"
                }
            },
            production: {
                options: {
                    dest: "~/path/to/theme",
                    host: "user@host.com"
                }
            }
        }

    });

    // rename tasks
    grunt.renameTask('rsync', 'deploy');

    // register task
    grunt.registerTask('default', ['sass', 'autoprefixer', 'cssmin', 'uglify', 'svg_sprite', 'imagemin', 'browserSync', 'watch']);

};
