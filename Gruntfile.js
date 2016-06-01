/*jshint camelcase: false */
'use strict';
module.exports = function(grunt) {

    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
      
        dirs: {
          css: 'assets/styles',
          img: 'assets/images',
          js:  'assets/js',
          npm: 'node_modules'
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
            },
            svg: {
                files: ['<%= dirs.img %>/**/*.svg','!<%= dirs.img %>/sprite.symbol.svg','!<%= dirs.img %>/sprite.cc.svg'],
                tasks: ['svg_sprite']
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
                        '<%= dirs.js %>/source/**/*.js',
                        '<%= dirs.npm %>/lazysizes/lazysizes.js'
                    ]
                }
            }
        },
        
        // svg sprite
        svg_sprite: {
          symbol: {
            expand: true,
            cwd: '<%= dirs.img %>/symbols/',
            src: ['**/*.svg','!sprite.svg'],
            dest: '<%= dirs.img %>',
            
            options: {
              mode: {
                symbol: {
                  dest: './',
                  sprite: 'sprite.symbol.svg'
                }
              }
            }
          },
          ccIcons: {
            expand: true,
            cwd: '',
            src: ['<%= dirs.img %>/cc-icons/**/*.svg','!sprite.svg'],
            dest: '',
            
            options: {
              shape: {
                id: {
                  generator: function (name) {
                    var path = require('path');
                    return path.basename(name.replace(/\s+/g, this.whitespace), '.svg')
                  }
                },
                spacing: {
                  padding: [2]
                }
              },
              mode: {
                css: {
                  bust: false,
                  dest: './',
                  prefix: '.gform_card_icon_',
                  dimensions: '',
                  sprite: '<%= dirs.img %>/sprite.cc.svg',
                  layout: 'horizontal',
                  render: {
                    scss: {
                      dest: '<%= dirs.css %>/partials/_cc-icons'
                    }
                  }
                }
              }
            }
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
                    proxy: 'https://sbcg.dev',
                    port: 8000
                },
            }
        }

    });

    // build
    grunt.registerTask('build', ['sass', 'autoprefixer', 'cssmin', 'uglify', 'svg_sprite', 'imagemin']);

    // serve
    grunt.registerTask('serve', ['build', 'browserSync', 'watch']);

    // default
    grunt.registerTask('default', ['serve']);

};