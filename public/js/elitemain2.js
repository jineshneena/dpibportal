! function(e) {
    function t(n) {
        if (i[n]) return i[n].exports;
        var r = i[n] = {
            i: n,
            l: !1,
            exports: {}
        };
        return e[n].call(r.exports, r, r.exports, t), r.l = !0, r.exports
    }
    var n = window.webpackJsonp;
    window.webpackJsonp = function(i, o, a) {
        for (var s, l, c, u = 0, d = []; u < i.length; u++) l = i[u], r[l] && d.push(r[l][0]), r[l] = 0;
        for (s in o) Object.prototype.hasOwnProperty.call(o, s) && (e[s] = o[s]);
        for (n && n(i, o, a); d.length;) d.shift()();
        if (a)
            for (u = 0; u < a.length; u++) c = t(t.s = a[u]);
        return c
    };
    var i = {},
        r = {
            8: 0
        };
    t.e = function(e) {
        function n() {
            s.onerror = s.onload = null, clearTimeout(l);
            var t = r[e];
            0 !== t && (t && t[1](new Error("Loading chunk " + e + " failed.")), r[e] = void 0)
        }
        var i = r[e];
        if (0 === i) return new Promise(function(e) {
            e()
        });
        if (i) return i[2];
        var o = new Promise(function(t, n) {
            i = r[e] = [t, n]
        });
        i[2] = o;
        var a = document.getElementsByTagName("head")[0],
            s = document.createElement("script");
        s.type = "text/javascript", s.charset = "utf-8", s.async = !0, s.timeout = 12e4, t.nc && s.setAttribute("nonce", t.nc), s.src = t.p + "" + e + "." + {
            0: "6f41227a1797b2045eec",
            1: "90dd8a6c7ede78530ec8",
            2: "f599f3714cacc51a6031",
            3: "e0e28bc58f01bf2ca35d",
            4: "2459b2166141e14f56f1",
            5: "53a3597eedbf22d97049",
            6: "21465da7386582c0e38e",
            7: "1c0dc24dbb01813e20af"
        } [e] + ".js";
        console.log('ssss',s)
        var l = setTimeout(n, 12e4);
        return s.onerror = s.onload = n, a.appendChild(s), o
    }, t.m = e, t.c = i, t.d = function(e, n, i) {
        t.o(e, n) || Object.defineProperty(e, n, {
            configurable: !1,
            enumerable: !0,
            get: i
        })
    }, t.n = function(e) {
        var n = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return t.d(n, "a", n), n
    }, t.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, t.p = "", t.oe = function(e) {
        throw console.error(e), e
    }, t(t.s = 72)
}({
    1: function(e, t) {
        var n;
        n = function() {
            return this
        }();
        try {
            n = n || Function("return this")() || (0, eval)("this")
        } catch (e) {
            "object" == typeof window && (n = window)
        }
        e.exports = n
    },
    63: function(e, t, n) {
        (function(n) {
            var i, r;
            ! function(n, o) {
                i = [], void 0 !== (r = function() {
                    return n.FileIcons = o()
                }.apply(t, i)) && (e.exports = r)
            }(this, function() {
                var e = {
                        directoryName: {},
                        directoryPath: {},
                        fileName: {},
                        filePath: {},
                        interpreter: {},
                        scope: {},
                        language: {},
                        signature: {}
                    },
                    t = function(e, t) {
                        this.index = e, this.icon = t[0], this.colour = t[1], this.match = t[2], this.priority = t[3] || 1, this.matchPath = t[4] || !1, this.interpreter = t[5] || null, this.scope = t[6] || null, this.lang = t[7] || null, this.signature = t[8] || null
                    };
                t.prototype.getClass = function(e, t) {
                    return e = void 0 !== e ? e : null, t = void 0 !== t && t, null === e || null === this.colour[0] ? t ? [this.icon] : this.icon : t ? [this.icon, this.colour[e]] : this.icon + " " + this.colour[e]
                };
                var n = function(e) {
                    this.directoryIcons = this.read(e[0]), this.fileIcons = this.read(e[1]), this.binaryIcon = this.matchScope("source.asm"), this.executableIcon = this.matchInterpreter("bash")
                };
                n.prototype.read = function(e) {
                    var n = e[0],
                        i = e[1];
                    return n = n.map(function(e, n) {
                        return new t(n, e)
                    }), i = i.map(function(e) {
                        return e.map(function(e) {
                            return n[e]
                        })
                    }), {
                        byName: n,
                        byInterpreter: i[0],
                        byLanguage: i[1],
                        byPath: i[2],
                        byScope: i[3],
                        bySignature: i[4]
                    }
                }, n.prototype.matchName = function(t, n) {
                    n = void 0 !== n && n;
                    var i = n ? this.cache.directoryName : e.fileName,
                        r = n ? this.directoryIcons.byName : this.fileIcons.byName;
                    if (i[t]) return i[t];
                    for (var o in r) {
                        var a = r[o];
                        if (a.match.test(t)) return i[t] = a
                    }
                    return null
                }, n.prototype.matchPath = function(t, n) {
                    n = void 0 !== n && n;
                    var i = n ? e.directoryName : e.fileName,
                        r = n ? this.directoryIcons.byPath : this.fileIcons.byPath;
                    if (i[name]) return i[name];
                    for (var o in r) {
                        var a = r[o];
                        if (a.match.test(t)) return i[t] = a
                    }
                    return null
                }, n.prototype.matchLanguage = function(t) {
                    if (e.language[t]) return e.language[t];
                    for (var n in this.fileIcons.byLanguage) {
                        var i = this.fileIcons.byLanguage[n];
                        if (i.lang.test(t)) return e.language[t] = i
                    }
                    return null
                }, n.prototype.matchScope = function(t) {
                    if (e.scope[t]) return e.scope[t];
                    for (var n in this.fileIcons.byScope) {
                        var i = this.fileIcons.byScope[n];
                        if (i.scope.test(t)) return e.scope[t] = i
                    }
                    return null
                }, n.prototype.matchInterpreter = function(t) {
                    if (e.interpreter[t]) return e.interpreter[t];
                    for (var n in this.fileIcons.byInterpreter) {
                        var i = this.fileIcons.byInterpreter[n];
                        if (i.interpreter.test(t)) return e.interpreter[t] = i
                    }
                    return null
                }, n.prototype.matchSignature = function(e) {};
                var i = [
                        [
                            [
                                ["arttext-icon", ["dark-purple", "dark-purple"], /\.artx$/i],
                                ["atom-icon", ["dark-green", "dark-green"], /^\.atom$/],
                                ["bower-icon", ["medium-yellow", "medium-orange"], /^bower[-_]components$/],
                                ["dropbox-icon", ["medium-blue", "medium-blue"], /^(?:Dropbox|\.dropbox\.cache)$/],
                                ["emacs-icon", ["medium-purple", "medium-purple"], /^\.emacs\.d$/],
                                ["dylib-icon", [null, null], /\.framework$/i],
                                ["git-icon", ["medium-red", "medium-red"], /\.git$/],
                                ["github-icon", [null, null], /^\.github$/],
                                ["meteor-icon", ["dark-orange", "dark-orange"], /^\.meteor$/],
                                ["node-icon", ["medium-green", "medium-green"], /^node_modules$/],
                                ["package-icon", [null, null], /^\.bundle$/i],
                                ["svn-icon", [null, null], /^\.svn$/i],
                                ["textmate-icon", [null, null], /\.tmBundle$/i],
                                ["vagrant-icon", ["medium-cyan", "medium-cyan"], /\.vagrant$/i],
                                ["appstore-icon", [null, null], /\.xcodeproj$/i]
                            ],
                            [
                                [],
                                [],
                                [],
                                [],
                                []
                            ]
                        ],
                        [
                            [
                                ["binary-icon", ["dark-green", "dark-green"], /\.swp$/i, 4],
                                ["link-icon", ["medium-blue", "medium-blue"], /\.lnk$/i, 3],
                                ["angular-icon", ["medium-red", "medium-red"], /^angular[^.]*\.js$/i, 2],
                                ["ant-icon", ["dark-pink", "dark-pink"], /^ant\.xml$|\.ant$/i, 2],
                                ["apache-icon", ["medium-red", "medium-red"], /^(?:apache2?|httpd).conf$/i, 2],
                                ["apache-icon", ["dark-green", "dark-green"], /\.vhost$/i, 2],
                                ["apache-icon", ["medium-green", "medium-green"], /\.thrift$/i, 2],
                                ["appcelerator-icon", ["medium-red", "medium-red"], /^appcelerator\.js$/i, 2],
                                ["appveyor-icon", ["medium-blue", "medium-blue"], /^appveyor\.yml$/i, 2],
                                ["archlinux-icon", ["dark-purple", "dark-purple"], /^\.install$/, 2],
                                ["archlinux-icon", ["dark-maroon", "dark-maroon"], /^\.SRCINFO$/, 2],
                                ["archlinux-icon", ["dark-yellow", "dark-yellow"], /^pacman\.conf$/, 2],
                                ["archlinux-icon", ["light-yellow", "light-yellow"], /^pamac\.conf$/, 2],
                                ["archlinux-icon", ["dark-cyan", "dark-cyan"], /^PKGBUILD$/, 2],
                                ["archlinux-icon", ["light-yellow", "light-yellow"], /yaourtrc$/i, 2],
                                ["backbone-icon", ["dark-blue", "dark-blue"], /^backbone(?:[-.]min|dev)?\.js$/i, 2],
                                ["boot-icon", ["medium-green", "dark-green"], /^Makefile\.boot$/i, 2],
                                ["bootstrap-icon", ["medium-yellow", "dark-yellow"], /^(?:custom\.)?bootstrap\S*\.js$/i, 2],
                                ["bootstrap-icon", ["medium-blue", "medium-blue"], /^(?:custom\.)?bootstrap\S*\.css$/i, 2],
                                ["bootstrap-icon", ["dark-blue", "dark-blue"], /^(?:custom\.)?bootstrap\S*\.less$/i, 2],
                                ["bootstrap-icon", ["light-pink", "light-pink"], /^(?:custom\.)?bootstrap\S*\.scss$/i, 2],
                                ["bootstrap-icon", ["medium-green", "medium-green"], /^(?:custom\.)?bootstrap\S*\.styl$/i, 2],
                                ["bower-icon", ["medium-yellow", "medium-orange"], /^(?:\.bowerrc|bower\.json|Bowerfile)$/i, 2],
                                ["brakeman-icon", ["medium-red", "medium-red"], /brakeman\.yml$/i, 2],
                                ["brakeman-icon", ["dark-red", "dark-red"], /^brakeman\.ignore$/i, 2],
                                ["broccoli-icon", ["medium-green", "medium-green"], /^Brocfile\./i, 2],
                                ["package-icon", ["light-orange", "light-orange"], /Cargo\.toml$/i, 2],
                                ["package-icon", ["dark-orange", "dark-orange"], /Cargo\.lock$/i, 2],
                                ["chai-icon", ["medium-red", "dark-red"], /^chai\.(?:[jt]sx?|es6?|coffee)$/i, 2],
                                ["chartjs-icon", ["dark-pink", "dark-pink"], /^Chart\.js$/i, 2],
                                ["circleci-icon", ["medium-green", "medium-green"], /^circle\.yml$/i, 2],
                                ["cc-icon", ["medium-green", "medium-green"], /\.codeclimate\.yml$/i, 2],
                                ["codecov-icon", ["dark-pink", "dark-pink"], /^codecov\.ya?ml$/i, 2],
                                ["coffee-icon", ["medium-cyan", "medium-cyan"], /\.coffee\.ecr$/i, 2],
                                ["coffee-icon", ["medium-red", "medium-red"], /\.coffee\.erb$/i, 2],
                                ["compass-icon", ["medium-red", "medium-red"], /^_?(?:compass|lemonade)\.scss$/i, 2],
                                ["composer-icon", ["medium-yellow", "medium-yellow"], /^composer\.(?:json|lock)$/i, 2],
                                ["composer-icon", ["dark-blue", "dark-blue"], /^composer\.phar$/i, 2],
                                ["cordova-icon", ["light-blue", "light-blue"], /^cordova(?:[^.]*\.|-(?:\d\.)+)js$/i, 2],
                                ["d3-icon", ["medium-orange", "medium-orange"], /^d3(?:\.v\d+)?[^.]*\.js$/i, 2],
                                ["database-icon", ["medium-red", "medium-red"], /^METADATA\.pb$/, 2],
                                ["database-icon", ["medium-red", "medium-red"], /\.git[\/\\](?:.*[\/\\])?(?:HEAD|ORIG_HEAD|packed-refs|logs[\/\\](?:.+[\/\\])?[^\/\\]+)$/, 2, !0],
                                ["docker-icon", ["dark-blue", "dark-blue"], /^(?:Dockerfile|docker-compose)|\.docker(?:file|ignore)$/i, 2, !1, , /\.dockerfile$/i, /^Docker$/i],
                                ["docker-icon", ["dark-orange", "dark-orange"], /^docker-sync\.yml$/i, 2],
                                ["dojo-icon", ["light-red", "light-red"], /^dojo\.js$/i, 2],
                                ["ember-icon", ["medium-red", "medium-red"], /^ember(?:\.|(?:-[^.]+)?-(?:\d+\.)+(?:debug\.)?)js$/i, 2],
                                ["eslint-icon", ["medium-purple", "medium-purple"], /\.eslint(?:cache|ignore)$/i, 2],
                                ["eslint-icon", ["light-purple", "light-purple"], /\.eslintrc(?:\.(?:js|json|ya?ml))?$/i, 2],
                                ["extjs-icon", ["light-green", "light-green"], /\bExtjs(?:-ext)?\.js$/i, 2],
                                ["fabfile-icon", ["medium-blue", "medium-blue"], /^fabfile\.py$/i, 2],
                                ["fuelux-icon", ["medium-orange", "dark-orange"], /^fuelux(?:\.min)?\.(?:css|js)$/i, 2],
                                ["gear-icon", ["medium-blue", "medium-blue"], /\.indent\.pro$/i, 2],
                                ["grunt-icon", ["medium-yellow", "medium-yellow"], /gruntfile\.js$/i, 2],
                                ["grunt-icon", ["medium-maroon", "medium-maroon"], /gruntfile\.coffee$/i, 2],
                                ["gulp-icon", ["medium-red", "medium-red"], /gulpfile\.js$|gulpfile\.babel\.js$/i, 2],
                                ["gulp-icon", ["medium-maroon", "medium-maroon"], /gulpfile\.coffee$/i, 2],
                                ["html5-icon", ["medium-cyan", "medium-cyan"], /\.html?\.ecr$/i, 2],
                                ["html5-icon", ["medium-red", "medium-red"], /\.(?:html?\.erb|rhtml)$/i, 2, !1, , /\.html\.erb$/i, /^HTML$/i],
                                ["ionic-icon", ["medium-blue", "medium-blue"], /^ionic\.project$/, 2],
                                ["js-icon", ["medium-cyan", "medium-cyan"], /\.js\.ecr$/i, 2],
                                ["js-icon", ["medium-red", "medium-red"], /\.js\.erb$/i, 2],
                                ["jquery-icon", ["dark-blue", "dark-blue"], /^jquery(?:[-.](?:min|latest|\d\.\d+(?:\.\d+)?))*\.(?:[jt]sx?|es6?|coffee|map)$/i, 2],
                                ["jqueryui-icon", ["dark-blue", "dark-blue"], /^jquery(?:[-_.](?:ui[-_.](?:custom|dialog-?\w*)|effects)(?:\.[^.]*)?|[-.]?ui(?:-\d\.\d+(?:\.\d+)?)?(?:\.\w+)?)(?:[-_.]?min|dev)?\.(?:[jt]sx?|es6?|coffee|map|s?css|less|styl)$/i, 2],
                                ["karma-icon", ["medium-cyan", "medium-cyan"], /^karma\.conf\.js$/i, 2],
                                ["karma-icon", ["medium-maroon", "medium-maroon"], /^karma\.conf\.coffee$/i, 2],
                                ["knockout-icon", ["medium-red", "medium-red"], /^knockout[-.](?:\d+\.){3}(?:debug\.)?js$/i, 2],
                                ["leaflet-icon", ["medium-green", "medium-green"], /^leaflet\.(?:draw-src|draw|spin|coordinates-(?:\d+\.)\d+\.\d+\.src)\.(?:js|css)$|^wicket-leaflet\.js$/i, 2],
                                ["lein-icon", [null, null], /project\.clj$/i, 2],
                                ["manpage-icon", ["dark-green", "dark-green"], /^tmac\.|^(?:mmn|mmt)$/i, 2],
                                ["marko-icon", ["medium-blue", "medium-blue"], /\.marko$/i, 2, !1, /^marko$/, /\.marko$/i, /^mark[0o]$/i],
                                ["marko-icon", ["medium-maroon", "medium-maroon"], /\.marko\.js$/i, 2],
                                ["materialize-icon", ["light-red", "light-red"], /^materialize(?:\.min)?\.(?:js|css)$/i, 2],
                                ["mathjax-icon", ["dark-green", "dark-green"], /^MathJax[^.]*\.js$/i, 2],
                                ["mocha-icon", ["medium-maroon", "medium-maroon"], /^mocha\.(?:[jt]sx?|es6?|coffee)$/i, 2],
                                ["mocha-icon", ["medium-red", "medium-red"], /^mocha\.(?:s?css|less|styl)$/i, 2],
                                ["mocha-icon", ["light-maroon", "light-maroon"], /mocha\.opts$/i, 2],
                                ["modernizr-icon", ["medium-red", "medium-red"], /^modernizr(?:[-\.]custom|-\d\.\d+)(?:\.\d+)?\.js$/i, 2],
                                ["mootools-icon", ["medium-purple", "medium-purple"], /^mootools[^.]*\d+\.\d+(?:.\d+)?[^.]*\.js$/i, 2],
                                ["neko-icon", ["dark-orange", "dark-orange"], /^run\.n$/, 2],
                                ["newrelic-icon", ["medium-cyan", "medium-cyan"], /^newrelic\.yml/i, 2],
                                ["nginx-icon", ["dark-green", "dark-green"], /^nginx\.conf$/i, 2],
                                ["shuriken-icon", ["dark-cyan", "dark-cyan"], /\.ninja\.d$/i, 2],
                                ["nodemon-icon", ["medium-green", "medium-green"], /^nodemon\.json$|^\.nodemonignore$/i, 2],
                                ["normalize-icon", ["medium-red", "medium-red"], /^normalize\.(?:css|less|scss|styl)$/i, 2],
                                ["npm-icon", ["medium-red", "medium-red"], /^(?:package\.json|\.npmignore|\.?npmrc|npm-debug\.log|npm-shrinkwrap\.json)$/i, 2],
                                ["postcss-icon", ["medium-yellow", "dark-yellow"], /\bpostcss\.config\.js$/i, 2],
                                ["protractor-icon", ["medium-red", "medium-red"], /^protractor\.conf\./i, 2],
                                ["pug-icon", ["medium-orange", "medium-orange"], /^\.pug-lintrc/i, 2],
                                ["raphael-icon", ["medium-orange", "medium-orange"], /^raphael(?:\.min|\.no-deps)*\.js$/i, 2],
                                ["react-icon", ["dark-blue", "dark-blue"], /^react(?:-[^.]*)?\.js$/i, 2],
                                ["react-icon", ["medium-blue", "dark-blue"], /\.react\.js$/i, 2],
                                ["book-icon", ["medium-blue", "medium-blue"], /^README(?:\b|_)|^(?:licen[sc]es?|(?:read|readme|click|delete|keep|test)\.me)$|\.(?:readme|1st)$/i, 2],
                                ["book-icon", ["dark-blue", "dark-blue"], /^(?:notice|bugs|changes|change[-_]?log(?:[-._]?\d+)?|contribute|contributing|contributors|copying|hacking|history|install|maintainers|manifest|more\.stuff|projects|revision|terms|thanks)$/i, 2],
                                ["requirejs-icon", ["medium-blue", "medium-blue"], /^require(?:[-.]min|dev)?\.js$/i, 2],
                                ["clojure-icon", ["medium-maroon", "dark-maroon"], /^riemann\.config$/i, 2],
                                ["rollup-icon", ["medium-red", "medium-red"], /^rollup\.config\./i, 2],
                                ["ruby-icon", ["light-green", "light-green"], /_spec\.rb$/i, 2],
                                ["scrutinizer-icon", ["dark-blue", "dark-blue"], /\.scrutinizer\.yml$/i, 2],
                                ["sencha-icon", ["light-green", "light-green"], /^sencha(?:\.min)?\.js$/i, 2],
                                ["snapsvg-icon", ["medium-cyan", "medium-cyan"], /^snap\.svg(?:[-.]min)?\.js$/i, 2],
                                ["sourcemap-icon", ["medium-blue", "medium-blue"], /\.css\.map$/i, 2],
                                ["sourcemap-icon", ["medium-yellow", "dark-yellow"], /\.js\.map$/i, 2],
                                ["stylelint-icon", ["medium-purple", "medium-purple"], /^\.stylelintrc(?:\.|$)/i, 2],
                                ["stylelint-icon", ["medium-yellow", "dark-yellow"], /^stylelint\.config\.js$/i, 2],
                                ["stylelint-icon", ["dark-blue", "dark-blue"], /\.stylelintignore$/i, 2],
                                ["toc-icon", ["medium-cyan", "dark-cyan"], /\.toc$/i, 2, !1, , /\.toc$/i, /^Table of Contents$/i],
                                ["calc-icon", ["medium-maroon", "medium-maroon"], /\.8x[pk](?:\.txt)?$/i, 2, !1, , , , /^\*\*TI[789]\d\*\*/],
                                ["travis-icon", ["medium-red", "medium-red"], /^\.travis/i, 2],
                                ["typedoc-icon", ["dark-purple", "dark-purple"], /^typedoc\.json$/i, 2],
                                ["typings-icon", ["medium-maroon", "medium-maroon"], /^typings\.json$/i, 2],
                                ["uikit-icon", ["medium-blue", "medium-blue"], /^uikit(?:\.min)?\.js$/i, 2],
                                ["webpack-icon", ["medium-blue", "medium-blue"], /webpack\.config\.|^webpackfile\.js$/i, 2],
                                ["wercker-icon", ["medium-purple", "medium-purple"], /^wercker\.ya?ml$/i, 2],
                                ["yarn-icon", ["medium-blue", "medium-blue"], /^yarn\.lock$/i, 2],
                                ["yeoman-icon", ["medium-cyan", "medium-cyan"], /\.yo-rc\.json$/i, 2],
                                ["yui-icon", ["dark-blue", "dark-blue"], /^(?:yahoo-|yui)[^.]*\.js$/i, 2],
                                ["emacs-icon", ["medium-red", "medium-red"], /\.gnus$/i, 1.5],
                                ["emacs-icon", ["dark-green", "dark-green"], /\.viper$/i, 1.5],
                                ["emacs-icon", ["dark-blue", "dark-blue"], /^Cask$/, 1.5],
                                ["emacs-icon", ["medium-blue", "medium-blue"], /^Project\.ede$/i, 1.5],
                                ["_1c-icon", ["medium-red", "medium-red"], /\.bsl$/i, , !1, , /\.bsl$/i, /^1C$|^1[\W_ \t]?C[\W_ \t]?Enterprise$/i],
                                ["_1c-icon", ["dark-orange", "dark-orange"], /\.sdbl$/i, , !1, , /\.sdbl$/i, /^1C$|^1[\W_ \t]?C[\W_ \t]?Query$/i],
                                ["_1c-icon", ["dark-red", "dark-red"], /\.os$/i],
                                ["_1c-alt-icon", ["medium-red", "dark-red"], /\.mdo$/i],
                                ["abap-icon", ["medium-orange", "medium-orange"], /\.abap$/i, , !1, , /\.abp$/i, /^ABAP$/i],
                                ["as-icon", ["medium-blue", "medium-blue"], /\.swf$/i],
                                ["as-icon", ["medium-red", "medium-red"], /\.as$/i, , !1, , /\.(?:flex-config|actionscript(?:\.\d+)?)$/i, /^ActionScript$|^(?:ActionScript\s*3|as3)$/i],
                                ["as-icon", ["medium-yellow", "dark-yellow"], /\.jsfl$/i],
                                ["as-icon", ["dark-red", "dark-red"], /\.swc$/i],
                                ["ada-icon", ["medium-blue", "medium-blue"], /\.(?:ada|adb|ads)$/i, , !1, , /\.ada$/i, /^Ada$|^(?:ada95|ada2005)$/i],
                                ["ae-icon", ["dark-pink", "dark-pink"], /\.aep$/i],
                                ["ae-icon", ["dark-purple", "dark-purple"], /\.aet$/i],
                                ["ai-icon", ["medium-orange", "medium-orange"], /\.ai$/i],
                                ["ai-icon", ["dark-orange", "dark-orange"], /\.ait$/i],
                                ["indesign-icon", ["dark-pink", "dark-pink"], /\.indd$|\.idml$/i],
                                ["indesign-icon", ["medium-purple", "medium-purple"], /\.indl$/i],
                                ["indesign-icon", ["dark-purple", "dark-purple"], /\.indt$|\.inx$/i],
                                ["indesign-icon", ["dark-blue", "dark-blue"], /\.indb$/i],
                                ["psd-icon", ["medium-blue", "medium-blue"], /\.psd$/i, , !1, , , , /^8BPS/],
                                ["psd-icon", ["dark-purple", "dark-purple"], /\.psb$/i],
                                ["premiere-icon", ["dark-purple", "dark-purple"], /\.prproj$/i],
                                ["premiere-icon", ["medium-maroon", "medium-maroon"], /\.prel$/i],
                                ["premiere-icon", ["medium-purple", "medium-purple"], /\.psq$/i],
                                ["alloy-icon", ["medium-red", "medium-red"], /\.als$/i, , !1, , /\.alloy$/i, /^Alloy$/i],
                                ["alpine-icon", ["dark-blue", "dark-blue"], /(?:\.|^)APKBUILD$/],
                                ["ampl-icon", ["dark-maroon", "dark-maroon"], /\.ampl$/i, , !1, , /\.ampl$/i, /^AMPL$/i],
                                ["sun-icon", ["medium-yellow", "dark-yellow"], /\.ansiweatherrc$/i],
                                ["antlr-icon", ["medium-red", "medium-red"], /\.g$/i, , !1, /^antlr$/, /\.antlr$/i, /^antlr$/i],
                                ["antlr-icon", ["medium-orange", "medium-orange"], /\.g4$/i],
                                ["apache-icon", ["dark-red", "dark-red"], /\.apacheconf$/i, , !1, , /\.apache-config$/i, /^Apache$|^(?:aconf|ApacheConf)$/i],
                                ["apache-icon", ["medium-purple", "medium-purple"], /apache2[\\\/]magic$/i, , !0],
                                ["api-icon", ["medium-blue", "medium-blue"], /\.apib$/i, , !1, , /\.apib$/i, /^API Blueprint$/i],
                                ["apl-icon", ["dark-cyan", "dark-cyan"], /\.apl$/i, , !1, /^apl$/, /\.apl$/i, /^apl$/i],
                                ["apl-icon", ["medium-maroon", "medium-maroon"], /\.apl\.history$/i],
                                ["apple-icon", ["medium-purple", "medium-purple"], /\.(?:applescript|scpt)$/i, , !1, /^osascript$/, /\.applescript$/i, /^Apple$|^[0o]sascript$/i],
                                ["arc-icon", ["medium-blue", "medium-blue"], /\.arc$/i],
                                ["arduino-icon", ["dark-cyan", "dark-cyan"], /\.ino$/i, , !1, , /\.arduino$/i, /^Arduino$/i],
                                ["asciidoc-icon", ["medium-blue", "medium-blue"], /\.(?:ad|adoc|asc|asciidoc)$/i, , !1, , /\.asciidoc$/i, /^AsciiDoc$/i],
                                ["asp-icon", ["dark-blue", "dark-blue"], /\.asp$/i, , !1, , /\.asp$/i, /^[Aa][Ss][Pp][\W_ \t]?[Nn][Ee][Tt]$|^aspx(?:-vb)?$/],
                                ["asp-icon", ["medium-maroon", "medium-maroon"], /\.asax$/i],
                                ["asp-icon", ["dark-green", "dark-green"], /\.ascx$/i],
                                ["asp-icon", ["medium-green", "medium-green"], /\.ashx$/i],
                                ["asp-icon", ["dark-cyan", "dark-cyan"], /\.asmx$/i],
                                ["asp-icon", ["medium-purple", "medium-purple"], /\.aspx$/i],
                                ["asp-icon", ["medium-cyan", "medium-cyan"], /\.axd$/i],
                                ["eclipse-icon", ["medium-maroon", "medium-maroon"], /\.aj$/i],
                                ["binary-icon", ["medium-red", "medium-red"], /\.(?:l?a|[ls]?o|out|s|a51|n?asm|axf|elf|prx|puff|was[mt]|z80)$|\.rpy[bc]$/i, , !1, , /(?:^|\.)(?:a[rs]m|x86|z80|lc-?3|cpu12|x86asm|m68k|assembly|avr(?:dis)?asm|dasm)(?:\.|$)/i, /^Assembly$|^n?asm$/i],
                                ["binary-icon", ["dark-blue", "dark-blue"], /\.agc$|\.d-objdump$/i, , !1, , /\.source\.agc$/i, /^Assembly$|^(?:Virtual\s*)?AGC$|^Apollo(?:[-_\s]*11)?\s*Guidance\s*Computer$/i],
                                ["binary-icon", ["dark-green", "dark-green"], /\.ko$/i],
                                ["binary-icon", ["medium-blue", "medium-blue"], /\.lst$/i, , !1, /^lst-cpu12$/, /\.lst-cpu12$/i, /^Assembly$|^lst[\W_ \t]?cpu12$/i],
                                ["binary-icon", ["dark-orange", "dark-orange"], /\.(?:(?:c(?:[+px]{2}?)?-?)?objdump|bsdiff|bin|dat|pak|pdb)$/i],
                                ["binary-icon", ["medium-orange", "medium-orange"], /\.gcode|\.gco/i],
                                ["binary-icon", ["dark-purple", "dark-purple"], /\.py[co]$/i],
                                ["binary-icon", [null, null], /\.DS_Store$/i],
                                ["ats-icon", ["medium-red", "medium-red"], /\.dats$/i, , !1, , /\.ats$/i, /^ATS$|^ats2$/i],
                                ["ats-icon", ["medium-blue", "medium-blue"], /\.hats$/i],
                                ["ats-icon", ["dark-yellow", "dark-yellow"], /\.sats$/i],
                                ["audacity-icon", ["medium-yellow", "medium-yellow"], /\.aup$/i],
                                ["audio-icon", ["medium-red", "medium-red"], /\.mp3$/i, , !1, , , , /^\xFF\xFB|^ID3/],
                                ["audio-icon", ["dark-yellow", "dark-yellow"], /\.wav$/i, , !1, , , , /^RIFF(?!.+WEBP)/],
                                ["audio-icon", ["dark-cyan", "dark-cyan"], /\.(?:aac|ac3|m4p)$/i, , !1, , , , /^\x0Bw/],
                                ["audio-icon", ["medium-purple", "medium-purple"], /\.aif[fc]?$/i, , !1, , , , /^FORM.{4}AIFF/],
                                ["audio-icon", ["medium-cyan", "medium-cyan"], /\.au$/i, , !1, , , , /^\.snd|^dns\./],
                                ["audio-icon", ["dark-red", "dark-red"], /\.flac$/i, , !1, , , , /^fLaC/],
                                ["audio-icon", ["medium-red", "medium-red"], /\.f4[ab]$/i, , !1, , , , /^FLV\x01\x04/],
                                ["audio-icon", ["medium-cyan", "medium-cyan"], /\.m4a$/i, , !1, , , , /^.{4}ftypM4A/],
                                ["audio-icon", ["dark-green", "dark-green"], /\.(?:mpc|mp\+)$/i, , !1, , , , /^MPCK/],
                                ["audio-icon", ["dark-orange", "dark-orange"], /\.oga$/i],
                                ["audio-icon", ["dark-maroon", "dark-maroon"], /\.opus$/i, , !1, , , , /OpusHead/],
                                ["audio-icon", ["dark-blue", "dark-blue"], /\.r[am]$/i, , !1, , , , /^\.RMF/],
                                ["audio-icon", ["medium-blue", "medium-blue"], /\.wma$/i],
                                ["augeas-icon", ["dark-orange", "dark-orange"], /\.aug$/i],
                                ["ahk-icon", ["dark-blue", "dark-blue"], /\.ahk$/i, , !1, /^ahk$/, /\.ahk$/i, /^AutoHotkey$|^ahk$/i],
                                ["ahk-icon", ["dark-purple", "dark-purple"], /\.ahkl$/i],
                                ["autoit-icon", ["medium-purple", "medium-purple"], /\.au3$/i, , !1, , /(?:^|\.)autoit(?:\.|$)/i, /^AutoIt$|^(?:AutoIt3|AutoItScript|au3)$/i],
                                ["terminal-icon", ["medium-blue", "medium-blue"], /\.awk$/i, , !1, /^awk$/, /\.awk$/i, /^awk$/i],
                                ["terminal-icon", ["medium-red", "medium-red"], /\.gawk$/i, , !1, /^gawk$/, /\.gawk$/i, /^AWK$|^gawk$/i],
                                ["terminal-icon", ["medium-maroon", "medium-maroon"], /\.mawk$/i, , !1, /^mawk$/, /\.mawk$/i, /^AWK$|^mawk$/i],
                                ["terminal-icon", ["dark-green", "dark-green"], /\.nawk$/i, , !1, /^nawk$/, /\.nawk$/i, /^AWK$|^nawk$/i],
                                ["terminal-icon", ["dark-cyan", "dark-cyan"], /\.auk$/i],
                                ["babel-icon", ["medium-yellow", "medium-yellow"], /\.(?:babelrc|languagebabel|babel)$/i],
                                ["babel-icon", ["dark-yellow", "dark-yellow"], /\.babelignore$/i],
                                ["bibtex-icon", ["medium-red", "dark-red"], /\.cbx$/i],
                                ["bibtex-icon", ["medium-orange", "dark-orange"], /\.bbx$/i],
                                ["bibtex-icon", ["medium-yellow", "dark-yellow"], /\.bib$/i, , !1, /^bibtex$/, /\.bibtex$/i, /^bibtex$/i],
                                ["bibtex-icon", ["medium-green", "dark-green"], /\.bst$/i],
                                ["gnu-icon", ["medium-red", "medium-red"], /\.bison$/i, , !1, , /\.bison$/i, /^Bison$/i],
                                ["blender-icon", ["medium-orange", "medium-orange"], /\.blend$/i],
                                ["blender-icon", ["dark-orange", "dark-orange"], /\.blend\d+$/i],
                                ["blender-icon", ["dark-blue", "dark-blue"], /\.bphys$/i],
                                ["bluespec-icon", ["dark-blue", "dark-blue"], /\.bsv$/i, , !1, , /\.bsv$/i, /^Bluespec$/i],
                                ["boo-icon", ["medium-green", "medium-green"], /\.boo$/i, , !1, , /\.boo(?:\.unity)?$/i, /^Boo$/i],
                                ["boot-icon", [null, null], /\.boot$/i],
                                ["brain-icon", ["dark-pink", "dark-pink"], /\.bf?$/i, , !1, , /\.(?:bf|brainfuck)$/i, /^Brainfuck$|^(?:bf|Brainf\**ck)$/i],
                                ["brew-icon", ["medium-orange", "medium-orange"], /^Brewfile$/],
                                ["bro-icon", ["dark-cyan", "dark-cyan"], /\.bro$/i, , !1, , /\.bro$/i, /^Bro$/i],
                                ["byond-icon", ["medium-blue", "medium-blue"], /\.dm$/i, , !1, , /\.dm$/i, /^BYOND$|^(?:DM|Dream\s*Maker(?:\s*Script)?)$/i],
                                ["c-icon", ["medium-blue", "medium-blue"], /\.c$/i, , !1, /^tcc$/, /\.c$/i, /^C$/i],
                                ["c-icon", ["medium-purple", "medium-purple"], /\.h$|\.cats$/i],
                                ["c-icon", ["medium-green", "medium-green"], /\.idc$/i],
                                ["c-icon", ["medium-maroon", "medium-maroon"], /\.w$/i],
                                ["c-icon", ["dark-blue", "dark-blue"], /\.nc$/i],
                                ["c-icon", ["medium-cyan", "medium-cyan"], /\.upc$/i],
                                ["csharp-icon", ["medium-blue", "dark-blue"], /\.cs$/i, , !1, , /\.cs$/i, /^C#$|^c\s*sharp$/i],
                                ["csscript-icon", ["dark-green", "dark-green"], /\.csx$/i, , !1, , /\.csx$/i, /^C#-Script$/i],
                                ["cpp-icon", ["medium-blue", "dark-blue"], /\.c[+px]{2}$|\.cc$/i, , !1, , /\.cpp$/i, /^C\+\+$|c[-_]?pp|cplusplus/i],
                                ["cpp-icon", ["medium-purple", "dark-purple"], /\.h[+px]{2}$/i],
                                ["cpp-icon", ["medium-orange", "dark-orange"], /\.[it]pp$/i],
                                ["cpp-icon", ["medium-red", "dark-red"], /\.(?:tcc|inl)$/i],
                                ["cabal-icon", ["medium-cyan", "medium-cyan"], /\.cabal$/i, , !1, , /\.cabal$/i, /^Cabal$/i],
                                ["cake-icon", ["medium-yellow", "medium-yellow"], /\.cake$/i, , !1, , /\.cake$/i, /^Cake$/i],
                                ["cakefile-icon", ["medium-red", "medium-red"], /^Cakefile$/],
                                ["cakephp-icon", ["medium-red", "medium-red"], /\.ctp$/i],
                                ["ceylon-icon", ["medium-orange", "medium-orange"], /\.ceylon$/i],
                                ["chapel-icon", ["medium-green", "medium-green"], /\.chpl$/i, , !1, , /\.chapel$/i, /^Chapel$|^chpl$/i],
                                ["chrome-icon", ["medium-red", "medium-red"], /\.crx$/i, , !1, , , , /^Cr24/],
                                ["chuck-icon", ["medium-green", "medium-green"], /\.ck$/i, , !1, , /\.chuck$/i, /^ChucK$/i],
                                ["cirru-icon", ["medium-pink", "dark-pink"], /\.cirru$/i, , !1, , /\.cirru$/i, /^Cirru$/i],
                                ["clarion-icon", ["medium-orange", "medium-orange"], /\.clw$/i, , !1, , /\.clarion$/i, /^Clarion$/i],
                                ["clean-icon", ["dark-cyan", "dark-cyan"], /\.icl$/i, , !1, /^clean$/, /\.clean$/i, /^clean$/i],
                                ["clean-icon", ["medium-cyan", "medium-cyan"], /\.dcl$/i],
                                ["clean-icon", ["medium-blue", "medium-blue"], /\.abc$/i],
                                ["click-icon", ["medium-yellow", "medium-yellow"], /\.click$/i, , !1, , /\.click$/i, /^Click$|^Click!$/i],
                                ["clips-icon", ["dark-green", "dark-green"], /\.clp$/i, , !1, , /\.clips$/i, /^CLIPS$/i],
                                ["clojure-icon", ["medium-blue", "dark-blue"], /\.clj$/i, , !1, /^clojure$/, /\.clojure$/i, /^cl[0o]jure$/i],
                                ["clojure-icon", ["medium-purple", "dark-purple"], /\.cl2$/i],
                                ["clojure-icon", ["medium-green", "dark-green"], /\.cljc$/i],
                                ["clojure-icon", ["medium-red", "dark-red"], /\.cljx$|\.hic$/i],
                                ["cljs-icon", ["medium-blue", "dark-blue"], /\.cljs(?:\.hl|cm)?$/i],
                                ["cmake-icon", ["medium-green", "medium-green"], /\.cmake$/i, , !1, /^cmake$/, /\.cmake$/i, /^cmake$/i],
                                ["cmake-icon", ["medium-red", "medium-red"], /^CMakeLists\.txt$/],
                                ["coffee-icon", ["medium-maroon", "medium-maroon"], /\.coffee$/i, , !1, /^coffee$/, /\.coffee$/i, /^CoffeeScript$|^Coffee(?:-Script)?$/i],
                                ["coffee-icon", ["dark-maroon", "dark-maroon"], /\.cjsx$/i],
                                ["coffee-icon", ["light-maroon", "light-maroon"], /\.litcoffee$/i, , !1, /^litcoffee$/, /\.litcoffee$/i, /^CoffeeScript$|^litc[0o]ffee$/i],
                                ["coffee-icon", ["medium-blue", "medium-blue"], /\.iced$/i],
                                ["cf-icon", ["light-cyan", "light-cyan"], /\.cfc$/i, , !1, , /\.cfscript$/i, /^ColdFusion$|^(?:CFC|CFScript)$/i],
                                ["cf-icon", ["medium-cyan", "medium-cyan"], /\.cfml?$/i, , !1, , /\.cfml?$/i, /^ColdFusion$|^(?:cfml?|ColdFusion\s*HTML)$/i],
                                ["khronos-icon", ["medium-orange", "medium-orange"], /\.dae$/i],
                                ["cl-icon", ["medium-orange", "medium-orange"], /\.cl$/i, , !1, /^(?:c?lisp|sbcl|[ec]cl)$/, /\.common-lisp$/i, /^Common Lisp$|^c?lisp$/i],
                                ["cp-icon", ["medium-maroon", "medium-maroon"], /\.cp$/i],
                                ["cp-icon", ["dark-red", "dark-red"], /\.cps$/i],
                                ["zip-icon", [null, null], /\.(?:zip|z|xz)$/i, , !1, , , , /^(?:\x50\x4B(?:\x03\x04|\x05\x06|\x07|\x08)|\x1F[\x9D\xA0]|BZh|RNC[\x01\x02]|\xD0\xCF\x11\xE0)/],
                                ["zip-icon", ["medium-blue", "medium-blue"], /\.rar$/i, , !1, , , , /^Rar!\x1A\x07\x01?\0/],
                                ["zip-icon", ["dark-blue", "dark-blue"], /\.t?gz$|\.tar$|\.whl$/i, , !1, , , , /^\x1F\x8B/],
                                ["zip-icon", ["medium-maroon", "medium-maroon"], /\.(?:lzo?|lzma|tlz|tar\.lzma)$/i, , !1, , , , /^LZIP/],
                                ["zip-icon", ["medium-maroon", "medium-maroon"], /\.7z$/i, , !1, , , , /^7z\xBC\xAF\x27\x1C/],
                                ["zip-icon", ["medium-red", "medium-red"], /\.apk$|\.gem$/i],
                                ["zip-icon", ["dark-cyan", "dark-cyan"], /\.bz2$/i],
                                ["zip-icon", ["medium-blue", "medium-blue"], /\.iso$/i, , !1, , , , /^\x45\x52\x02\0{3}|^\x8B\x45\x52\x02/],
                                ["zip-icon", ["medium-orange", "medium-orange"], /\.xpi$/i],
                                ["zip-icon", ["medium-green", "medium-green"], /\.epub$/i],
                                ["zip-icon", ["dark-pink", "dark-pink"], /\.jar$/i],
                                ["zip-icon", ["medium-purple", "medium-purple"], /\.war$/i],
                                ["zip-icon", ["dark-orange", "dark-orange"], /\.xar$/i, , !1, , , , /^xar!/],
                                ["zip-icon", ["light-orange", "light-orange"], /\.egg$/i],
                                ["config-icon", ["medium-yellow", "medium-yellow"], /\.(?:ini|desktop|directory|cfg|conf|prefs)$/i, , !1, , /\.ini$/i, /^d[0o]sini$/i],
                                ["config-icon", ["medium-purple", "medium-purple"], /\.properties$/i, , !1, , /\.java-properties$/i],
                                ["config-icon", ["medium-green", "medium-green"], /\.toml$|\.opts$/i],
                                ["config-icon", ["dark-red", "dark-red"], /\.ld$/i],
                                ["config-icon", ["medium-red", "medium-red"], /\.lds$|\.reek$/i],
                                ["config-icon", ["dark-blue", "dark-blue"], /\.terminal$/i],
                                ["config-icon", ["medium-orange", "medium-orange"], /^ld\.script$/i],
                                ["config-icon", ["dark-red", "dark-red"], /\.git[\/\\](?:config|info[\/\\]\w+)$/, , !0],
                                ["config-icon", ["dark-orange", "dark-orange"], /^\/(?:private\/)?etc\/(?:[^\/]+\/)*[^\/]*\.(?:cf|conf|ini)(?:\.default)?$/i, , !0],
                                ["config-icon", ["medium-maroon", "medium-maroon"], /^\/(?:private\/)?etc\/(?:aliases|auto_(?:home|master)|ftpusers|group|gettytab|hosts(?:\.equiv)?|manpaths|networks|paths|protocols|services|shells|sudoers|ttys)$/i, , !0],
                                ["coq-icon", ["medium-maroon", "medium-maroon"], /\.coq$/i, , !1, , /\.coq$/i, /^Coq$/i],
                                ["creole-icon", ["medium-blue", "medium-blue"], /\.creole$/i, , !1, , /\.creole$/i, /^Creole$/i],
                                ["crystal-icon", ["medium-cyan", "medium-cyan"], /\.e?cr$/i, , !1, /^crystal$/, /\.crystal$/i, /^Crystal$/i],
                                ["csound-icon", ["medium-maroon", "medium-maroon"], /\.orc$/i, , !1, , /\.csound$/i, /^Csound$|^cs[0o]und[\W_ \t]?[0o]rc$/i],
                                ["csound-icon", ["dark-orange", "dark-orange"], /\.udo$/i],
                                ["csound-icon", ["dark-maroon", "dark-maroon"], /\.csd$/i, , !1, , /\.csound-document$/i, /^Csound$|^cs[0o]und[\W_ \t]?csd$/i],
                                ["csound-icon", ["dark-blue", "dark-blue"], /\.sco$/i, , !1, , /\.csound-score$/i, /^Csound$|^cs[0o]und[\W_ \t]?sc[0o]$/i],
                                ["css3-icon", ["medium-blue", "medium-blue"], /\.css$/i, , !1, /^css$/, /\.css$/i, /^css$/i],
                                ["css3-icon", ["dark-blue", "dark-blue"], /\.less$/i, , !1, /^less$/, /\.less$/i, /^CSS$|^less$/i],
                                ["cucumber-icon", ["medium-green", "medium-green"], /\.feature$/i, , !1, , /(?:^|\.)(?:gherkin\.feature|cucumber\.steps)(?:\.|$)/i, /^Cucumber$|^gherkin$/i],
                                ["nvidia-icon", ["medium-green", "medium-green"], /\.cu$/i, , !1, , /\.cuda(?:-c\+\+)?$/i, /^CUDA$/i],
                                ["nvidia-icon", ["dark-green", "dark-green"], /\.cuh$/i],
                                ["cython-icon", ["medium-orange", "medium-orange"], /\.pyx$/i, , !1, , /\.cython$/i, /^Cython$|^pyrex$/i],
                                ["cython-icon", ["medium-blue", "medium-blue"], /\.pxd$/i],
                                ["cython-icon", ["dark-blue", "dark-blue"], /\.pxi$/i],
                                ["dlang-icon", ["medium-red", "medium-red"], /\.di?$/i, , !1, , /\.d$/i, /^D$/i],
                                ["yang-icon", ["medium-red", "medium-red"], /\.dnh$/i, , !1, , /\.danmakufu$/i, /^Danmakufu$/i],
                                ["darcs-icon", ["medium-green", "medium-green"], /\.d(?:arcs)?patch$/i],
                                ["dart-icon", ["medium-cyan", "medium-cyan"], /\.dart$/i, , !1, /^dart$/, /\.dart$/i, /^Dart$/i],
                                ["dashboard-icon", ["medium-orange", "medium-orange"], /\.s[kl]im$/i, , !1, /^slim$/, /\.slim$/i, /^slim$/i],
                                ["dashboard-icon", ["medium-green", "medium-green"], /\.cpuprofile$/i],
                                ["database-icon", ["medium-yellow", "medium-yellow"], /\.(?:h|geo|topo)?json$/i],
                                ["database-icon", ["light-red", "light-red"], /\.ya?ml$/i],
                                ["database-icon", ["medium-maroon", "medium-maroon"], /\.cson$|\.ston$|^mime\.types$/i],
                                ["database-icon", ["dark-yellow", "dark-yellow"], /\.json5$/i, , !1, /^json5$/, /\.json5$/i, /^js[0o]n5$/i],
                                ["database-icon", ["medium-red", "medium-red"], /\.http$|\.pot?$/i],
                                ["database-icon", ["medium-orange", "medium-orange"], /\.ndjson$|\.pytb$/i, , !1, , /\.python\.traceback$/i],
                                ["database-icon", ["light-blue", "light-blue"], /\.fea$/i, , !1, , /\.opentype$/i, /^afdk[0o]$/i],
                                ["database-icon", ["medium-purple", "medium-purple"], /\.json\.eex$|\.edn$/i],
                                ["database-icon", ["dark-cyan", "dark-cyan"], /\.proto$/i, , !1, , /\.protobuf$/i, /^(?:protobuf|Protocol\s*Buffers?)$/i],
                                ["database-icon", ["dark-blue", "dark-blue"], /\.pydeps$|\.rviz$/i],
                                ["database-icon", ["dark-purple", "dark-purple"], /\.eam\.fs$/i],
                                ["database-icon", ["medium-pink", "medium-pink"], /\.qml$/i],
                                ["database-icon", ["dark-pink", "dark-pink"], /\.qbs$/i],
                                ["database-icon", ["medium-cyan", "medium-cyan"], /\.ttl$/i, , !1, , /\.turtle$/i],
                                ["database-icon", ["medium-blue", "medium-blue"], /\.syntax$/i],
                                ["database-icon", ["dark-red", "dark-red"], /[\/\\](?:magic[\/\\]Magdir|file[\/\\]magic)[\/\\][-.\w]+$|lib[\\\/]icons[\\\/]\.icondb\.js$/i, , !0],
                                ["dbase-icon", ["medium-red", "medium-red"], /\.dbf$/i],
                                ["debian-icon", ["medium-red", "medium-red"], /\.deb$/i],
                                ["debian-icon", ["dark-cyan", "dark-cyan"], /^control$/],
                                ["debian-icon", ["medium-cyan", "medium-cyan"], /^rules$/],
                                ["diff-icon", ["medium-orange", "medium-orange"], /\.diff$/i, , !1, , /\.diff$/i, /^Diff$|^udiff$/i],
                                ["earth-icon", ["medium-blue", "medium-blue"], /\.zone$/i],
                                ["earth-icon", ["medium-green", "medium-green"], /\.arpa$/i],
                                ["earth-icon", ["dark-blue", "dark-blue"], /^CNAME$/],
                                ["doxygen-icon", ["medium-blue", "medium-blue"], /^Doxyfile$/, , !1, , /\.doxygen$/i, /^Doxyfile$/i],
                                ["dyalog-icon", ["medium-orange", "medium-orange"], /\.dyalog$/i, , !1, /^dyalog$/],
                                ["dylib-icon", ["medium-cyan", "medium-cyan"], /\.(?:dylib|bundle)$/i],
                                ["e-icon", ["medium-green", "medium-green"], /\.E$/, , !1, /^rune$/],
                                ["eagle-icon", ["medium-red", "medium-red"], /\.sch$/i],
                                ["eagle-icon", ["dark-red", "dark-red"], /\.brd$/i],
                                ["ec-icon", ["dark-blue", "dark-blue"], /\.ec$/i, , !1, /^ec$/, /\.ec$/i, /^ec$/i],
                                ["ec-icon", ["dark-purple", "dark-purple"], /\.eh$/i],
                                ["ecere-icon", ["medium-blue", "medium-blue"], /\.epj$/i],
                                ["eclipse-icon", ["dark-blue", "dark-blue"], /\.c?project$/],
                                ["eclipse-icon", ["medium-red", "medium-red"], /\.classpath$/i],
                                ["editorconfig-icon", ["medium-orange", "medium-orange"], /\.editorconfig$/i, , !1, , /\.editorconfig$/i, /^EditorConfig$/i],
                                ["eiffel-icon", ["medium-cyan", "medium-cyan"], /\.e$/, , !1, , /\.eiffel$/i, /^Eiffel$/i],
                                ["elixir-icon", ["dark-purple", "dark-purple"], /\.ex$/i, , !1, /^elixir$/, /\.elixir$/i, /^elixir$/i],
                                ["elixir-icon", ["medium-purple", "medium-purple"], /\.(?:exs|eex)$/i],
                                ["elixir-icon", ["light-purple", "light-purple"], /mix\.exs?$/i],
                                ["elm-icon", ["medium-blue", "medium-blue"], /\.elm$/i, , !1, , /\.elm$/i, /^Elm$/i],
                                ["emacs-icon", ["medium-purple", "medium-purple"], /(?:^|\.)(?:el|_?emacs|spacemacs|emacs\.desktop|abbrev[-_]defs)$/i, , !1, /^emacs$/, /\.emacs\.lisp$/i, /^Emacs Lisp$|^elisp$/i],
                                ["emacs-icon", ["dark-purple", "dark-purple"], /(?:^|\.)(?:elc|eld)$/i, , !1, , , , /^;ELC\x17\0{3}/],
                                ["at-icon", ["medium-red", "dark-red"], /^(?:authors|owners)$/i],
                                ["em-icon", ["medium-red", "medium-red"], /\.emberscript$/i, , !1, , /\.ember(?:script)?$/i, /^EmberScript$/i],
                                ["mustache-icon", ["medium-blue", "medium-blue"], /\.em(?:blem)?$/i, , !1, , /\.emblem$/i, /^Emblem$/i],
                                ["eq-icon", ["medium-orange", "medium-orange"], /\.eq$/i, , !1, , /\.eq$/i, /^EQ$/i],
                                ["erlang-icon", ["medium-red", "medium-red"], /\.erl$/i, , !1, /^escript$/, /\.erlang$/i, /^Erlang$/i],
                                ["erlang-icon", ["dark-red", "dark-red"], /\.beam$/i],
                                ["erlang-icon", ["medium-maroon", "medium-maroon"], /\.hrl$/i],
                                ["erlang-icon", ["medium-green", "medium-green"], /\.xrl$/i],
                                ["erlang-icon", ["dark-green", "dark-green"], /\.yrl$/i],
                                ["erlang-icon", ["dark-maroon", "dark-maroon"], /\.app\.src$/i],
                                ["factor-icon", ["medium-orange", "medium-orange"], /\.factor$/i, , !1, , /\.factor$/i, /^Factor$/i],
                                ["factor-icon", ["dark-orange", "dark-orange"], /\.factor-rc$/i],
                                ["factor-icon", ["medium-red", "medium-red"], /\.factor-boot-rc$/i],
                                ["fancy-icon", ["dark-blue", "dark-blue"], /\.fy$/i, , !1, /^fancy$/, /\.fancy$/i, /^fancy$/i],
                                ["fancy-icon", ["medium-blue", "medium-blue"], /\.fancypack$/i],
                                ["fancy-icon", ["medium-green", "medium-green"], /^Fakefile$/],
                                ["fantom-icon", ["medium-blue", "medium-blue"], /\.fan$/i, , !1, , /\.fan(?:tom)?$/i, /^Fantom$/i],
                                ["fbx-icon", ["medium-maroon", "medium-maroon"], /\.fbx$/i],
                                ["finder-icon", ["medium-blue", "medium-blue"], /^Icon\r$/],
                                ["finder-icon", ["dark-blue", "dark-blue"], /\.rsrc$/i],
                                ["flow-icon", ["medium-orange", "medium-orange"], /\.(?:flowconfig|js\.flow)$/i],
                                ["flux-icon", ["medium-blue", "medium-blue"], /\.fx$/i],
                                ["flux-icon", ["dark-blue", "dark-blue"], /\.flux$/i],
                                ["font-icon", ["dark-blue", "dark-blue"], /\.woff2$/i, , !1, , , , /^wOF2/],
                                ["font-icon", ["medium-blue", "medium-blue"], /\.woff$/i, , !1, , , , /^wOFF/],
                                ["font-icon", ["light-green", "light-green"], /\.eot$/i, , !1, , , , /^.{34}LP/],
                                ["font-icon", ["dark-green", "dark-green"], /\.ttc$/i, , !1, , , , /^ttcf/],
                                ["font-icon", ["medium-green", "medium-green"], /\.ttf$/i, , !1, , , , /^\0\x01\0{3}/],
                                ["font-icon", ["dark-yellow", "dark-yellow"], /\.otf$/i, , !1, , , , /^OTTO.*\0/],
                                ["font-icon", ["dark-red", "dark-red"], /\.pfb$/i],
                                ["font-icon", ["medium-red", "medium-red"], /\.pfm$/i],
                                ["ff-icon", ["medium-orange", "medium-orange"], /\.pe$/i, , !1, /^fontforge$/, /\.source\.fontforge$/i, /^FontForge$|^pfaedit$/i],
                                ["ff-icon", ["dark-blue", "dark-blue"], /\.sfd$/i, , !1, , /\.text\.sfd$/i, /^FontForge$/i],
                                ["fortran-icon", ["medium-maroon", "medium-maroon"], /\.f$/i, , !1, , /\.fortran\.?(?:modern|punchcard)?$/i, /^Fortran$/i],
                                ["fortran-icon", ["medium-green", "medium-green"], /\.f90$/i, , !1, , /\.fortran\.free$/i, /^Fortran$/i],
                                ["fortran-icon", ["medium-red", "medium-red"], /\.f03$/i],
                                ["fortran-icon", ["medium-blue", "medium-blue"], /\.f08$/i],
                                ["fortran-icon", ["medium-maroon", "medium-maroon"], /\.f77$/i, , !1, , /\.fortran\.fixed$/i, /^Fortran$/i],
                                ["fortran-icon", ["dark-pink", "dark-pink"], /\.f95$/i],
                                ["fortran-icon", ["dark-cyan", "dark-cyan"], /\.for$/i],
                                ["fortran-icon", ["dark-yellow", "dark-yellow"], /\.fpp$/i],
                                ["freemarker-icon", ["medium-blue", "medium-blue"], /\.ftl$/i, , !1, , /\.ftl$/i, /^FreeMarker$|^ftl$/i],
                                ["frege-icon", ["dark-red", "dark-red"], /\.fr$/i],
                                ["fsharp-icon", ["medium-blue", "medium-blue"], /\.fs[xi]?$/i, , !1, , /\.fsharp$/i, /^FSharp$|^f#$/i],
                                ["gml-icon", ["medium-green", "medium-green"], /\.gml$/i],
                                ["gams-icon", ["dark-red", "dark-red"], /\.gms$/i, , !1, , /\.gams(?:-lst)?$/i, /^GAMS$/i],
                                ["gap-icon", ["medium-yellow", "dark-yellow"], /\.gap$/i, , !1, /^gap$/, /\.gap$/i, /^gap$/i],
                                ["gap-icon", ["dark-blue", "dark-blue"], /\.gi$/i],
                                ["gap-icon", ["medium-orange", "medium-orange"], /\.tst$/i],
                                ["gdb-icon", ["medium-green", "dark-green"], /\.gdb$/i, , !1, /^gdb$/, /\.gdb$/i, /^gdb$/i],
                                ["gdb-icon", ["medium-cyan", "dark-cyan"], /gdbinit$/i],
                                ["godot-icon", ["medium-blue", "medium-blue"], /\.gd$/i, , !1, , /\.gdscript$/i, /^GDScript$/i],
                                ["gear-icon", ["medium-red", "medium-red"], /^\.htaccess$|\.yardopts$/i],
                                ["gear-icon", ["medium-orange", "medium-orange"], /^\.htpasswd$/i],
                                ["gear-icon", ["dark-green", "dark-green"], /^\.env\.|\.pairs$/i],
                                ["gear-icon", ["dark-yellow", "dark-yellow"], /^\.lesshintrc$/i],
                                ["gear-icon", ["medium-yellow", "medium-yellow"], /^\.csscomb\.json$|\.csslintrc$|\.jsbeautifyrc$|\.jshintrc$|\.jscsrc$/i],
                                ["gear-icon", ["medium-maroon", "medium-maroon"], /\.coffeelintignore$|\.codoopts$/i],
                                ["gear-icon", ["medium-blue", "medium-blue"], /\.module$/i],
                                ["gear-icon", ["dark-blue", "dark-blue"], /\.arcconfig$|\.python-version$/i],
                                ["gear-icon", ["dark-orange", "dark-orange"], /\.lintstagedrc$/i],
                                ["gears-icon", ["dark-orange", "dark-orange"], /\.dll$/i, , !1, , , , /^PMOCCMOC/],
                                ["code-icon", ["medium-blue", "medium-blue"], /\.xml$|\.config$|\.4th$|\.cocci$|\.dyl$|\.dylan$|\.ecl$|\.forth$|\.launch$|\.manifest$|\.menu$|\.srdf$|\.st$|\.ui$|\.wsf$|\.x3d$|\.xaml$/i, , !1, , , , /^<\?xml /],
                                ["code-icon", ["dark-red", "dark-red"], /\.rdf$|\.capnp$|\.dotsettings$|\.flex$|\.fsh$|\.fsproj$|\.prw$|\.xproj$/i, , !1, , /\.capnp$/i],
                                ["code-icon", ["medium-blue", "medium-blue"], /^_service$/],
                                ["code-icon", ["medium-red", "medium-red"], /^configure\.ac$|\.ML$/],
                                ["code-icon", ["medium-green", "medium-green"], /^Settings\.StyleCop$/],
                                ["code-icon", ["medium-green", "medium-green"], /\.abnf$|\.ditaval$|\.storyboard$|\.xmi$|\.yacc$/i, , !1, /^abnf$/, /\.abnf$/i, /^abnf$/i],
                                ["code-icon", ["medium-purple", "medium-purple"], /\.aepx$|\.dita$|\.grace$|\.lid$|\.nproj$/i],
                                ["code-icon", ["dark-cyan", "dark-cyan"], /\.agda$|\.plist$|\.wisp$|\.xlf$|\.xslt$/i, , !1, , /\.plist$/i],
                                ["code-icon", ["medium-orange", "medium-orange"], /\.appxmanifest$|\.befunge$|\.fun$|\.muf$|\.xul$/i],
                                ["code-icon", ["medium-cyan", "medium-cyan"], /\.ash$|\.asn1?$|\.lagda$|\.lex$|\.props$|\.resx$|\.smt2$|\.vsh$|\.xsl$|\.yy$/i, , !1, /^xsl$/, /\.xsl$/i],
                                ["code-icon", ["dark-blue", "dark-blue"], /\.axml$|\.bmx$|\.brs$|\.ccxml$|\.clixml$|\.fth$|\.intr$|\.mdpolicy$|\.mtml$|\.myt$|\.xsd$/i, , !1, /^brightscript$/, /\.brightscript$/i],
                                ["code-icon", ["medium-maroon", "medium-maroon"], /\.bnf$|\.cbl$|\.cob$|\.cobol$|\.fxml$/i, , !1, /^bnf$/, /\.bnf$/i, /^bnf$/i],
                                ["code-icon", ["dark-maroon", "dark-maroon"], /\.ccp$|\.cpy$|\.mxml$/i],
                                ["code-icon", ["medium-red", "medium-red"], /\.ch$|\.cw$|\.ebnf$|\.iml$|\.jflex$|\.m4$|\.mask$|\.mumps$|\.prg$|\.pt$|\.rl$|\.sml$|\.targets$|\.webidl$|\.wsdl$|\.xacro$|\.xliff$/i, , !1, /^ebnf$/, /\.ebnf$/i],
                                ["code-icon", ["dark-pink", "dark-pink"], /\.ct$|\.zcml$/i],
                                ["code-icon", ["dark-green", "dark-green"], /\.cy$|\.eclxml$|\.ivy$|\.sed$|\.tml$|\.y$/i],
                                ["code-icon", ["dark-purple", "dark-purple"], /\.ditamap$|\.frt$|\.lp$|\.omgrofl$|\.osm$|\.wxs$|\.xib$/i],
                                ["code-icon", ["medium-pink", "medium-pink"], /\.filters$|\.lol$|\.pig$/i],
                                ["code-icon", ["dark-orange", "dark-orange"], /\.grxml$|\.urdf$/i],
                                ["code-icon", ["medium-yellow", "medium-yellow"], /\.jelly$/i],
                                ["code-icon", ["dark-yellow", "dark-yellow"], /\.jsproj$|\.ohm$|\.sgml?$/i, , !1, /^ohm$/, /\.ohm$/i],
                                ["code-icon", ["dark-blue", "dark-blue"], /\.mq[45h]$/i, , !1, , /(?:^|\.)mq[45](?=\.|$)/i],
                                ["code-icon", ["light-green", "light-green"], /\.odd$/i],
                                ["code-icon", ["light-blue", "light-blue"], /\.psc1$|\.smt$/i, , !1, /boolector|cvc4|mathsat5|opensmt|smtinterpol|smt-rat|stp|verit|yices2|z3/, /\.smt$/i],
                                ["code-icon", ["light-cyan", "light-cyan"], /\.scxml$/i],
                                ["code-icon", ["light-maroon", "light-maroon"], /\.sig$|\.wxl$/i],
                                ["code-icon", ["light-orange", "light-orange"], /\.ux$|\.wxi$/i],
                                ["code-icon", ["light-purple", "light-purple"], /\.vxml$/i],
                                ["genshi-icon", ["medium-red", "medium-red"], /\.kid$/i, , !1, , /\.genshi$/i, /^Genshi$|^xml\+(?:genshi|kid)$/i],
                                ["gentoo-icon", ["dark-cyan", "dark-cyan"], /\.ebuild$/i, , !1, , /\.ebuild$/i, /^Gentoo$/i],
                                ["gentoo-icon", ["medium-blue", "medium-blue"], /\.eclass$/i],
                                ["git-icon", ["medium-red", "medium-red"], /^\.git|^\.keep$|\.mailmap$/i, , !1, , /\.git-(?:commit|config|rebase)$/i, /^Git$/i],
                                ["git-commit-icon", ["medium-red", "medium-red"], /^COMMIT_EDITMSG$/],
                                ["git-merge-icon", ["medium-red", "medium-red"], /^MERGE_(?:HEAD|MODE|MSG)$/],
                                ["glade-icon", ["medium-green", "medium-green"], /\.glade$/i],
                                ["pointwise-icon", ["medium-blue", "medium-blue"], /\.glf$/i],
                                ["glyphs-icon", ["medium-green", "medium-green"], /\.glyphs$/i],
                                ["gn-icon", ["dark-blue", "dark-blue"], /\.gn$/i, , !1, /^gn$/, /\.gn$/i, /^gn$/i],
                                ["gn-icon", ["medium-blue", "medium-blue"], /\.gni$/i],
                                ["gnu-icon", ["medium-red", "dark-red"], /\.(?:gnu|gplv[23])$/i],
                                ["graph-icon", ["medium-red", "medium-red"], /\.(?:gp|plo?t|gnuplot)$/i, , !1, /^gnuplot$/, /\.gnuplot$/i, /^Gnuplot$/i],
                                ["go-icon", ["medium-blue", "medium-blue"], /\.go$/i, , !1, , /\.go(?:template)?$/i, /^Go$/i],
                                ["golo-icon", ["medium-orange", "medium-orange"], /\.golo$/i, , !1, , /\.golo$/i, /^Golo$/i],
                                ["gosu-icon", ["medium-blue", "medium-blue"], /\.gs$/i, , !1, , /\.gosu(?:\.\d+)?$/i, /^Gosu$/i],
                                ["gosu-icon", ["medium-green", "medium-green"], /\.gst$/i],
                                ["gosu-icon", ["dark-green", "dark-green"], /\.gsx$/i],
                                ["gosu-icon", ["dark-blue", "dark-blue"], /\.vark$/i],
                                ["gradle-icon", ["medium-blue", "medium-blue"], /\.gradle$/i, , !1, , /\.gradle$/i, /^Gradle$/i],
                                ["gradle-icon", ["dark-purple", "dark-purple"], /gradlew$/i],
                                ["gf-icon", ["medium-red", "medium-red"], /\.gf$/i],
                                ["graphql-icon", ["medium-pink", "medium-pink"], /\.graphql$/i, , !1, , /\.graphql$/i, /^GraphQL$/i],
                                ["graphql-icon", ["medium-purple", "medium-purple"], /\.gql$/i],
                                ["graphviz-icon", ["medium-blue", "medium-blue"], /\.gv$/i, , !1, , /\.dot$/i, /^Graphviz$/i],
                                ["graphviz-icon", ["dark-cyan", "dark-cyan"], /\.dot$/i],
                                ["groovy-icon", ["light-blue", "light-blue"], /\.(?:groovy|grt|gtpl|gsp|gvy)$/i, , !1, /^groovy$/, /\.groovy$/i, /^Groovy$|^gsp$/i],
                                ["hack-icon", ["medium-orange", "medium-orange"], /\.hh$/i, , !1, , /\.hack$/i, /^Hack$/i],
                                ["haml-icon", ["medium-yellow", "medium-yellow"], /\.haml$/i, , !1, /^haml$/, /\.haml$/i, /^haml$/i],
                                ["haml-icon", ["medium-maroon", "medium-maroon"], /\.hamlc$/i, , !1, /^hamlc$/, /\.hamlc$/i, /^Haml$|^hamlc$/i],
                                ["harbour-icon", ["dark-blue", "dark-blue"], /\.hb$/i, , !1, , /\.harbour$/i, /^Harbour$/i],
                                ["hashicorp-icon", ["dark-purple", "dark-purple"], /\.hcl$/i, , !1, , /(?:^|\.)(?:hcl|hashicorp)(?:\.|$)/i, /^Hashicorp Configuration Language$/i],
                                ["haskell-icon", ["medium-purple", "medium-purple"], /\.hs$/i, , !1, /^runhaskell$/, /\.source\.haskell$/i, /^Haskell$/i],
                                ["haskell-icon", ["medium-blue", "medium-blue"], /\.hsc$/i, , !1, , /\.hsc2hs$/i, /^Haskell$/i],
                                ["haskell-icon", ["dark-purple", "dark-purple"], /\.c2hs$/i, , !1, , /\.c2hs$/i, /^Haskell$|^C2hs(?:\s*Haskell)?$/i],
                                ["haskell-icon", ["dark-blue", "dark-blue"], /\.lhs$/i, , !1, , /\.latex\.haskell$/i, /^Haskell$|^(?:lhaskell|lhs|Literate\s*Haskell)$/i],
                                ["haxe-icon", ["medium-orange", "medium-orange"], /\.hx(?:[sm]l|)?$/, , !1, , /(?:^|\.)haxe(?:\.\d+)?$/i, /^Haxe$/i],
                                ["heroku-icon", ["medium-purple", "medium-purple"], /^Procfile$/],
                                ["heroku-icon", ["light-purple", "light-purple"], /\.buildpacks$/i],
                                ["heroku-icon", ["dark-purple", "dark-purple"], /^\.vendor_urls$/],
                                ["html5-icon", ["medium-orange", "medium-orange"], /\.x?html?$/i, , !1, , /\.html\.basic$/i, /^HTML$|^(?:xhtml|htm)$/i],
                                ["html5-icon", ["medium-red", "medium-red"], /\.cshtml$|\.latte$/i, , !1, /^latte$/, /\.latte$/i],
                                ["html5-icon", ["medium-green", "medium-green"], /\.ejs$|\.kit$|\.swig$/i, , !1, /^swig$/, /\.swig$/i],
                                ["html5-icon", ["dark-blue", "dark-blue"], /\.gohtml$|\.phtml$/i, , !1, /^gohtml$/, /\.gohtml$/i, /^HTML$|^g[0o]html$/i],
                                ["html5-icon", ["medium-purple", "medium-purple"], /\.html\.eex$|\.jsp$/i, , !1, , /\.jsp$/i],
                                ["html5-icon", ["medium-cyan", "medium-cyan"], /\.shtml$/i],
                                ["html5-icon", ["dark-red", "dark-red"], /\.scaml$/i, , !1, /^scaml$/, /\.scaml$/i, /^HTML$|^scaml$/i],
                                ["html5-icon", ["medium-red", "medium-red"], /\.vash$/i, , !1, /^vash$/, /\.vash$/i, /^HTML$|^vash$/i],
                                ["html5-icon", ["medium-blue", "medium-blue"], /\.dtml$/i, , !1, /^dtml$/, /\.dtml$/i, /^HTML$|^dtml$/i],
                                ["hy-icon", ["dark-blue", "dark-blue"], /\.hy$/i, , !1, , /\.hy$/i, /^Hy$|^hylang$/i],
                                ["idl-icon", ["medium-blue", "medium-blue"], /\.dlm$/i, , !1, , /\.idl$/i, /^IDL$/i],
                                ["idris-icon", ["dark-red", "dark-red"], /\.idr$/i, , !1, , /\.(?:idris|ipkg)$/i, /^Idris$/i],
                                ["idris-icon", ["medium-maroon", "medium-maroon"], /\.lidr$/i],
                                ["igorpro-icon", ["dark-red", "dark-red"], /\.ipf$/i],
                                ["image-icon", ["medium-orange", "medium-orange"], /\.a?png$|\.svgz$/i, , !1, , , , /^.PNG\r\n\x1A\n/],
                                ["image-icon", ["medium-yellow", "medium-yellow"], /\.gif$|\.ora$|\.sgi$/i, , !1, , , , /^GIF8[97]a/],
                                ["image-icon", ["medium-green", "medium-green"], /\.jpg$/i, , !1, , , , /^\xFF\xD8\xFF[\xDB\xE0\xE1]|(?:JFIF|Exif)\0|^\xCF\x84\x01|^\xFF\xD8.+\xFF\xD9$/],
                                ["image-icon", ["medium-blue", "medium-blue"], /\.ico$/i, , !1, , , , /^\0{2}\x01\0/],
                                ["image-icon", ["dark-blue", "dark-blue"], /\.webp$|\.iff$|\.lbm$|\.liff$|\.nrrd$|\.pcx$|\.vsdx?$/i, , !1, , , , /^RIFF.{4}WEBPVP8/],
                                ["image-icon", ["medium-red", "medium-red"], /\.bmp$/i, , !1, , , , /^BM/],
                                ["image-icon", ["medium-red", "medium-red"], /\.bpg$/i, , !1, , , , /^BPG\xFB/],
                                ["image-icon", ["medium-orange", "medium-orange"], /\.cin$/i, , !1, , , , /^\x80\x2A\x5F\xD7/],
                                ["image-icon", ["dark-green", "dark-green"], /\.cd5$/i, , !1, , , , /^_CD5\x10\0/],
                                ["image-icon", ["light-yellow", "light-yellow"], /\.cpc$/i],
                                ["image-icon", ["medium-orange", "medium-orange"], /\.cr2$/i, , !1, , , , /^II\*\0\x10\0{3}CR/],
                                ["image-icon", ["medium-pink", "medium-pink"], /\.dcm$|\.mpo$|\.pbm$/i, , !1, , , , /^.{128}DICM/],
                                ["image-icon", ["dark-green", "dark-green"], /\.dds$/i, , !1, , , , /^DDS \|\0{3}/],
                                ["image-icon", ["medium-purple", "medium-purple"], /\.djvu?$|\.pxr$/i, , !1, , , , /^AT&TFORM/],
                                ["image-icon", ["dark-orange", "dark-orange"], /\.dpx$|\.raw$/i, , !1, , , , /^(?:SDPX|XPDS)/],
                                ["image-icon", ["light-blue", "light-blue"], /\.ecw$|\.sct$/i],
                                ["image-icon", ["dark-yellow", "dark-yellow"], /\.exr$/i, , !1, , , , /^v\/1\x01/],
                                ["image-icon", ["medium-cyan", "medium-cyan"], /\.fits?$|\.fts$/i, , !1, , , , /^SIMPLE  =/],
                                ["image-icon", ["dark-red", "dark-red"], /\.flif$|\.hdp$|\.heic$|\.heif$|\.jxr$|\.wdp$/i, , !1, , , , /^FLIF/],
                                ["image-icon", ["medium-blue", "medium-blue"], /\.hdr$/i, , !1, , , , /^#\?RADIANCE\n/],
                                ["image-icon", ["medium-pink", "medium-pink"], /\.icns$/i, , !1, , , , /^icns/],
                                ["image-icon", ["dark-green", "dark-green"], /\.(?:jp[f2xm]|j2c|mj2)$/i, , !1, , , , /^\0{3}\fjP {2}/],
                                ["image-icon", ["dark-cyan", "dark-cyan"], /\.jps$/i],
                                ["image-icon", ["medium-orange", "medium-orange"], /\.mng$/i, , !1, , , , /^.MNG\r\n\x1A\n/],
                                ["image-icon", ["light-red", "light-red"], /\.pgf$/i],
                                ["image-icon", ["light-purple", "light-purple"], /\.pict$/i],
                                ["image-icon", ["dark-orange", "dark-orange"], /\.tga$/i, , !1, , , , /TRUEVISION-XFILE\.\0$/],
                                ["image-icon", ["medium-red", "medium-red"], /\.tiff?$/i, , !1, , , , /^II\x2A\0|^MM\0\x2A/],
                                ["image-icon", ["dark-maroon", "dark-maroon"], /\.wbm$/i],
                                ["inform7-icon", ["medium-blue", "medium-blue"], /\.ni$/i, , !1, , /\.inform-?7?$/i, /^Inform 7$|^i7$/i],
                                ["inform7-icon", ["dark-blue", "dark-blue"], /\.i7x$/i],
                                ["inno-icon", ["dark-blue", "dark-blue"], /\.iss$/i, , !1, , /\.inno$/i, /^Inno Setup$/i],
                                ["io-icon", ["dark-purple", "dark-purple"], /\.io$/i, , !1, /^io$/, /^source\.io$/i, /^Io$/i],
                                ["ioke-icon", ["medium-red", "medium-red"], /\.ik$/i, , !1, /^ioke$/],
                                ["isabelle-icon", ["dark-red", "dark-red"], /\.thy$/i, , !1, , /\.isabelle\.theory$/i, /^Isabelle$/i],
                                ["isabelle-icon", ["dark-blue", "dark-blue"], /^ROOT$/],
                                ["j-icon", ["light-blue", "light-blue"], /\.ijs$/i, , !1, /^jconsole$/, /\.j$/i, /^J$/i],
                                ["jade-icon", ["medium-red", "medium-red"], /\.jade$/i, , !1, , /\.jade$/i, /^Jade$/i],
                                ["jake-icon", ["medium-maroon", "dark-maroon"], /^Jakefile$/],
                                ["jake-icon", ["medium-yellow", "dark-yellow"], /\.jake$/i],
                                ["java-icon", ["medium-purple", "medium-purple"], /\.java$/i, , !1, , /\.java$/i, /^Java$/i],
                                ["js-icon", ["medium-yellow", "dark-yellow"], /\.js$|\.es6$|\.es$/i, , !1, /^(?:node|iojs)$/, /\.js$/i, /^JavaScript$|^(?:js|node)$/i],
                                ["js-icon", ["medium-orange", "dark-orange"], /\._js$/i],
                                ["js-icon", ["medium-maroon", "dark-maroon"], /\.jsb$|\.dust$/i],
                                ["js-icon", ["medium-blue", "dark-blue"], /\.jsm$|\.mjs$|\.xsjslib$/i],
                                ["js-icon", ["medium-green", "dark-green"], /\.jss$/i],
                                ["js-icon", ["medium-pink", "dark-pink"], /\.sjs$/i],
                                ["js-icon", ["medium-red", "dark-red"], /\.ssjs$/i],
                                ["js-icon", ["medium-purple", "dark-purple"], /\.xsjs$/i],
                                ["jenkins-icon", ["medium-red", "dark-red"], /^Jenkinsfile$/],
                                ["jinja-icon", ["dark-red", "dark-red"], /\.jinja$/i, , !1, , /\.jinja$/i, /^Jinja$|^(?:django|htmldjango|html\+django\/jinja|html\+jinja)$/i],
                                ["jinja-icon", ["medium-red", "medium-red"], /\.jinja2$/i],
                                ["jsonld-icon", ["medium-blue", "medium-blue"], /\.jsonld$/i],
                                ["sql-icon", ["medium-blue", "medium-blue"], /\.jq$/i, , !1, , /\.jq$/i, /^JSONiq$/i],
                                ["jsx-icon", ["medium-blue", "dark-blue"], /\.jsx$/i, , !1, , /\.jsx$/i, /^JSX$/i],
                                ["julia-icon", ["medium-purple", "medium-purple"], /\.jl$/i, , !1, , /\.julia$/i, /^Julia$/i],
                                ["jupyter-icon", ["dark-orange", "dark-orange"], /\.ipynb$/i, , !1, , /\.ipynb$/i, /^(?:ipynb|(?:Jupyter|IPython)\s*Notebook)$/i],
                                ["jupyter-icon", ["dark-cyan", "dark-cyan"], /^Notebook$/],
                                ["keynote-icon", ["medium-blue", "medium-blue"], /\.keynote$/i],
                                ["keynote-icon", ["dark-blue", "dark-blue"], /\.knt$/i],
                                ["kivy-icon", ["dark-maroon", "dark-maroon"], /\.kv$/i, , !1, , /\.kv$/i, /^Kivy$/i],
                                ["earth-icon", ["medium-green", "medium-green"], /\.kml$/i],
                                ["kotlin-icon", ["dark-blue", "dark-blue"], /\.kt$/i, , !1, /^kotlin$/, /\.kotlin$/i, /^k[0o]tlin$/i],
                                ["kotlin-icon", ["medium-blue", "medium-blue"], /\.ktm$/i],
                                ["kotlin-icon", ["medium-orange", "medium-orange"], /\.kts$/i],
                                ["krl-icon", ["medium-blue", "medium-blue"], /\.krl$/i, , !1, , /\.krl$/i, /^KRL$/i],
                                ["labview-icon", ["dark-blue", "dark-blue"], /\.lvproj$/i],
                                ["laravel-icon", ["medium-orange", "medium-orange"], /\.blade\.php$/i, , !1, , /\.php\.blade$/i, /^Laravel$/i],
                                ["lasso-icon", ["dark-blue", "dark-blue"], /\.lasso$|\.las$/i, , !1, , /\.lasso$/i, /^Lasso$|^lass[0o]script$/i],
                                ["lasso-icon", ["medium-blue", "medium-blue"], /\.lasso8$/i],
                                ["lasso-icon", ["medium-purple", "medium-purple"], /\.lasso9$/i],
                                ["lasso-icon", ["medium-red", "medium-red"], /\.ldml$/i],
                                ["lean-icon", ["dark-purple", "dark-purple"], /\.lean$/i, , !1, /^lean$/, /\.lean$/i, /^lean$/i],
                                ["lean-icon", ["dark-red", "dark-red"], /\.hlean$/i],
                                ["lfe-icon", ["dark-red", "dark-red"], /\.lfe$/i],
                                ["lightwave-icon", ["medium-red", "medium-red"], /\.lwo$/i],
                                ["lightwave-icon", ["medium-blue", "medium-blue"], /\.lws$/i],
                                ["lisp-icon", ["medium-red", "medium-red"], /\.lsp$/i, , !1, /^newlisp$/, /\.newlisp$/i, /^Lisp$|^newlisp$/i],
                                ["lisp-icon", ["dark-red", "dark-red"], /\.lisp$/i, , !1, /^lisp$/, /\.lisp$/i, /^lisp$/i],
                                ["lisp-icon", ["medium-maroon", "medium-maroon"], /\.l$|\.nl$/i, , !1, /picolisp|pil/],
                                ["lisp-icon", ["medium-blue", "medium-blue"], /\.ny$|\.sexp$/i],
                                ["lisp-icon", ["medium-purple", "medium-purple"], /\.podsl$/i],
                                ["ls-icon", ["medium-blue", "medium-blue"], /\.ls$/i, , !1, , /\.livescript$/i, /^LiveScript$|^(?:ls|live-script)$/i],
                                ["ls-icon", ["dark-blue", "dark-blue"], /\._ls$/i],
                                ["ls-icon", ["medium-green", "medium-green"], /^Slakefile$/],
                                ["llvm-icon", ["dark-green", "dark-green"], /\.ll$/i, , !1, /^llvm$/, /\.llvm$/i, /^llvm$/i],
                                ["llvm-icon", ["medium-yellow", "dark-yellow"], /\.clang-format$/i],
                                ["mobile-icon", ["dark-blue", "dark-blue"], /\.xm$/i, , !1, /^logos$/, /\.logos$/i, /^l[0o]g[0o]s$/i],
                                ["mobile-icon", ["dark-red", "dark-red"], /\.xi$/i],
                                ["logtalk-icon", ["medium-red", "medium-red"], /\.(?:logtalk|lgt)$/i, , !1, , /\.logtalk$/i, /^Logtalk$/i],
                                ["lookml-icon", ["medium-purple", "medium-purple"], /\.lookml$/i],
                                ["lsl-icon", ["medium-cyan", "medium-cyan"], /\.lsl$/i, , !1, /^lsl$/, /\.lsl$/i, /^lsl$/i],
                                ["lsl-icon", ["dark-cyan", "dark-cyan"], /\.lslp$/i],
                                ["lua-icon", ["medium-blue", "medium-blue"], /\.lua$/i, , !1, /^lua$/, /\.lua$/i, /^lua$/i],
                                ["lua-icon", ["dark-blue", "dark-blue"], /\.pd_lua$/i],
                                ["lua-icon", ["dark-purple", "dark-purple"], /\.rbxs$/i],
                                ["lua-icon", ["dark-red", "dark-red"], /\.wlua$/i],
                                ["checklist-icon", ["medium-yellow", "medium-yellow"], /^Makefile|^makefile$/, , !1, /^make$/, /\.makefile$/i, /^Makefile$|^(?:bsdmake|make|mf)$/i],
                                ["checklist-icon", ["medium-yellow", "medium-yellow"], /\.(?:mk|mak|make)$|^mkfile$/i],
                                ["checklist-icon", ["medium-red", "medium-red"], /^BSDmakefile$|\.am$/i],
                                ["checklist-icon", ["medium-green", "medium-green"], /^GNUmakefile$/i],
                                ["checklist-icon", ["medium-blue", "medium-blue"], /^Kbuild$/],
                                ["checklist-icon", ["dark-blue", "dark-blue"], /\.bb$/i],
                                ["checklist-icon", ["dark-blue", "dark-blue"], /^DEPS$/],
                                ["checklist-icon", ["medium-blue", "medium-blue"], /\.mms$/i],
                                ["checklist-icon", ["light-blue", "light-blue"], /\.mmk$/i],
                                ["checklist-icon", ["dark-purple", "dark-purple"], /\.pri$/i],
                                ["mako-icon", ["dark-blue", "dark-blue"], /\.mak?o$/i, , !1, , /\.mako$/i, /^Mako$/i],
                                ["manpage-icon", ["dark-green", "dark-green"], /\.(?:1(?:[bcmsx]|has|in)?|[24568]|3(?:avl|bsm|3c|in|m|qt|x)?|7(?:d|fs|i|ipp|m|p)?|9[efps]?|chem|eqn|groff|man|mandoc|mdoc|me|mom|n|nroff|pic|tmac|tmac-u|tr|troff)$/i, , !1, /man|mandoc|(?:[gnt]|dit)roff/i, /\.[gt]?roff$/i, /^Manual Page$|^(?:[gtn]?roff|manpage)$/i, /^\.TH[ \t]+(?:\S+)|^'\\" [tre]+(?=\s|$)/],
                                ["manpage-icon", ["dark-maroon", "dark-maroon"], /\.(?:rnh|rno|roff|run|runoff)$/i, , !1, /^runoff$/, /\.runoff$/i, /^Manual Page$|^run[0o]ff$/i],
                                ["mapbox-icon", ["medium-cyan", "medium-cyan"], /\.mss$/i, , !1, , /\.mss$/i, /^Mapbox$|^Carto(?:CSS)?$/i],
                                ["markdown-icon", ["medium-blue", "medium-blue"], /\.(?:md|mdown|markdown|mkd|mkdown|mkdn|rmd|ron)$/i, , !1, , /\.gfm$/i, /^Markdown$/i],
                                ["mathematica-icon", ["dark-red", "dark-red"], /\.mathematica$|\.nbp$/i, , !1, , /\.mathematica$/i, /^Mathematica$|^mma$/i],
                                ["mathematica-icon", ["medium-red", "medium-red"], /\.cdf$/i],
                                ["mathematica-icon", ["medium-orange", "medium-orange"], /\.ma$/i],
                                ["mathematica-icon", ["medium-maroon", "medium-maroon"], /\.mt$/i],
                                ["mathematica-icon", ["dark-orange", "dark-orange"], /\.nb$/i],
                                ["mathematica-icon", ["medium-yellow", "medium-yellow"], /\.wl$/i],
                                ["mathematica-icon", ["dark-yellow", "dark-yellow"], /\.wlt$/i],
                                ["matlab-icon", ["medium-yellow", "medium-yellow"], /\.matlab$/i, , !1, , /\.(?:matlab|octave)$/i, /^MATLAB$|^[0o]ctave$/i],
                                ["max-icon", ["dark-purple", "dark-purple"], /\.maxpat$/i],
                                ["max-icon", ["medium-red", "medium-red"], /\.maxhelp$/i],
                                ["max-icon", ["medium-blue", "medium-blue"], /\.maxproj$/i],
                                ["max-icon", ["medium-purple", "medium-purple"], /\.mxt$/i],
                                ["max-icon", ["medium-green", "medium-green"], /\.pat$/i],
                                ["maxscript-icon", ["dark-blue", "dark-blue"], /\.ms$/i, , !1, , /\.maxscript$/i, /^MAXScript$/i],
                                ["maxscript-icon", ["dark-purple", "dark-purple"], /\.mcr$/i],
                                ["maxscript-icon", ["medium-red", "medium-red"], /\.mce$/i],
                                ["maxscript-icon", ["dark-cyan", "dark-cyan"], /\.max$/i],
                                ["maxscript-icon", ["medium-cyan", "medium-cyan"], /\.3ds$/i],
                                ["maya-icon", ["dark-cyan", "dark-cyan"], /\.mb$/i],
                                ["maya-icon", ["dark-blue", "dark-blue"], /\.mel$/i],
                                ["maya-icon", ["dark-purple", "dark-purple"], /\.mcf[ip]$/i],
                                ["mediawiki-icon", ["medium-yellow", "medium-yellow"], /\.mediawiki$/i, , !1, /^mediawiki$/, /\.mediawiki$/i, /^mediawiki$/i],
                                ["mediawiki-icon", ["medium-orange", "medium-orange"], /\.wiki$/i],
                                ["bullhorn-icon", ["medium-orange", "medium-orange"], /^\.mention-bot$/i],
                                ["mercury-icon", ["medium-cyan", "medium-cyan"], /\.moo$/i, , !1, /^mmi$/, /\.mercury$/i, /^Mercury$/i],
                                ["metal-icon", ["dark-cyan", "dark-cyan"], /\.metal$/i],
                                ["access-icon", ["dark-maroon", "dark-maroon"], /\.accda$/i],
                                ["access-icon", ["medium-maroon", "medium-maroon"], /\.accdb$/i],
                                ["access-icon", ["medium-green", "medium-green"], /\.accde$/i],
                                ["access-icon", ["medium-red", "medium-red"], /\.accdr$/i],
                                ["access-icon", ["dark-red", "dark-red"], /\.accdt$/i],
                                ["access-icon", ["light-maroon", "light-maroon"], /\.adn$|\.laccdb$/i],
                                ["access-icon", ["dark-purple", "dark-purple"], /\.mdw$/i],
                                ["excel-icon", ["dark-orange", "dark-orange"], /\.xls$/i],
                                ["excel-icon", ["dark-green", "dark-green"], /\.xlsx$/i],
                                ["excel-icon", ["medium-green", "medium-green"], /\.xlsm$/i],
                                ["excel-icon", ["medium-red", "medium-red"], /\.xlsb$/i],
                                ["excel-icon", ["dark-cyan", "dark-cyan"], /\.xlt$/i],
                                ["onenote-icon", ["dark-purple", "dark-purple"], /\.one$/i],
                                ["powerpoint-icon", ["dark-red", "dark-red"], /\.pps$/i],
                                ["powerpoint-icon", ["medium-orange", "medium-orange"], /\.ppsx$/i],
                                ["powerpoint-icon", ["dark-orange", "dark-orange"], /\.ppt$/i],
                                ["powerpoint-icon", ["medium-red", "medium-red"], /\.pptx$/i],
                                ["powerpoint-icon", ["medium-maroon", "medium-maroon"], /\.potm$/i],
                                ["powerpoint-icon", ["dark-green", "dark-green"], /\.mpp$/i],
                                ["word-icon", ["medium-blue", "medium-blue"], /\.doc$/i],
                                ["word-icon", ["dark-blue", "dark-blue"], /\.docx$/i],
                                ["word-icon", ["medium-maroon", "medium-maroon"], /\.docm$/i],
                                ["word-icon", ["dark-cyan", "dark-cyan"], /\.docxml$/i],
                                ["word-icon", ["dark-maroon", "dark-maroon"], /\.dotm$/i],
                                ["word-icon", ["medium-cyan", "medium-cyan"], /\.dotx$/i],
                                ["word-icon", ["medium-orange", "medium-orange"], /\.wri$/i],
                                ["minecraft-icon", ["dark-green", "dark-green"], /^mcmod\.info$/i, , !1, , /\.forge-config$/i, /^Minecraft$/i],
                                ["mirah-icon", ["medium-blue", "medium-blue"], /\.dr?uby$/g, , !1, /^mirah$/, /\.mirah$/i, /^mirah$/i],
                                ["mirah-icon", ["light-blue", "light-blue"], /\.mir(?:ah)?$/g],
                                ["model-icon", ["medium-red", "medium-red"], /\.obj$/i, , !1, , /\.wavefront\.obj$/i],
                                ["model-icon", ["dark-blue", "dark-blue"], /\.mtl$/i, , !1, , /\.wavefront\.mtl$/i],
                                ["model-icon", ["dark-green", "dark-green"], /\.stl$/i],
                                ["model-icon", ["medium-orange", "medium-orange"], /\.u3d$/i],
                                ["circle-icon", ["light-red", "light-red"], /\.mo$/i, , !1, , /\.modelica(?:script)?$/i, /^Modelica$/i],
                                ["modula2-icon", ["medium-blue", "medium-blue"], /\.mod$/i, , !1, , /(?:^|\.)modula-?2(?:\.|$)/i, /^Modula-2$/i],
                                ["modula2-icon", ["medium-green", "medium-green"], /\.def$/i],
                                ["modula2-icon", ["medium-red", "medium-red"], /\.m2$/i],
                                ["monkey-icon", ["medium-maroon", "medium-maroon"], /\.monkey$/i, , !1, , /\.monkey$/i, /^Monkey$/i],
                                ["moon-icon", ["medium-yellow", "medium-yellow"], /\.moon$/i, , !1, /^moon$/, /\.moon$/i, /^MoonScript$/i],
                                ["mruby-icon", ["medium-red", "medium-red"], /\.mrb$/i, , !1, /^mruby$/],
                                ["msql-icon", ["medium-purple", "medium-purple"], /\.dsql$/i],
                                ["mupad-icon", ["medium-red", "medium-red"], /\.mu$/i],
                                ["music-icon", ["medium-orange", "medium-orange"], /\.chord$/i],
                                ["music-icon", ["dark-blue", "dark-blue"], /\.midi?$/i, , !1, , , , /^MThd/],
                                ["music-icon", ["medium-green", "medium-green"], /\.ly$/i, , !1, , /\.(?:At)?lilypond-/i, /^Lily\s*Pond$/i],
                                ["music-icon", ["dark-green", "dark-green"], /\.ily$/i],
                                ["music-icon", ["dark-red", "dark-red"], /\.pd$/i],
                                ["mustache-icon", ["medium-orange", "medium-orange"], /\.(?:hbs|handlebars|mustache)$/i, , !1, , /(?:^|\.)(?:mustache|handlebars)(?:\.|$)/i, /^Mustache$|^(?:hbs|htmlbars|handlebars)$/i],
                                ["nant-icon", ["medium-orange", "medium-orange"], /\.build$/i, , !1, , /\.nant-build$/i, /^NAnt$/i],
                                ["earth-icon", ["medium-green", "medium-green"], /\.ncl$/i, , !1, , /\.ncl$/i, /^NCAR Command Language \(NCL\)$/i],
                                ["neko-icon", ["medium-orange", "medium-orange"], /\.neko$/i, , !1, /^neko$/, /\.neko$/i, /^nek[0o]$/i],
                                ["amx-icon", ["medium-blue", "medium-blue"], /\.axs$/i],
                                ["amx-icon", ["dark-blue", "dark-blue"], /\.axi$/i],
                                ["netlogo-icon", ["medium-red", "medium-red"], /\.nlogo$/i],
                                ["nginx-icon", ["medium-green", "medium-green"], /\.nginxconf$/i, , !1, , /\.nginx$/i, /^NGINX$|^nginx[\W_ \t]?c[0o]nfigurati[0o]n[\W_ \t]?file$/i],
                                ["nib-icon", ["dark-orange", "dark-orange"], /\.nib$/i],
                                ["nimrod-icon", ["medium-green", "medium-green"], /\.nim(?:rod)?$/i, , !1, , /\.nim$/i, /^Nimrod$/i],
                                ["shuriken-icon", ["medium-blue", "medium-blue"], /\.ninja$/i, , !1, /^ninja$/, /\.ninja$/i, /^ninja$/i],
                                ["nit-icon", ["dark-green", "dark-green"], /\.nit$/i, , !1, , /\.nit$/i, /^Nit$/i],
                                ["nix-icon", ["medium-cyan", "medium-cyan"], /\.nix$/i, , !1, , /\.nix$/i, /^Nix$|^nix[0o]s$/i],
                                ["nmap-icon", ["dark-blue", "dark-blue"], /\.nse$/i, , !1, , /\.nmap$/i, /^Nmap$/i],
                                ["node-icon", ["medium-green", "medium-green"], /\.njs$|\.nvmrc$/i],
                                ["node-icon", ["dark-green", "dark-green"], /\.node-version$/i],
                                ["nsis-icon", ["medium-purple", "medium-purple"], /\.nsi$/i, , !1, /^nsis$/, /\.nsis$/i, /^nsis$/i],
                                ["nsis-icon", ["dark-cyan", "dark-cyan"], /\.nsh$/i],
                                ["recycle-icon", ["light-green", "light-green"], /\.nu$/i, , !1, /^nush$/, /\.nu$/i, /^Nu$|^nush$/i],
                                ["recycle-icon", ["dark-green", "dark-green"], /^Nukefile$/],
                                ["nuget-icon", ["medium-blue", "medium-blue"], /\.nuspec$/i],
                                ["nuget-icon", ["dark-purple", "dark-purple"], /\.pkgproj$/i],
                                ["numpy-icon", ["dark-blue", "dark-blue"], /\.numpy$/i],
                                ["numpy-icon", ["medium-blue", "medium-blue"], /\.numpyw$/i],
                                ["numpy-icon", ["medium-orange", "medium-orange"], /\.numsc$/i],
                                ["nunjucks-icon", ["dark-green", "dark-green"], /\.(?:nunjucks|njk)$/i],
                                ["objc-icon", ["medium-blue", "medium-blue"], /\.mm?$/i, , !1, , /\.objc(?:pp)?$/i, /^Objective-C$|^(?:Obj-?C|ObjectiveC)(?:\+\+)?$/i],
                                ["objc-icon", ["dark-red", "dark-red"], /\.pch$/i],
                                ["objc-icon", ["dark-green", "dark-green"], /\.x$/i],
                                ["objj-icon", ["dark-orange", "dark-orange"], /\.j$/i, , !1, , /\.objj$/i, /^Objective-J$|^(?:Obj-?J|ObjectiveJ)$/i],
                                ["objj-icon", ["dark-red", "dark-red"], /\.sj$/i],
                                ["ocaml-icon", ["medium-orange", "medium-orange"], /\.ml$/i, , !1, /ocaml(?:run|script)?/, /\.ocaml$/i, /^OCaml$/i],
                                ["ocaml-icon", ["dark-orange", "dark-orange"], /\.mli$/i],
                                ["ocaml-icon", ["medium-red", "medium-red"], /\.eliom$/i],
                                ["ocaml-icon", ["dark-red", "dark-red"], /\.eliomi$/i],
                                ["ocaml-icon", ["medium-green", "medium-green"], /\.ml4$/i],
                                ["ocaml-icon", ["dark-green", "dark-green"], /\.mll$/i, , !1, /^ocamllex$/, /\.ocamllex$/i, /^OCaml$|^[0o]camllex$/i],
                                ["ocaml-icon", ["dark-yellow", "dark-yellow"], /\.mly$/i, , !1, /^menhir$/, /\.menhir$/i, /^OCaml$|^menhir$/i],
                                ["ooc-icon", ["medium-green", "medium-green"], /\.ooc$/i, , !1, , /\.ooc$/i, /^OOC$/i],
                                ["opa-icon", ["medium-blue", "medium-blue"], /\.opa$/i, , !1, , /\.opa$/i, /^Opa$/i],
                                ["opencl-icon", ["medium-red", "medium-red"], /\.opencl$/i, , !1, , /\.opencl$/i, /^OpenCL$/i],
                                ["progress-icon", ["medium-red", "medium-red"], /\.p$/i, , !1, , /\.abl$/i, /^OpenEdge ABL$|^(?:progress|openedge|abl)$/i],
                                ["openoffice-icon", ["medium-blue", "medium-blue"], /\.odt$/i],
                                ["openoffice-icon", ["dark-blue", "dark-blue"], /\.ott$/i],
                                ["openoffice-icon", ["dark-purple", "dark-purple"], /\.fodt$/i],
                                ["openoffice-icon", ["medium-green", "medium-green"], /\.ods$/i],
                                ["openoffice-icon", ["dark-green", "dark-green"], /\.ots$/i],
                                ["openoffice-icon", ["dark-cyan", "dark-cyan"], /\.fods$/i],
                                ["openoffice-icon", ["medium-purple", "medium-purple"], /\.odp$/i],
                                ["openoffice-icon", ["dark-pink", "dark-pink"], /\.otp$/i],
                                ["openoffice-icon", ["medium-pink", "medium-pink"], /\.fodp$/i],
                                ["openoffice-icon", ["medium-red", "medium-red"], /\.odg$/i],
                                ["openoffice-icon", ["dark-red", "dark-red"], /\.otg$/i],
                                ["openoffice-icon", ["dark-orange", "dark-orange"], /\.fodg$/i],
                                ["openoffice-icon", ["medium-maroon", "medium-maroon"], /\.odf$/i],
                                ["openoffice-icon", ["light-pink", "light-pink"], /\.odb$/i],
                                ["scad-icon", ["medium-orange", "medium-orange"], /\.scad$/i, , !1, , /\.scad$/i, /^OpenSCAD$/i],
                                ["scad-icon", ["medium-yellow", "medium-yellow"], /\.jscad$/i],
                                ["org-icon", ["dark-green", "dark-green"], /\.org$/i],
                                ["osx-icon", ["medium-red", "medium-red"], /\.dmg$/i, , !1, , , , /^\x78\x01\x73\x0D\x62\x62\x60/],
                                ["ox-icon", ["medium-cyan", "dark-cyan"], /\.ox$/i, , !1, , /\.ox$/i, /^Ox$/i],
                                ["ox-icon", ["medium-green", "dark-green"], /\.oxh$/i],
                                ["ox-icon", ["medium-blue", "dark-blue"], /\.oxo$/i],
                                ["oxygene-icon", ["medium-cyan", "dark-cyan"], /\.oxygene$/i, , !1, , /\.oxygene$/i, /^Oxygene$/i],
                                ["oz-icon", ["medium-yellow", "medium-yellow"], /\.oz$/i, , !1, , /\.oz$/i, /^Oz$/i],
                                ["pan-icon", ["medium-red", "medium-red"], /\.pan$/i],
                                ["papyrus-icon", ["medium-green", "medium-green"], /\.psc$/i, , !1, , /(?:^|\.)(?:papyrus\.skyrim|compiled-?papyrus|papyrus-assembly)(?:\.|$)/i, /^Papyrus$/i],
                                ["parrot-icon", ["medium-green", "medium-green"], /\.parrot$/i, , !1, /^parrot$/],
                                ["parrot-icon", ["dark-green", "dark-green"], /\.pasm$/i, , !1, , /\.parrot\.pasm$/i, /^Parrot$|^pasm$/i],
                                ["parrot-icon", ["dark-blue", "dark-blue"], /\.pir$/i, , !1, , /\.parrot\.pir$/i, /^Parrot$|^pir$/i],
                                ["pascal-icon", ["medium-purple", "medium-purple"], /\.pas(?:cal)?$/i, , !1, /pascal|instantfpc/, /\.pascal$/i, /^Pascal$/i],
                                ["pascal-icon", ["medium-blue", "medium-blue"], /\.dfm$/i],
                                ["pascal-icon", ["dark-blue", "dark-blue"], /\.dpr$/i],
                                ["pascal-icon", ["dark-purple", "dark-purple"], /\.lpr$/i],
                                ["patch-icon", ["medium-green", "medium-green"], /\.patch$/i],
                                ["pawn-icon", ["medium-orange", "medium-orange"], /\.pwn$/i, , !1, , /\.pwn$/i, /^PAWN$/i],
                                ["icon-file-pdf", ["medium-red", "medium-red"], /\.pdf$/i, , !1, , , , /^%PDF/],
                                ["perl-icon", ["medium-blue", "medium-blue"], /\.p(?:er)?l$|\.t$/i, , !1, /^perl$/, /\.perl$/i, /^perl$/i],
                                ["perl-icon", ["dark-purple", "dark-purple"], /\.ph$/i],
                                ["perl-icon", ["medium-purple", "medium-purple"], /\.plx$/i],
                                ["perl-icon", ["dark-blue", "dark-blue"], /\.pm$/i],
                                ["perl-icon", ["medium-red", "medium-red"], /\.(?:psgi|xs)$/i],
                                ["perl6-icon", ["medium-purple", "medium-purple"], /\.pl6$/i, , !1, /^perl6$/, /(?:^|\.)perl6(?:fe)?(?=\.|$)/, /^(?:pl6|Perl\s*6)$/i],
                                ["perl6-icon", ["light-blue", "light-blue"], /\.[tp]6$|\.6pl$/i],
                                ["perl6-icon", ["dark-pink", "dark-pink"], /\.(?:pm6|p6m)$/i],
                                ["perl6-icon", ["dark-cyan", "dark-cyan"], /\.6pm$/i],
                                ["perl6-icon", ["dark-purple", "dark-purple"], /\.nqp$/i],
                                ["perl6-icon", ["medium-blue", "medium-blue"], /\.p6l$/i],
                                ["perl6-icon", ["dark-green", "dark-green"], /\.pod6$/i],
                                ["perl6-icon", ["medium-green", "medium-green"], /^Rexfile$/],
                                ["phalcon-icon", ["medium-cyan", "medium-cyan"], /\.volt$/i, , !1, , /\.volt$/i, /^Phalcon$/i],
                                ["php-icon", ["dark-blue", "dark-blue"], /\.php(?:[st\d]|_cs)?$/i, , !1, /^php$/, /\.php$/i, /^PHP$/i, /^<\?php/],
                                ["php-icon", ["dark-green", "dark-green"], /^Phakefile/],
                                ["pickle-icon", ["dark-cyan", "dark-cyan"], /\.pkl$/i],
                                ["pike-icon", ["dark-cyan", "dark-cyan"], /\.pike$/i, , !1, /^pike$/],
                                ["pike-icon", ["medium-blue", "medium-blue"], /\.pmod$/i],
                                ["sql-icon", ["medium-red", "medium-red"], /\.(?:pls|pck|pks|plb|plsql|pkb)$/i, , !1, , /\.plsql(?:\.oracle)?(?:\.|$)/i, /^PLSQL$/i],
                                ["pod-icon", ["dark-blue", "dark-blue"], /\.pod$/i],
                                ["pogo-icon", ["medium-orange", "dark-orange"], /\.pogo$/i, , !1, , /\.pogoscript$/i, /^PogoScript$/i],
                                ["pony-icon", ["light-maroon", "light-maroon"], /\.pony$/i, , !1, , /\.pony$/i, /^Pony$/i],
                                ["postcss-icon", ["dark-red", "dark-red"], /\.p(?:ost)?css$/i, , !1, /^postcss$/, /\.postcss$/i, /^p[0o]stcss$/i],
                                ["postcss-icon", ["dark-pink", "dark-pink"], /\.sss$/i, , !1, /^sugarss$/, /\.sugarss$/i, /^PostCSS$|^sugarss$/i],
                                ["postcss-icon", ["medium-orange", "dark-orange"], /\.postcssrc$/i],
                                ["postscript-icon", ["medium-red", "medium-red"], /\.ps$/i, , !1, , /\.postscript$/i, /^PostScript$|^p[0o]stscr$/i, /^%!PS/],
                                ["postscript-icon", ["medium-orange", "medium-orange"], /\.eps$/i],
                                ["postscript-icon", ["dark-blue", "dark-blue"], /\.pfa$/i],
                                ["postscript-icon", ["medium-green", "medium-green"], /\.afm$/i],
                                ["povray-icon", ["dark-blue", "dark-blue"], /\.pov$/i],
                                ["powerbuilder-icon", ["medium-blue", "medium-blue"], /\.pbl$|\.sra$/i],
                                ["powerbuilder-icon", ["dark-blue", "dark-blue"], /\.pbt$/i],
                                ["powerbuilder-icon", ["medium-red", "medium-red"], /\.srw$/i],
                                ["powerbuilder-icon", ["medium-orange", "medium-orange"], /\.sru$/i],
                                ["powerbuilder-icon", ["medium-maroon", "medium-maroon"], /\.srp$/i],
                                ["powerbuilder-icon", ["medium-purple", "medium-purple"], /\.srj$/i],
                                ["powershell-icon", ["medium-blue", "medium-blue"], /\.ps1$/i, , !1, , /\.powershell$/i, /^PowerShell$|^p[0o]sh$/i],
                                ["powershell-icon", ["dark-blue", "dark-blue"], /\.psd1$/i],
                                ["powershell-icon", ["medium-purple", "medium-purple"], /\.psm1$/i],
                                ["powershell-icon", ["dark-purple", "dark-purple"], /\.ps1xml$/i],
                                ["print-icon", ["dark-cyan", "dark-cyan"], /\.ppd$/i],
                                ["processing-icon", ["dark-blue", "dark-blue"], /\.pde$/i, , !1, , /\.processing$/i, /^Processing$/i],
                                ["prolog-icon", ["medium-blue", "medium-blue"], /\.pro$/i, , !1, /^swipl$/, /\.prolog$/i, /^Prolog$/i],
                                ["prolog-icon", ["medium-cyan", "medium-cyan"], /\.prolog$/i],
                                ["prolog-icon", ["medium-purple", "medium-purple"], /\.yap$/i, , !1, /^yap$/],
                                ["propeller-icon", ["medium-orange", "medium-orange"], /\.spin$/i, , !1, , /\.spin$/i, /^Propeller Spin$/i],
                                ["pug-icon", ["medium-red", "medium-red"], /\.pug$/i, , !1, , /\.pug$/i, /^Pug$/i],
                                ["puppet-icon", ["medium-purple", "medium-purple"], /\.pp$/i, , !1, /^puppet$/, /\.puppet$/i, /^puppet$/i],
                                ["puppet-icon", ["dark-blue", "dark-blue"], /Modulefile$/i],
                                ["purebasic-icon", ["medium-red", "medium-red"], /\.pb$/i, , !1, /^purebasic$/, /\.purebasic$/i, /^purebasic$/i],
                                ["purebasic-icon", ["dark-orange", "dark-orange"], /\.pbi$/i],
                                ["purescript-icon", ["dark-purple", "dark-purple"], /\.purs$/i, , !1, , /\.purescript$/i, /^PureScript$/i],
                                ["python-icon", ["dark-blue", "dark-blue"], /\.py$|\.bzl$|\.py3$|\.?(?:pypirc|pythonrc|python-venv)$/i, , !1, /python[\d.]*/, /\.python$/i, /^Python$|^rusth[0o]n$/i],
                                ["python-icon", ["medium-blue", "medium-blue"], /\.ipy$/i],
                                ["python-icon", ["dark-green", "dark-green"], /\.isolate$|\.gypi$|\.pyt$/i],
                                ["python-icon", ["medium-orange", "medium-orange"], /\.pep$|\.pyde$/i, , !1, /^pep8$/, /\.pep8$/i, /^Python$|^pep8$/i],
                                ["python-icon", ["medium-green", "medium-green"], /\.gyp$/i],
                                ["python-icon", ["dark-purple", "dark-purple"], /\.pyp$/i],
                                ["python-icon", ["medium-maroon", "medium-maroon"], /\.pyw$/i],
                                ["python-icon", ["dark-pink", "dark-pink"], /\.tac$/i],
                                ["python-icon", ["dark-red", "dark-red"], /\.wsgi$/i],
                                ["python-icon", ["medium-yellow", "dark-yellow"], /\.xpy$/i],
                                ["python-icon", ["medium-pink", "medium-pink"], /\.rpy$/i, , !1, , /\.renpy$/i, /^Python$|^Ren'?Py$/i],
                                ["python-icon", ["dark-green", "dark-green"], /^(?:BUCK|BUILD|SConstruct|SConscript)$/],
                                ["python-icon", ["medium-green", "medium-green"], /^(?:Snakefile|WATCHLISTS)$/],
                                ["python-icon", ["dark-maroon", "dark-maroon"], /^wscript$/],
                                ["r-icon", ["medium-blue", "medium-blue"], /\.(?:r|Rprofile|rsx|rd)$/i, , !1, /^Rscript$/, /\.r$/i, /^R$|^(?:Rscript|splus|Rlang)$/i],
                                ["racket-icon", ["medium-red", "medium-red"], /\.rkt$/i, , !1, /^racket$/, /\.racket$/i, /^racket$/i],
                                ["racket-icon", ["medium-blue", "medium-blue"], /\.rktd$/i],
                                ["racket-icon", ["light-red", "light-red"], /\.rktl$/i],
                                ["racket-icon", ["dark-blue", "dark-blue"], /\.scrbl$/i, , !1, /^scribble$/, /\.scribble$/i, /^Racket$|^scribble$/i],
                                ["raml-icon", ["medium-cyan", "medium-cyan"], /\.raml$/i, , !1, , /\.raml$/i, /^RAML$/i],
                                ["rascal-icon", ["medium-yellow", "medium-yellow"], /\.rsc$/i, , !1, , /\.rascal$/i, /^Rascal$/i],
                                ["rdoc-icon", ["medium-red", "medium-red"], /\.rdoc$/i, , !1, , /\.rdoc$/i, /^RDoc$/i],
                                ["xojo-icon", ["medium-green", "medium-green"], /\.rbbas$/i],
                                ["xojo-icon", ["dark-green", "dark-green"], /\.rbfrm$/i],
                                ["xojo-icon", ["dark-cyan", "dark-cyan"], /\.rbmnu$/i],
                                ["xojo-icon", ["medium-cyan", "medium-cyan"], /\.rbres$/i],
                                ["xojo-icon", ["medium-blue", "medium-blue"], /\.rbtbar$/i],
                                ["xojo-icon", ["dark-blue", "dark-blue"], /\.rbuistate$/i],
                                ["reason-icon", ["medium-red", "medium-red"], /\.re$/i, , !1, /^reason$/, /\.reason$/i, /^reas[0o]n$/i],
                                ["reason-icon", ["medium-orange", "medium-orange"], /\.rei$/i],
                                ["rebol-icon", ["dark-green", "dark-green"], /\.reb(?:ol)?$/i, , !1, /^rebol$/, /\.rebol$/i, /^reb[0o]l$/i],
                                ["rebol-icon", ["dark-red", "dark-red"], /\.r2$/i],
                                ["rebol-icon", ["dark-blue", "dark-blue"], /\.r3$/i],
                                ["red-icon", ["medium-red", "medium-red"], /\.red$/i, , !1, , /\.red$/i, /^Red$|^red\/?system$/i],
                                ["red-icon", ["light-red", "light-red"], /\.reds$/i],
                                ["red-hat-icon", ["medium-red", "medium-red"], /\.rpm$/i],
                                ["red-hat-icon", ["dark-red", "dark-red"], /\.spec$/i],
                                ["regex-icon", ["medium-green", "medium-green"], /\.regexp?$/i, , !1, , /(?:\.|^)regexp?(?:\.|$)/i, /^RegExp$/i],
                                ["android-icon", ["dark-maroon", "dark-maroon"], /\.rsh$/i],
                                ["rst-icon", ["dark-blue", "dark-blue"], /\.re?st(?:\.txt)?$/i, , !1, , /\.restructuredtext$/i, /^reStructuredText$|^re?st$/i],
                                ["rexx-icon", ["medium-red", "medium-red"], /\.rexx?$/i, , !1, /rexx|regina/i, /\.rexx$/i, /^REXX$/i],
                                ["rexx-icon", ["medium-blue", "medium-blue"], /\.pprx$/i],
                                ["riot-icon", ["medium-red", "medium-red"], /\.tag$/i, , !1, , /\.riot$/i, /^RiotJS$/i],
                                ["robot-icon", ["medium-purple", "medium-purple"], /\.robot$/i],
                                ["clojure-icon", ["medium-red", "medium-red"], /\.rg$/i],
                                ["rss-icon", ["medium-orange", "medium-orange"], /\.rss$/i],
                                ["ruby-icon", ["medium-red", "medium-red"], /\.(?:rb|ru|ruby|erb|gemspec|god|mspec|pluginspec|podspec|rabl|rake|opal)$|^\.?(?:irbrc|gemrc|pryrc|rspec|ruby-(?:gemset|version))$/i, , !1, /(?:mac|j)?ruby|rake|rbx/, /\.ruby$/i, /^Ruby$|^(?:rbx?|rake|jruby|macruby)$/i],
                                ["ruby-icon", ["medium-red", "medium-red"], /^(?:Appraisals|(?:Rake|Gem|[bB]uild|Berks|Cap|Danger|Deliver|Fast|Guard|Jar|Maven|Pod|Puppet|Snap)file(?:\.lock)?)$|^rails$/],
                                ["ruby-icon", ["dark-red", "dark-red"], /\.(?:jbuilder|rbuild|rb[wx]|builder)$/i],
                                ["ruby-icon", ["dark-yellow", "dark-yellow"], /\.watchr$/i],
                                ["rust-icon", ["medium-maroon", "medium-maroon"], /\.rs$/i, , !1, /^rust$/, /\.rust$/i, /^rust$/i],
                                ["rust-icon", ["light-maroon", "light-maroon"], /\.rlib$/i],
                                ["sage-icon", ["medium-blue", "medium-blue"], /\.sage$/i, , !1, /^sage$/, /\.sage$/i, /^sage$/i],
                                ["sage-icon", ["dark-blue", "dark-blue"], /\.sagews$/i],
                                ["saltstack-icon", ["medium-blue", "dark-blue"], /\.sls$/i, , !1, , /\.salt$/i, /^SaltStack$|^Salt(?:State)?$/i],
                                ["sas-icon", ["medium-blue", "medium-blue"], /\.sas$/i, , !1, , /\.sas$/i, /^SAS$/i],
                                ["sass-icon", ["light-pink", "light-pink"], /\.scss$/i, , !1, /^scss$/, /\.scss$/i, /^Sass$|^scss$/i],
                                ["sass-icon", ["dark-pink", "dark-pink"], /\.sass$/i, , !1, /^sass$/, /\.sass$/i, /^sass$/i],
                                ["sbt-icon", ["dark-purple", "dark-purple"], /\.sbt$/i],
                                ["scala-icon", ["medium-red", "medium-red"], /\.(?:sc|scala)$/i, , !1, /^scala$/, /\.scala$/i, /^Scala$/i],
                                ["scheme-icon", ["medium-red", "medium-red"], /\.scm$/i, , !1, /guile|bigloo|chicken/, /\.scheme$/i, /^Scheme$/i],
                                ["scheme-icon", ["medium-blue", "medium-blue"], /\.sld$/i],
                                ["scheme-icon", ["medium-purple", "medium-purple"], /\.sps$/i],
                                ["scilab-icon", ["dark-purple", "dark-purple"], /\.sci$/i, , !1, /^scilab$/, /\.scilab$/i, /^scilab$/i],
                                ["scilab-icon", ["dark-blue", "dark-blue"], /\.sce$/i],
                                ["scilab-icon", ["dark-cyan", "dark-cyan"], /\.tst$/i],
                                ["secret-icon", [null, null], /\.secret$/i],
                                ["self-icon", ["dark-blue", "dark-blue"], /\.self$/i, , !1, , /\.self$/i, /^Self$/i],
                                ["graph-icon", ["light-red", "light-red"], /\.csv$/i, , !1, , /(?:^|\.)csv(?:\.semicolon)?(?:\.|$)/i],
                                ["graph-icon", ["light-green", "light-green"], /\.(?:tab|tsv)$/i],
                                ["graph-icon", ["medium-green", "medium-green"], /\.dif$/i],
                                ["graph-icon", ["medium-cyan", "medium-cyan"], /\.slk$/i],
                                ["sf-icon", ["light-orange", "light-orange"], /\.sfproj$/i],
                                ["terminal-icon", ["medium-purple", "medium-purple"], /\.(?:sh|rc|bats|bash|tool|install|command)$/i, , !1, /bash|sh|zsh|rc/, /\.shell$/i, /^(?:sh|shell|Shell-?Script|Bash)$/i],
                                ["terminal-icon", ["dark-purple", "dark-purple"], /^(?:\.?bash(?:rc|[-_]?(?:profile|login|logout|history|prompt))|_osc|config|install-sh|PKGBUILD)$/i],
                                ["terminal-icon", ["dark-yellow", "dark-yellow"], /\.ksh$/i],
                                ["terminal-icon", ["medium-yellow", "dark-yellow"], /\.sh-session$/i, , !1, , /\.shell-session$/i, /^(?:Bash|Shell|Sh)[-\s]*(?:Session|Console)$/i],
                                ["terminal-icon", ["medium-blue", "medium-blue"], /\.zsh(?:-theme|_history)?$|^\.?(?:antigen|zpreztorc|zlogin|zlogout|zprofile|zshenv|zshrc)$|\.tmux$/i],
                                ["terminal-icon", ["medium-green", "medium-green"], /\.fish$|^\.fishrc$|\.tcsh$/i, , !1, /^fish$/, /\.fish$/i, /^fish$/i],
                                ["terminal-icon", ["medium-red", "medium-red"], /\.inputrc$/i],
                                ["terminal-icon", ["medium-red", "medium-red"], /^(?:configure|config\.(?:guess|rpath|status|sub)|depcomp|libtool|compile)$/],
                                ["terminal-icon", ["dark-purple", "dark-purple"], /^\/(?:private\/)?etc\/(?:[^\/]+\/)*(?:profile$|nanorc$|rc\.|csh\.)/i, , !0],
                                ["terminal-icon", ["medium-yellow", "medium-yellow"], /\.csh$/i],
                                ["shen-icon", ["dark-cyan", "dark-cyan"], /\.shen$/i],
                                ["shopify-icon", ["medium-green", "medium-green"], /\.liquid$/i],
                                ["sigils-icon", ["dark-red", "dark-red"], /\.sigils$/i],
                                ["silverstripe-icon", ["medium-blue", "medium-blue"], /\.ss$/i, , !1, , /(?:^|\.)ss(?:template)?(?:\.|$)/i, /^SilverStripe$/i],
                                ["sketch-icon", ["medium-orange", "medium-orange"], /\.sketch$/i],
                                ["slash-icon", ["dark-blue", "dark-blue"], /\.sl$/i, , !1, , /\.slash$/i, /^Slash$/i],
                                ["android-icon", ["medium-green", "medium-green"], /\.smali$/i, , !1, , /\.smali$/i, /^Smali$/i],
                                ["smarty-icon", ["medium-yellow", "dark-yellow"], /\.tpl$/i, , !1, , /\.smarty$/i, /^Smarty$/i],
                                ["snyk-icon", ["dark-purple", "dark-purple"], /\.snyk$/i],
                                ["clojure-icon", ["medium-yellow", "dark-yellow"], /\.(?:sma|sp)$/i, , !1, , /\.sp$/i, /^SourcePawn$|^s[0o]urcem[0o]d$/i],
                                ["sparql-icon", ["medium-blue", "medium-blue"], /\.sparql$/i, , !1, , /\.rq$/i, /^SPARQL$/i],
                                ["sparql-icon", ["dark-blue", "dark-blue"], /\.rq$/i],
                                ["sqf-icon", ["dark-maroon", "dark-maroon"], /\.sqf$/i, , !1, /^sqf$/, /\.sqf$/i, /^sqf$/i],
                                ["sqf-icon", ["dark-red", "dark-red"], /\.hqf$/i],
                                ["sql-icon", ["medium-orange", "medium-orange"], /\.(?:my)?sql$/i, , !1, /^sql$/, /\.sql$/i, /^sql$/i],
                                ["sql-icon", ["medium-blue", "medium-blue"], /\.ddl$/i],
                                ["sql-icon", ["medium-green", "medium-green"], /\.udf$/i],
                                ["sql-icon", ["dark-cyan", "dark-cyan"], /\.viw$/i],
                                ["sql-icon", ["dark-blue", "dark-blue"], /\.prc$/i],
                                ["sql-icon", ["medium-purple", "medium-purple"], /\.db2$/i],
                                ["sqlite-icon", ["medium-blue", "medium-blue"], /\.sqlite$/i],
                                ["sqlite-icon", ["dark-blue", "dark-blue"], /\.sqlite3$/i],
                                ["sqlite-icon", ["medium-purple", "medium-purple"], /\.db$/i],
                                ["sqlite-icon", ["dark-purple", "dark-purple"], /\.db3$/i],
                                ["squirrel-icon", ["medium-maroon", "medium-maroon"], /\.nut$/i, , !1, , /\.nut$/i, /^Squirrel$/i],
                                ["key-icon", ["medium-yellow", "medium-yellow"], /\.pub$/i],
                                ["key-icon", ["medium-orange", "medium-orange"], /\.pem$/i],
                                ["key-icon", ["medium-blue", "medium-blue"], /\.key$|\.crt$/i],
                                ["key-icon", ["medium-purple", "medium-purple"], /\.der$/i],
                                ["key-icon", ["medium-red", "medium-red"], /^id_rsa/],
                                ["key-icon", ["medium-green", "medium-green"], /\.glyphs\d*License$|^git-credential-osxkeychain$/i],
                                ["key-icon", ["dark-green", "dark-green"], /^(?:master\.)?passwd$/i],
                                ["stan-icon", ["medium-red", "medium-red"], /\.stan$/i, , !1, , /\.stan$/i, /^Stan$/i],
                                ["stata-icon", ["medium-blue", "medium-blue"], /\.do$/i, , !1, /^stata$/, /\.stata$/i, /^stata$/i],
                                ["stata-icon", ["dark-blue", "dark-blue"], /\.ado$/i],
                                ["stata-icon", ["light-blue", "light-blue"], /\.doh$/i],
                                ["stata-icon", ["medium-cyan", "medium-cyan"], /\.ihlp$/i],
                                ["stata-icon", ["dark-cyan", "dark-cyan"], /\.mata$/i, , !1, /^mata$/, /\.mata$/i, /^Stata$|^mata$/i],
                                ["stata-icon", ["light-cyan", "light-cyan"], /\.matah$/i],
                                ["stata-icon", ["medium-purple", "medium-purple"], /\.sthlp$/i],
                                ["storyist-icon", ["medium-blue", "medium-blue"], /\.story$/i],
                                ["strings-icon", ["medium-red", "medium-red"], /\.strings$/i, , !1, , /\.strings$/i, /^Strings$/i],
                                ["stylus-icon", ["medium-green", "medium-green"], /\.styl$/i, , !1, , /\.stylus$/i, /^Stylus$/i],
                                ["sublime-icon", ["medium-orange", "medium-orange"], /\.(?:stTheme|sublime[-_](?:build|commands|completions|keymap|macro|menu|mousemap|project|settings|theme|workspace|metrics|session|snippet))$/i],
                                ["sublime-icon", ["dark-orange", "dark-orange"], /\.sublime-syntax$/i],
                                ["scd-icon", ["medium-red", "medium-red"], /\.scd$/i, , !1, /sclang|scsynth/, /\.supercollider$/i, /^SuperCollider$/i],
                                ["svg-icon", ["dark-yellow", "dark-yellow"], /\.svg$/i, , !1, , /\.svg$/i, /^SVG$/i],
                                ["swift-icon", ["medium-green", "medium-green"], /\.swift$/i, , !1, , /\.swift$/i, /^Swift$/i],
                                ["sysverilog-icon", ["medium-blue", "dark-blue"], /\.sv$/i],
                                ["sysverilog-icon", ["medium-green", "dark-green"], /\.svh$/i],
                                ["sysverilog-icon", ["medium-cyan", "dark-cyan"], /\.vh$/i],
                                ["tag-icon", ["medium-blue", "medium-blue"], /\.?c?tags$/i],
                                ["tag-icon", ["medium-red", "medium-red"], /\.gemtags/i],
                                ["tcl-icon", ["dark-orange", "dark-orange"], /\.tcl$/i, , !1, /tclsh|wish/, /\.tcl$/i, /^Tcl$/i],
                                ["tcl-icon", ["medium-orange", "medium-orange"], /\.adp$/i],
                                ["tcl-icon", ["medium-red", "medium-red"], /\.tm$/i],
                                ["coffee-icon", ["medium-orange", "medium-orange"], /\.tea$/i, , !1, , /\.tea$/i, /^Tea$/i],
                                ["tt-icon", ["medium-blue", "medium-blue"], /\.tt2?$/i],
                                ["tt-icon", ["medium-purple", "medium-purple"], /\.tt3$/i],
                                ["tern-icon", ["medium-blue", "medium-blue"], /\.tern-project$/i],
                                ["terraform-icon", ["dark-purple", "dark-purple"], /\.tf(?:vars)?$/i, , !1, , /\.terra(?:form)?$/i, /^Terraform$/i],
                                ["tex-icon", ["medium-blue", "dark-blue"], /\.tex$|\.ltx$|\.lbx$/i, , !1, , /(?:^|\.)latex(?:\.|$)/i, /^TeX$|^latex$/i],
                                ["tex-icon", ["medium-green", "dark-green"], /\.aux$|\.ins$/i],
                                ["tex-icon", ["medium-red", "dark-red"], /\.sty$|\.texi$/i, , !1, , /(?:^|\.)tex(?:\.|$)/i, /^TeX$/i],
                                ["tex-icon", ["medium-maroon", "dark-maroon"], /\.dtx$/i],
                                ["tex-icon", ["medium-orange", "dark-orange"], /\.cls$|\.mkiv$|\.mkvi$|\.mkii$/i],
                                ["icon-file-text", ["medium-blue", "medium-blue"], /\.te?xt$|\.irclog$|\.uot$/i, , !1, , , , /^\xEF\xBB\xBF|^\xFF\xFE/],
                                ["icon-file-text", ["medium-maroon", "medium-maroon"], /\.log$|^Terminal[-_\s]Saved[-_\s]Output$|\.brf$/i],
                                ["icon-file-text", ["dark-red", "dark-red"], /\.git[\/\\]description$/, , !0],
                                ["icon-file-text", ["medium-red", "medium-red"], /\.err$|\.no$|^(?:bug-report|fdl|for-release|tests)$/i],
                                ["icon-file-text", ["dark-red", "dark-red"], /\.rtf$|\.uof$/i],
                                ["icon-file-text", ["dark-blue", "dark-blue"], /\.i?nfo$/i],
                                ["icon-file-text", ["dark-purple", "dark-purple"], /\.abt$|\.sub$/i],
                                ["icon-file-text", ["dark-orange", "dark-orange"], /\.ans$/i],
                                ["icon-file-text", ["medium-yellow", "medium-yellow"], /\.etx$/i],
                                ["icon-file-text", ["medium-orange", "medium-orange"], /\.msg$/i],
                                ["icon-file-text", ["medium-purple", "medium-purple"], /\.srt$|\.uop$/i],
                                ["icon-file-text", ["medium-cyan", "medium-cyan"], /\.(?:utxt|utf8)$/i],
                                ["icon-file-text", ["medium-green", "medium-green"], /\.weechatlog$|\.uos$/i],
                                ["textile-icon", ["medium-orange", "medium-orange"], /\.textile$/i, , !1, , /\.textile$/i, /^Textile$/i],
                                ["textmate-icon", ["dark-green", "dark-green"], /\.tmcg$/i],
                                ["textmate-icon", ["dark-purple", "dark-purple"], /\.tmLanguage$/i],
                                ["textmate-icon", ["medium-blue", "medium-blue"], /\.tmCommand$/i],
                                ["textmate-icon", ["dark-blue", "dark-blue"], /\.tmPreferences$/i],
                                ["textmate-icon", ["dark-orange", "dark-orange"], /\.tmSnippet$/i],
                                ["textmate-icon", ["medium-pink", "medium-pink"], /\.tmTheme$/i],
                                ["textmate-icon", ["medium-maroon", "medium-maroon"], /\.tmMacro$/i],
                                ["textmate-icon", ["medium-orange", "medium-orange"], /\.yaml-tmlanguage$/i],
                                ["textmate-icon", ["medium-purple", "medium-purple"], /\.JSON-tmLanguage$/i],
                                ["thor-icon", ["medium-orange", "medium-orange"], /\.thor$/i],
                                ["thor-icon", ["dark-orange", "dark-orange"], /^Thorfile$/i],
                                ["tsx-icon", ["light-blue", "light-blue"], /\.tsx$/i, , !1, , /\.tsx$/i, /^TSX$/i],
                                ["turing-icon", ["medium-red", "medium-red"], /\.tu$/i, , !1, , /\.turing$/i, /^Turing$/i],
                                ["twig-icon", ["medium-green", "medium-green"], /\.twig$/i, , !1, , /\.twig$/i, /^Twig$/i],
                                ["txl-icon", ["medium-orange", "medium-orange"], /\.txl$/i, , !1, , /\.txl$/i, /^TXL$/i],
                                ["ts-icon", ["medium-blue", "medium-blue"], /\.ts$/i, , !1, , /\.ts$/i, /^(?:ts|Type[-\s]*Script)$/i],
                                ["unity3d-icon", ["dark-blue", "dark-blue"], /\.anim$/i, , !1, /^shaderlab$/, /\.shaderlab$/i, /^Unity3D$|^shaderlab$/i],
                                ["unity3d-icon", ["dark-green", "dark-green"], /\.asset$/i],
                                ["unity3d-icon", ["medium-red", "medium-red"], /\.mat$/i],
                                ["unity3d-icon", ["dark-red", "dark-red"], /\.meta$/i],
                                ["unity3d-icon", ["dark-cyan", "dark-cyan"], /\.prefab$/i],
                                ["unity3d-icon", ["medium-blue", "medium-blue"], /\.unity$/i],
                                ["unity3d-icon", ["medium-maroon", "medium-maroon"], /\.unityproj$/i],
                                ["uno-icon", ["dark-blue", "dark-blue"], /\.uno$/i],
                                ["unreal-icon", [null, null], /\.uc$/i, , !1, , /\.uc$/i, /^UnrealScript$/i],
                                ["link-icon", ["dark-blue", "dark-blue"], /\.url$/i],
                                ["urweb-icon", ["medium-maroon", "medium-maroon"], /\.ur$/i, , !1, , /\.ur$/i, /^UrWeb$|^Ur(?:\/Web)?$/i],
                                ["urweb-icon", ["dark-blue", "dark-blue"], /\.urs$/i],
                                ["vagrant-icon", ["medium-cyan", "medium-cyan"], /^Vagrantfile$/i],
                                ["gnome-icon", ["medium-purple", "medium-purple"], /\.vala$/i, , !1, /^vala$/, /\.vala$/i, /^vala$/i],
                                ["gnome-icon", ["dark-purple", "dark-purple"], /\.vapi$/i],
                                ["varnish-icon", ["dark-blue", "dark-blue"], /\.vcl$/i, , !1, , /(?:^|\.)(?:varnish|vcl)(?:\.|$)/i, /^VCL$/i],
                                ["verilog-icon", ["dark-green", "dark-green"], /\.v$/i, , !1, /^verilog$/, /\.verilog$/i, /^veril[0o]g$/i],
                                ["verilog-icon", ["medium-red", "medium-red"], /\.veo$/i],
                                ["vhdl-icon", ["dark-green", "dark-green"], /\.vhdl$/i, , !1, /^vhdl$/, /\.vhdl$/i, /^vhdl$/i],
                                ["vhdl-icon", ["medium-green", "medium-green"], /\.vhd$/i],
                                ["vhdl-icon", ["dark-blue", "dark-blue"], /\.vhf$/i],
                                ["vhdl-icon", ["medium-blue", "medium-blue"], /\.vhi$/i],
                                ["vhdl-icon", ["dark-purple", "dark-purple"], /\.vho$/i],
                                ["vhdl-icon", ["medium-purple", "medium-purple"], /\.vhs$/i],
                                ["vhdl-icon", ["dark-red", "dark-red"], /\.vht$/i],
                                ["vhdl-icon", ["dark-orange", "dark-orange"], /\.vhw$/i],
                                ["video-icon", ["medium-blue", "medium-blue"], /\.3gpp?$/i, , !1, , , , /^.{4}ftyp3g/],
                                ["video-icon", ["dark-blue", "dark-blue"], /\.(?:mp4|m4v|h264)$/i, , !1, , , , /^.{4}ftyp/],
                                ["video-icon", ["medium-blue", "medium-blue"], /\.avi$/i, , !1, , , , /^MLVI/],
                                ["video-icon", ["medium-cyan", "medium-cyan"], /\.mov$/i, , !1, , , , /^.{4}moov/],
                                ["video-icon", ["medium-purple", "medium-purple"], /\.mkv$/i, , !1, , , , /^\x1AEß£\x93B\x82\x88matroska/],
                                ["video-icon", ["medium-red", "medium-red"], /\.flv$/i, , !1, , , , /^FLV\x01/],
                                ["video-icon", ["dark-blue", "dark-blue"], /\.webm$/i, , !1, , , , /^\x1A\x45\xDF\xA3/],
                                ["video-icon", ["medium-red", "medium-red"], /\.mpe?g$/i, , !1, , , , /^\0{2}\x01[\xB3\xBA]/],
                                ["video-icon", ["dark-purple", "dark-purple"], /\.(?:asf|wmv)$/i, , !1, , , , /^0&²u\x8EfÏ\x11¦Ù\0ª\0bÎl/],
                                ["video-icon", ["medium-orange", "medium-orange"], /\.(?:ogm|og[gv])$/i, , !1, , , , /^OggS/],
                                ["vim-icon", ["medium-green", "medium-green"], /\.(?:vim|n?vimrc)$/i, , !1, /Vim?/i, /\.viml$/i, /^(?:VimL?|NVim|Vim\s*Script)$/i],
                                ["vim-icon", ["dark-green", "dark-green"], /^[gn_]?vim(?:rc|info)$/i],
                                ["vs-icon", ["medium-blue", "medium-blue"], /\.(?:vba?|fr[mx]|bas)$/i, , !1, , /\.vbnet$/i, /^Visual Studio$|^vb\.?net$/i],
                                ["vs-icon", ["medium-red", "medium-red"], /\.vbhtml$/i],
                                ["vs-icon", ["medium-green", "medium-green"], /\.vbs$/i],
                                ["vs-icon", ["dark-blue", "dark-blue"], /\.csproj$/i],
                                ["vs-icon", ["dark-red", "dark-red"], /\.vbproj$/i],
                                ["vs-icon", ["dark-purple", "dark-purple"], /\.vcx?proj$/i],
                                ["vs-icon", ["dark-green", "dark-green"], /\.vssettings$/i],
                                ["vs-icon", ["medium-maroon", "medium-maroon"], /\.builds$/i],
                                ["vs-icon", ["medium-orange", "medium-orange"], /\.sln$/i],
                                ["vue-icon", ["light-green", "light-green"], /\.vue$/i, , !1, , /\.vue$/i, /^Vue$/i],
                                ["owl-icon", ["dark-blue", "dark-blue"], /\.owl$/i],
                                ["windows-icon", ["medium-purple", "medium-purple"], /\.bat$|\.cmd$/i, , !1, , /(?:^|\.)(?:bat|dosbatch)(?:\.|$)/i, /^(?:bat|(?:DOS|Win)?Batch)$/i],
                                ["windows-icon", [null, null], /\.(?:exe|com|msi)$/i],
                                ["windows-icon", ["medium-blue", "medium-blue"], /\.reg$/i],
                                ["x10-icon", ["light-maroon", "light-maroon"], /\.x10$/i, , !1, , /\.x10$/i, /^X10$|^xten$/i],
                                ["x11-icon", ["medium-orange", "medium-orange"], /\.X(?:authority|clients|initrc|profile|resources|session-errors|screensaver)$/i],
                                ["xmos-icon", ["medium-orange", "medium-orange"], /\.xc$/i],
                                ["appstore-icon", ["medium-blue", "medium-blue"], /\.(?:pbxproj|pbxuser|mode\dv\3|xcplugindata|xcrequiredplugins)$/i],
                                ["xojo-icon", ["medium-green", "medium-green"], /\.xojo_code$/i],
                                ["xojo-icon", ["medium-blue", "medium-blue"], /\.xojo_menu$/i],
                                ["xojo-icon", ["medium-red", "medium-red"], /\.xojo_report$/i],
                                ["xojo-icon", ["dark-green", "dark-green"], /\.xojo_script$/i],
                                ["xojo-icon", ["dark-purple", "dark-purple"], /\.xojo_toolbar$/i],
                                ["xojo-icon", ["dark-cyan", "dark-cyan"], /\.xojo_window$/i],
                                ["xpages-icon", ["medium-blue", "medium-blue"], /\.xsp-config$/i],
                                ["xpages-icon", ["dark-blue", "dark-blue"], /\.xsp\.metadata$/i],
                                ["xmos-icon", ["dark-blue", "dark-blue"], /\.xpl$/i],
                                ["xmos-icon", ["medium-purple", "medium-purple"], /\.xproc$/i],
                                ["sql-icon", ["dark-red", "dark-red"], /\.(?:xquery|xq|xql|xqm|xqy)$/i, , !1, , /\.xq$/i, /^XQuery$/i],
                                ["xtend-icon", ["dark-purple", "dark-purple"], /\.xtend$/i, , !1, , /\.xtend$/i, /^Xtend$/i],
                                ["yang-icon", ["medium-yellow", "medium-yellow"], /\.yang$/i, , !1, , /\.yang$/i, /^YANG$/i],
                                ["zbrush-icon", ["dark-purple", "dark-purple"], /\.zpr$/i],
                                ["zephir-icon", ["medium-pink", "medium-pink"], /\.zep$/i],
                                ["zimpl-icon", ["medium-orange", "medium-orange"], /\.(?:zimpl|zmpl|zpl)$/i],
                                ["apple-icon", ["medium-blue", "medium-blue"], /^com\.apple\./, .5],
                                ["apache-icon", ["medium-red", "medium-red"], /^httpd\.conf/i, 0],
                                ["checklist-icon", ["medium-yellow", "medium-yellow"], /TODO/, 0],
                                ["config-icon", [null, null], /config|settings|option|pref/i, 0],
                                ["doge-icon", ["medium-yellow", "medium-yellow"], /\.djs$/i, 0, !1, , /\.dogescript$/i, /^Dogescript$/i],
                                ["gear-icon", [null, null], /^\./, 0],
                                ["book-icon", ["medium-blue", "medium-blue"], /\b(?:changelog|copying(?:v?\d)?|install|read[-_]?me)\b|^licen[sc]es?[-._]/i, 0],
                                ["book-icon", ["dark-blue", "dark-blue"], /^news(?:[-_.]?[-\d]+)?$/i, 0],
                                ["v8-icon", ["medium-blue", "medium-blue"], /^(?:[dv]8|v8[-_.][^.]*|mksnapshot|mkpeephole)$/i, 0]
                            ],
                            [
                                [69, 147, 152, 154, 169, 192, 195, 196, 197, 198, 204, 217, 239, 244, 249, 251, 253, 258, 287, 292, 293, 303, 304, 309, 331, 333, 336, 343, 347, 353, 362, 380, 395, 398, 416, 420, 421, 422, 424, 431, 434, 448, 451, 465, 467, 468, 471, 480, 481, 482, 485, 486, 487, 525, 526, 529, 534, 555, 565, 570, 571, 572, 578, 580, 584, 586, 590, 601, 602, 626, 629, 658, 669, 670, 681, 688, 694, 696, 709, 714, 715, 745, 748, 755, 760, 769, 772, 778, 779, 798, 800, 803, 805, 808, 811, 822, 823, 826, 836, 838, 848, 854, 858, 860, 864, 865, 867, 868, 871, 881, 886, 903, 905, 924, 928, 936, 944, 987, 1e3, 1003, 1005, 1023],
                                [42, 57, 69, 105, 120, 121, 124, 126, 129, 143, 145, 147, 149, 151, 152, 154, 156, 157, 158, 166, 167, 169, 174, 192, 194, 195, 196, 197, 198, 204, 206, 210, 211, 213, 215, 216, 217, 223, 224, 225, 229, 230, 234, 236, 237, 238, 239, 242, 243, 244, 249, 251, 253, 255, 256, 258, 275, 285, 286, 287, 288, 290, 291, 292, 293, 294, 295, 297, 300, 301, 303, 304, 309, 312, 314, 326, 330, 336, 341, 342, 343, 346, 347, 350, 351, 352, 353, 359, 362, 365, 380, 381, 382, 383, 386, 390, 392, 394, 395, 398, 400, 416, 422, 439, 440, 442, 448, 451, 452, 453, 454, 458, 461, 463, 465, 466, 467, 468, 469, 470, 471, 472, 473, 474, 475, 479, 482, 485, 486, 487, 488, 489, 490, 522, 524, 525, 527, 529, 530, 533, 534, 543, 546, 547, 548, 549, 553, 555, 558, 560, 561, 565, 570, 571, 575, 578, 580, 582, 584, 586, 590, 600, 601, 602, 603, 604, 605, 612, 618, 626, 629, 657, 658, 664, 665, 668, 669, 675, 678, 679, 680, 681, 685, 687, 688, 689, 690, 691, 694, 696, 704, 707, 709, 714, 715, 716, 717, 718, 719, 734, 738, 741, 742, 744, 746, 747, 748, 753, 755, 760, 768, 769, 774, 776, 777, 778, 779, 781, 792, 797, 798, 801, 802, 803, 805, 807, 808, 811, 818, 822, 823, 826, 827, 828, 829, 836, 838, 841, 845, 847, 848, 850, 854, 858, 860, 862, 863, 864, 865, 867, 868, 871, 875, 881, 884, 886, 894, 896, 897, 898, 900, 901, 903, 905, 915, 923, 924, 928, 932, 933, 936, 937, 938, 944, 947, 951, 952, 954, 970, 982, 983, 984, 985, 986, 987, 995, 997, 1e3, 1002, 1003, 1005, 1023, 1025, 1034, 1036, 1039, 1053, 1054, 1055, 1063],
                                [41, 150, 282, 283, 284, 321, 889, 959],
                                [42, 57, 69, 105, 120, 121, 124, 126, 129, 143, 145, 147, 149, 151, 152, 154, 156, 157, 158, 166, 167, 169, 174, 192, 194, 195, 196, 197, 198, 204, 206, 210, 211, 213, 215, 216, 217, 223, 224, 225, 229, 230, 234, 236, 237, 238, 239, 242, 243, 244, 249, 251, 253, 255, 256, 258, 275, 276, 285, 286, 287, 288, 290, 291, 292, 293, 294, 295, 297, 300, 301, 303, 304, 309, 311, 312, 314, 319, 326, 330, 336, 341, 342, 343, 346, 347, 350, 351, 352, 353, 359, 362, 365, 380, 381, 382, 383, 386, 390, 392, 394, 395, 398, 400, 412, 416, 418, 420, 421, 422, 424, 431, 432, 434, 439, 440, 442, 448, 451, 452, 453, 454, 458, 461, 463, 465, 466, 467, 468, 469, 470, 471, 472, 473, 474, 475, 479, 480, 481, 482, 483, 485, 486, 487, 488, 489, 490, 522, 524, 525, 527, 529, 530, 533, 534, 543, 546, 547, 548, 549, 553, 555, 558, 560, 561, 565, 570, 571, 575, 578, 580, 582, 584, 586, 590, 600, 601, 602, 603, 604, 605, 612, 618, 626, 629, 657, 658, 660, 661, 664, 665, 668, 669, 675, 678, 679, 680, 681, 685, 687, 688, 689, 690, 691, 694, 696, 704, 707, 709, 714, 715, 716, 717, 718, 719, 734, 738, 741, 742, 744, 746, 747, 748, 753, 755, 760, 768, 769, 774, 776, 777, 778, 779, 781, 792, 797, 798, 801, 802, 803, 805, 807, 808, 811, 818, 822, 823, 826, 827, 828, 829, 836, 838, 841, 845, 847, 848, 850, 854, 858, 860, 862, 863, 864, 865, 867, 868, 871, 875, 876, 881, 884, 886, 894, 896, 897, 898, 900, 901, 903, 905, 915, 923, 924, 928, 932, 933, 936, 937, 938, 944, 947, 951, 952, 954, 970, 982, 983, 984, 985, 986, 987, 995, 997, 1e3, 1002, 1003, 1005, 1023, 1025, 1034, 1036, 1039, 1053, 1054, 1055, 1063],
                                [106, 138, 178, 179, 180, 181, 182, 183, 184, 185, 186, 188, 189, 235, 261, 262, 263, 264, 265, 268, 273, 348, 372, 373, 374, 375, 376, 377, 410, 411, 493, 494, 495, 496, 497, 498, 499, 500, 501, 503, 504, 505, 506, 507, 509, 510, 511, 512, 513, 514, 516, 519, 520, 601, 674, 737, 754, 769, 781, 957, 1013, 1014, 1015, 1016, 1017, 1018, 1019, 1020, 1021, 1022]
                            ]
                        ]
                    ],
                    r = function(e) {
                        this.db = new n(e)
                    };
                return r.prototype.getClass = function(e) {
                    var t = this.db.matchName(e);
                    return t ? t.getClass() : null
                }, r.prototype.getClassWithColor = function(e) {
                    var t = this.db.matchName(e);
                    return t ? t.getClass(0) : null
                }, new r(i)
            })
        }).call(t, n(1))
    },
    72: function(e, t, n) {
        e.exports = n(73)
    },
    73: function(e, t, n) {
        "use strict";
       // n(74)(n(75))
    },
    74: function(e, t) {
//        e.exports = function(e) {
//            "undefined" != typeof execScript ? execScript(e) : eval.call(null, e)
//        }
    },
    75: function(e, t) {
      
    }
});

webpackJsonp([7], {
            62: function(g, I, e) {
                "use strict";

                function n() {}

                function t(g, I, e, n, t) {
                    for (var C = 0, l = I.length, i = 0, s = 0; C < l; C++) {
                        var B = I[C];
                        if (B.removed) {
                            if (B.value = g.join(n.slice(s, s + B.count)), s += B.count, C && I[C - 1].added) {
                                var A = I[C - 1];
                                I[C - 1] = I[C], I[C] = A
                            }
                        } else {
                            if (!B.added && t) {
                                var Q = e.slice(i, i + B.count);
                                Q = Q.map(function(g, I) {
                                    var e = n[s + I];
                                    return e.length > g.length ? e : g
                                }), B.value = g.join(Q)
                            } else B.value = g.join(e.slice(i, i + B.count));
                            i += B.count, B.added || (s += B.count)
                        }
                    }
                    var a = I[l - 1];
                    return l > 1 && (a.added || a.removed) && g.equals("", a.value) && (I[l - 2].value += a.value, I.pop()), I
                }

                function C(g) {
                    return {
                        newPos: g.newPos,
                        components: g.components.slice(0)
                    }
                }
                I.__esModule = !0, I.default = n, n.prototype = {
                    diff: function(g, I) {
                        function e(g) {
                            return i ? (setTimeout(function() {
                                i(void 0, g)
                            }, 0), !0) : g
                        }

                        function n() {
                            for (var n = -1 * Q; n <= Q; n += 2) {
                                var l = void 0,
                                    i = c[n - 1],
                                    a = c[n + 1],
                                    F = (a ? a.newPos : 0) - n;
                                i && (c[n - 1] = void 0);
                                var d = i && i.newPos + 1 < B,
                                    u = a && 0 <= F && F < A;
                                if (d || u) {
                                    if (!d || u && i.newPos < a.newPos ? (l = C(a), s.pushComponent(l.components, void 0, !0)) : (l = i, l.newPos++, s.pushComponent(l.components, !0, void 0)), F = s.extractCommon(l, I, g, n), l.newPos + 1 >= B && F + 1 >= A) return e(t(s, l.components, I, g, s.useLongestToken));
                                    c[n] = l
                                } else c[n] = void 0
                            }
                            Q++
                        }
                        var l = arguments.length <= 2 || void 0 === arguments[2] ? {} : arguments[2],
                            i = l.callback;
                        "function" == typeof l && (i = l, l = {}), this.options = l;
                        var s = this;
                        g = this.castInput(g), I = this.castInput(I), g = this.removeEmpty(this.tokenize(g)), I = this.removeEmpty(this.tokenize(I));
                        var B = I.length,
                            A = g.length,
                            Q = 1,
                            a = B + A,
                            c = [{
                                newPos: -1,
                                components: []
                            }],
                            F = this.extractCommon(c[0], I, g, 0);
                        if (c[0].newPos + 1 >= B && F + 1 >= A) return e([{
                            value: this.join(I),
                            count: I.length
                        }]);
                        if (i) ! function g() {
                            setTimeout(function() {
                                if (Q > a) return i();
                                n() || g()
                            }, 0)
                        }();
                        else
                            for (; Q <= a;) {
                                var d = n();
                                if (d) return d
                            }
                    },
                    pushComponent: function(g, I, e) {
                        var n = g[g.length - 1];
                        n && n.added === I && n.removed === e ? g[g.length - 1] = {
                            count: n.count + 1,
                            added: I,
                            removed: e
                        } : g.push({
                            count: 1,
                            added: I,
                            removed: e
                        })
                    },
                    extractCommon: function(g, I, e, n) {
                        for (var t = I.length, C = e.length, l = g.newPos, i = l - n, s = 0; l + 1 < t && i + 1 < C && this.equals(I[l + 1], e[i + 1]);) l++, i++, s++;
                        return s && g.components.push({
                            count: s
                        }), g.newPos = l, i
                    },
                    equals: function(g, I) {
                        return g === I
                    },
                    removeEmpty: function(g) {
                        for (var I = [], e = 0; e < g.length; e++) g[e] && I.push(g[e]);
                        return I
                    },
                    castInput: function(g) {
                        return g
                    },
                    tokenize: function(g) {
                        return g.split("")
                    },
                    join: function(g) {
                        return g.join("")
                    }
                }
            },
            64: function(g, I, e) {
                (function(I) {
                    g.exports = I._ = e(65)
                }).call(I, e(1))
            },
            65: function(g, I, e) {
                (function(g, n) {
                    var t;
                    (function() {
                        function C(g, I) {
                            return g.set(I[0], I[1]), g
                        }

                        function l(g, I) {
                            return g.add(I), g
                        }

                        function i(g, I, e) {
                            switch (e.length) {
                                case 0:
                                    return g.call(I);
                                case 1:
                                    return g.call(I, e[0]);
                                case 2:
                                    return g.call(I, e[0], e[1]);
                                case 3:
                                    return g.call(I, e[0], e[1], e[2])
                            }
                            return g.apply(I, e)
                        }

                        function s(g, I, e, n) {
                            for (var t = -1, C = null == g ? 0 : g.length; ++t < C;) {
                                var l = g[t];
                                I(n, l, e(l), g)
                            }
                            return n
                        }

                        function B(g, I) {
                            for (var e = -1, n = null == g ? 0 : g.length; ++e < n && !1 !== I(g[e], e, g););
                            return g
                        }

                        function A(g, I) {
                            for (var e = null == g ? 0 : g.length; e-- && !1 !== I(g[e], e, g););
                            return g
                        }

                        function Q(g, I) {
                            for (var e = -1, n = null == g ? 0 : g.length; ++e < n;)
                                if (!I(g[e], e, g)) return !1;
                            return !0
                        }

                        function a(g, I) {
                            for (var e = -1, n = null == g ? 0 : g.length, t = 0, C = []; ++e < n;) {
                                var l = g[e];
                                I(l, e, g) && (C[t++] = l)
                            }
                            return C
                        }

                        function c(g, I) {
                            return !!(null == g ? 0 : g.length) && V(g, I, 0) > -1
                        }

                        function F(g, I, e) {
                            for (var n = -1, t = null == g ? 0 : g.length; ++n < t;)
                                if (e(I, g[n])) return !0;
                            return !1
                        }

                        function d(g, I) {
                            for (var e = -1, n = null == g ? 0 : g.length, t = Array(n); ++e < n;) t[e] = I(g[e], e, g);
                            return t
                        }

                        function u(g, I) {
                            for (var e = -1, n = I.length, t = g.length; ++e < n;) g[t + e] = I[e];
                            return g
                        }

                        function b(g, I, e, n) {
                            var t = -1,
                                C = null == g ? 0 : g.length;
                            for (n && C && (e = g[++t]); ++t < C;) e = I(e, g[t], t, g);
                            return e
                        }

                        function o(g, I, e, n) {
                            var t = null == g ? 0 : g.length;
                            for (n && t && (e = g[--t]); t--;) e = I(e, g[t], t, g);
                            return e
                        }

                        function U(g, I) {
                            for (var e = -1, n = null == g ? 0 : g.length; ++e < n;)
                                if (I(g[e], e, g)) return !0;
                            return !1
                        }

                        function r(g) {
                            return g.split("")
                        }

                        function G(g) {
                            return g.match(kI) || []
                        }

                        function m(g, I, e) {
                            var n;
                            return e(g, function(g, e, t) {
                                if (I(g, e, t)) return n = e, !1
                            }), n
                        }

                        function Z(g, I, e, n) {
                            for (var t = g.length, C = e + (n ? 1 : -1); n ? C-- : ++C < t;)
                                if (I(g[C], C, g)) return C;
                            return -1
                        }

                        function V(g, I, e) {
                            return I === I ? _(g, I, e) : Z(g, h, e)
                        }

                        function W(g, I, e, n) {
                            for (var t = e - 1, C = g.length; ++t < C;)
                                if (n(g[t], I)) return t;
                            return -1
                        }

                        function h(g) {
                            return g !== g
                        }

                        function x(g, I) {
                            var e = null == g ? 0 : g.length;
                            return e ? N(g, I) / e : Sg
                        }

                        function y(g) {
                            return function(I) {
                                return null == I ? tg : I[g]
                            }
                        }

                        function p(g) {
                            return function(I) {
                                return null == g ? tg : g[I]
                            }
                        }

                        function R(g, I, e, n, t) {
                            return t(g, function(g, t, C) {
                                e = n ? (n = !1, g) : I(e, g, t, C)
                            }), e
                        }

                        function X(g, I) {
                            var e = g.length;
                            for (g.sort(I); e--;) g[e] = g[e].value;
                            return g
                        }

                        function N(g, I) {
                            for (var e, n = -1, t = g.length; ++n < t;) {
                                var C = I(g[n]);
                                C !== tg && (e = e === tg ? C : e + C)
                            }
                            return e
                        }

                        function L(g, I) {
                            for (var e = -1, n = Array(g); ++e < g;) n[e] = I(e);
                            return n
                        }

                        function E(g, I) {
                            return d(I, function(I) {
                                return [I, g[I]]
                            })
                        }

                        function S(g) {
                            return function(I) {
                                return g(I)
                            }
                        }

                        function Y(g, I) {
                            return d(I, function(I) {
                                return g[I]
                            })
                        }

                        function v(g, I) {
                            return g.has(I)
                        }

                        function J(g, I) {
                            for (var e = -1, n = g.length; ++e < n && V(I, g[e], 0) > -1;);
                            return e
                        }

                        function H(g, I) {
                            for (var e = g.length; e-- && V(I, g[e], 0) > -1;);
                            return e
                        }

                        function k(g, I) {
                            for (var e = g.length, n = 0; e--;) g[e] === I && ++n;
                            return n
                        }

                        function f(g) {
                            return "\\" + xe[g]
                        }

                        function T(g, I) {
                            return null == g ? tg : g[I]
                        }

                        function z(g) {
                            return oe.test(g)
                        }

                        function D(g) {
                            return Ue.test(g)
                        }

                        function w(g) {
                            for (var I, e = []; !(I = g.next()).done;) e.push(I.value);
                            return e
                        }

                        function O(g) {
                            var I = -1,
                                e = Array(g.size);
                            return g.forEach(function(g, n) {
                                e[++I] = [n, g]
                            }), e
                        }

                        function M(g, I) {
                            return function(e) {
                                return g(I(e))
                            }
                        }

                        function j(g, I) {
                            for (var e = -1, n = g.length, t = 0, C = []; ++e < n;) {
                                var l = g[e];
                                l !== I && l !== Ag || (g[e] = Ag, C[t++] = e)
                            }
                            return C
                        }

                        function P(g) {
                            var I = -1,
                                e = Array(g.size);
                            return g.forEach(function(g) {
                                e[++I] = g
                            }), e
                        }

                        function K(g) {
                            var I = -1,
                                e = Array(g.size);
                            return g.forEach(function(g) {
                                e[++I] = [g, g]
                            }), e
                        }

                        function _(g, I, e) {
                            for (var n = e - 1, t = g.length; ++n < t;)
                                if (g[n] === I) return n;
                            return -1
                        }

                        function q(g, I, e) {
                            for (var n = e + 1; n--;)
                                if (g[n] === I) return n;
                            return n
                        }

                        function $(g) {
                            return z(g) ? Ig(g) : De(g)
                        }

                        function gg(g) {
                            return z(g) ? eg(g) : r(g)
                        }

                        function Ig(g) {
                            for (var I = ue.lastIndex = 0; ue.test(g);) ++I;
                            return I
                        }

                        function eg(g) {
                            return g.match(ue) || []
                        }

                        function ng(g) {
                            return g.match(be) || []
                        }
                        var tg, Cg = 200,
                            lg = "Unsupported core-js use. Try https://npms.io/search?q=ponyfill.",
                            ig = "Expected a function",
                            sg = "__lodash_hash_undefined__",
                            Bg = 500,
                            Ag = "__lodash_placeholder__",
                            Qg = 1,
                            ag = 2,
                            cg = 4,
                            Fg = 1,
                            dg = 2,
                            ug = 1,
                            bg = 2,
                            og = 4,
                            Ug = 8,
                            rg = 16,
                            Gg = 32,
                            mg = 64,
                            Zg = 128,
                            Vg = 256,
                            Wg = 512,
                            hg = 30,
                            xg = "...",
                            yg = 800,
                            pg = 16,
                            Rg = 1,
                            Xg = 2,
                            Ng = 1 / 0,
                            Lg = 9007199254740991,
                            Eg = 1.7976931348623157e308,
                            Sg = NaN,
                            Yg = 4294967295,
                            vg = Yg - 1,
                            Jg = Yg >>> 1,
                            Hg = [
                                ["ary", Zg],
                                ["bind", ug],
                                ["bindKey", bg],
                                ["curry", Ug],
                                ["curryRight", rg],
                                ["flip", Wg],
                                ["partial", Gg],
                                ["partialRight", mg],
                                ["rearg", Vg]
                            ],
                            kg = "[object Arguments]",
                            fg = "[object Array]",
                            Tg = "[object AsyncFunction]",
                            zg = "[object Boolean]",
                            Dg = "[object Date]",
                            wg = "[object DOMException]",
                            Og = "[object Error]",
                            Mg = "[object Function]",
                            jg = "[object GeneratorFunction]",
                            Pg = "[object Map]",
                            Kg = "[object Number]",
                            _g = "[object Null]",
                            qg = "[object Object]",
                            $g = "[object Proxy]",
                            gI = "[object RegExp]",
                            II = "[object Set]",
                            eI = "[object String]",
                            nI = "[object Symbol]",
                            tI = "[object Undefined]",
                            CI = "[object WeakMap]",
                            lI = "[object WeakSet]",
                            iI = "[object ArrayBuffer]",
                            sI = "[object DataView]",
                            BI = "[object Float32Array]",
                            AI = "[object Float64Array]",
                            QI = "[object Int8Array]",
                            aI = "[object Int16Array]",
                            cI = "[object Int32Array]",
                            FI = "[object Uint8Array]",
                            dI = "[object Uint8ClampedArray]",
                            uI = "[object Uint16Array]",
                            bI = "[object Uint32Array]",
                            oI = /\b__p \+= '';/g,
                            UI = /\b(__p \+=) '' \+/g,
                            rI = /(__e\(.*?\)|\b__t\)) \+\n'';/g,
                            GI = /&(?:amp|lt|gt|quot|#39);/g,
                            mI = /[&<>"']/g,
                            ZI = RegExp(GI.source),
                            VI = RegExp(mI.source),
                            WI = /<%-([\s\S]+?)%>/g,
                            hI = /<%([\s\S]+?)%>/g,
                            xI = /<%=([\s\S]+?)%>/g,
                            yI = /\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/,
                            pI = /^\w*$/,
                            RI = /^\./,
                            XI = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g,
                            NI = /[\\^$.*+?()[\]{}|]/g,
                            LI = RegExp(NI.source),
                            EI = /^\s+|\s+$/g,
                            SI = /^\s+/,
                            YI = /\s+$/,
                            vI = /\{(?:\n\/\* \[wrapped with .+\] \*\/)?\n?/,
                            JI = /\{\n\/\* \[wrapped with (.+)\] \*/,
                            HI = /,? & /,
                            kI = /[^\x00-\x2f\x3a-\x40\x5b-\x60\x7b-\x7f]+/g,
                            fI = /\\(\\)?/g,
                            TI = /\$\{([^\\}]*(?:\\.[^\\}]*)*)\}/g,
                            zI = /\w*$/,
                            DI = /^[-+]0x[0-9a-f]+$/i,
                            wI = /^0b[01]+$/i,
                            OI = /^\[object .+?Constructor\]$/,
                            MI = /^0o[0-7]+$/i,
                            jI = /^(?:0|[1-9]\d*)$/,
                            PI = /[\xc0-\xd6\xd8-\xf6\xf8-\xff\u0100-\u017f]/g,
                            KI = /($^)/,
                            _I = /['\n\r\u2028\u2029\\]/g,
                            qI = "\\u0300-\\u036f\\ufe20-\\ufe2f\\u20d0-\\u20ff",
                            $I = "\\xac\\xb1\\xd7\\xf7\\x00-\\x2f\\x3a-\\x40\\x5b-\\x60\\x7b-\\xbf\\u2000-\\u206f \\t\\x0b\\f\\xa0\\ufeff\\n\\r\\u2028\\u2029\\u1680\\u180e\\u2000\\u2001\\u2002\\u2003\\u2004\\u2005\\u2006\\u2007\\u2008\\u2009\\u200a\\u202f\\u205f\\u3000",
                            ge = "[" + $I + "]",
                            Ie = "[" + qI + "]",
                            ee = "[a-z\\xdf-\\xf6\\xf8-\\xff]",
                            ne = "[^\\ud800-\\udfff" + $I + "\\d+\\u2700-\\u27bfa-z\\xdf-\\xf6\\xf8-\\xffA-Z\\xc0-\\xd6\\xd8-\\xde]",
                            te = "\\ud83c[\\udffb-\\udfff]",
                            Ce = "(?:\\ud83c[\\udde6-\\uddff]){2}",
                            le = "[\\ud800-\\udbff][\\udc00-\\udfff]",
                            ie = "[A-Z\\xc0-\\xd6\\xd8-\\xde]",
                            se = "(?:" + ee + "|" + ne + ")",
                            Be = "(?:[\\u0300-\\u036f\\ufe20-\\ufe2f\\u20d0-\\u20ff]|\\ud83c[\\udffb-\\udfff])?",
                            Ae = "(?:\\u200d(?:" + ["[^\\ud800-\\udfff]", Ce, le].join("|") + ")[\\ufe0e\\ufe0f]?" + Be + ")*",
                            Qe = "[\\ufe0e\\ufe0f]?" + Be + Ae,
                            ae = "(?:" + ["[\\u2700-\\u27bf]", Ce, le].join("|") + ")" + Qe,
                            ce = "(?:" + ["[^\\ud800-\\udfff]" + Ie + "?", Ie, Ce, le, "[\\ud800-\\udfff]"].join("|") + ")",
                            Fe = RegExp("['’]", "g"),
                            de = RegExp(Ie, "g"),
                            ue = RegExp(te + "(?=" + te + ")|" + ce + Qe, "g"),
                            be = RegExp([ie + "?" + ee + "+(?:['’](?:d|ll|m|re|s|t|ve))?(?=" + [ge, ie, "$"].join("|") + ")", "(?:[A-Z\\xc0-\\xd6\\xd8-\\xde]|[^\\ud800-\\udfff\\xac\\xb1\\xd7\\xf7\\x00-\\x2f\\x3a-\\x40\\x5b-\\x60\\x7b-\\xbf\\u2000-\\u206f \\t\\x0b\\f\\xa0\\ufeff\\n\\r\\u2028\\u2029\\u1680\\u180e\\u2000\\u2001\\u2002\\u2003\\u2004\\u2005\\u2006\\u2007\\u2008\\u2009\\u200a\\u202f\\u205f\\u3000\\d+\\u2700-\\u27bfa-z\\xdf-\\xf6\\xf8-\\xffA-Z\\xc0-\\xd6\\xd8-\\xde])+(?:['’](?:D|LL|M|RE|S|T|VE))?(?=" + [ge, ie + se, "$"].join("|") + ")", ie + "?" + se + "+(?:['’](?:d|ll|m|re|s|t|ve))?", ie + "+(?:['’](?:D|LL|M|RE|S|T|VE))?", "\\d*(?:(?:1ST|2ND|3RD|(?![123])\\dTH)\\b)", "\\d*(?:(?:1st|2nd|3rd|(?![123])\\dth)\\b)", "\\d+", ae].join("|"), "g"),
                            oe = RegExp("[\\u200d\\ud800-\\udfff" + qI + "\\ufe0e\\ufe0f]"),
                            Ue = /[a-z][A-Z]|[A-Z]{2,}[a-z]|[0-9][a-zA-Z]|[a-zA-Z][0-9]|[^a-zA-Z0-9 ]/,
                            re = ["Array", "Buffer", "DataView", "Date", "Error", "Float32Array", "Float64Array", "Function", "Int8Array", "Int16Array", "Int32Array", "Map", "Math", "Object", "Promise", "RegExp", "Set", "String", "Symbol", "TypeError", "Uint8Array", "Uint8ClampedArray", "Uint16Array", "Uint32Array", "WeakMap", "_", "clearTimeout", "isFinite", "parseInt", "setTimeout"],
                            Ge = -1,
                            me = {};
                        me[BI] = me[AI] = me[QI] = me[aI] = me[cI] = me[FI] = me[dI] = me[uI] = me[bI] = !0, me[kg] = me[fg] = me[iI] = me[zg] = me[sI] = me[Dg] = me[Og] = me[Mg] = me[Pg] = me[Kg] = me[qg] = me[gI] = me[II] = me[eI] = me[CI] = !1;
                        var Ze = {};
                        Ze[kg] = Ze[fg] = Ze[iI] = Ze[sI] = Ze[zg] = Ze[Dg] = Ze[BI] = Ze[AI] = Ze[QI] = Ze[aI] = Ze[cI] = Ze[Pg] = Ze[Kg] = Ze[qg] = Ze[gI] = Ze[II] = Ze[eI] = Ze[nI] = Ze[FI] = Ze[dI] = Ze[uI] = Ze[bI] = !0, Ze[Og] = Ze[Mg] = Ze[CI] = !1;
                        var Ve = {
                                "À": "A",
                                "Á": "A",
                                "Â": "A",
                                "Ã": "A",
                                "Ä": "A",
                                "Å": "A",
                                "à": "a",
                                "á": "a",
                                "â": "a",
                                "ã": "a",
                                "ä": "a",
                                "å": "a",
                                "Ç": "C",
                                "ç": "c",
                                "Ð": "D",
                                "ð": "d",
                                "È": "E",
                                "É": "E",
                                "Ê": "E",
                                "Ë": "E",
                                "è": "e",
                                "é": "e",
                                "ê": "e",
                                "ë": "e",
                                "Ì": "I",
                                "Í": "I",
                                "Î": "I",
                                "Ï": "I",
                                "ì": "i",
                                "í": "i",
                                "î": "i",
                                "ï": "i",
                                "Ñ": "N",
                                "ñ": "n",
                                "Ò": "O",
                                "Ó": "O",
                                "Ô": "O",
                                "Õ": "O",
                                "Ö": "O",
                                "Ø": "O",
                                "ò": "o",
                                "ó": "o",
                                "ô": "o",
                                "õ": "o",
                                "ö": "o",
                                "ø": "o",
                                "Ù": "U",
                                "Ú": "U",
                                "Û": "U",
                                "Ü": "U",
                                "ù": "u",
                                "ú": "u",
                                "û": "u",
                                "ü": "u",
                                "Ý": "Y",
                                "ý": "y",
                                "ÿ": "y",
                                "Æ": "Ae",
                                "æ": "ae",
                                "Þ": "Th",
                                "þ": "th",
                                "ß": "ss",
                                "Ā": "A",
                                "Ă": "A",
                                "Ą": "A",
                                "ā": "a",
                                "ă": "a",
                                "ą": "a",
                                "Ć": "C",
                                "Ĉ": "C",
                                "Ċ": "C",
                                "Č": "C",
                                "ć": "c",
                                "ĉ": "c",
                                "ċ": "c",
                                "č": "c",
                                "Ď": "D",
                                "Đ": "D",
                                "ď": "d",
                                "đ": "d",
                                "Ē": "E",
                                "Ĕ": "E",
                                "Ė": "E",
                                "Ę": "E",
                                "Ě": "E",
                                "ē": "e",
                                "ĕ": "e",
                                "ė": "e",
                                "ę": "e",
                                "ě": "e",
                                "Ĝ": "G",
                                "Ğ": "G",
                                "Ġ": "G",
                                "Ģ": "G",
                                "ĝ": "g",
                                "ğ": "g",
                                "ġ": "g",
                                "ģ": "g",
                                "Ĥ": "H",
                                "Ħ": "H",
                                "ĥ": "h",
                                "ħ": "h",
                                "Ĩ": "I",
                                "Ī": "I",
                                "Ĭ": "I",
                                "Į": "I",
                                "İ": "I",
                                "ĩ": "i",
                                "ī": "i",
                                "ĭ": "i",
                                "į": "i",
                                "ı": "i",
                                "Ĵ": "J",
                                "ĵ": "j",
                                "Ķ": "K",
                                "ķ": "k",
                                "ĸ": "k",
                                "Ĺ": "L",
                                "Ļ": "L",
                                "Ľ": "L",
                                "Ŀ": "L",
                                "Ł": "L",
                                "ĺ": "l",
                                "ļ": "l",
                                "ľ": "l",
                                "ŀ": "l",
                                "ł": "l",
                                "Ń": "N",
                                "Ņ": "N",
                                "Ň": "N",
                                "Ŋ": "N",
                                "ń": "n",
                                "ņ": "n",
                                "ň": "n",
                                "ŋ": "n",
                                "Ō": "O",
                                "Ŏ": "O",
                                "Ő": "O",
                                "ō": "o",
                                "ŏ": "o",
                                "ő": "o",
                                "Ŕ": "R",
                                "Ŗ": "R",
                                "Ř": "R",
                                "ŕ": "r",
                                "ŗ": "r",
                                "ř": "r",
                                "Ś": "S",
                                "Ŝ": "S",
                                "Ş": "S",
                                "Š": "S",
                                "ś": "s",
                                "ŝ": "s",
                                "ş": "s",
                                "š": "s",
                                "Ţ": "T",
                                "Ť": "T",
                                "Ŧ": "T",
                                "ţ": "t",
                                "ť": "t",
                                "ŧ": "t",
                                "Ũ": "U",
                                "Ū": "U",
                                "Ŭ": "U",
                                "Ů": "U",
                                "Ű": "U",
                                "Ų": "U",
                                "ũ": "u",
                                "ū": "u",
                                "ŭ": "u",
                                "ů": "u",
                                "ű": "u",
                                "ų": "u",
                                "Ŵ": "W",
                                "ŵ": "w",
                                "Ŷ": "Y",
                                "ŷ": "y",
                                "Ÿ": "Y",
                                "Ź": "Z",
                                "Ż": "Z",
                                "Ž": "Z",
                                "ź": "z",
                                "ż": "z",
                                "ž": "z",
                                "Ĳ": "IJ",
                                "ĳ": "ij",
                                "Œ": "Oe",
                                "œ": "oe",
                                "ŉ": "'n",
                                "ſ": "s"
                            },
                            We = {
                                "&": "&amp;",
                                "<": "&lt;",
                                ">": "&gt;",
                                '"': "&quot;",
                                "'": "&#39;"
                            },
                            he = {
                                "&amp;": "&",
                                "&lt;": "<",
                                "&gt;": ">",
                                "&quot;": '"',
                                "&#39;": "'"
                            },
                            xe = {
                                "\\": "\\",
                                "'": "'",
                                "\n": "n",
                                "\r": "r",
                                "\u2028": "u2028",
                                "\u2029": "u2029"
                            },
                            ye = parseFloat,
                            pe = parseInt,
                            Re = "object" == typeof g && g && g.Object === Object && g,
                            Xe = "object" == typeof self && self && self.Object === Object && self,
                            Ne = Re || Xe || Function("return this")(),
                            Le = "object" == typeof I && I && !I.nodeType && I,
                            Ee = Le && "object" == typeof n && n && !n.nodeType && n,
                            Se = Ee && Ee.exports === Le,
                            Ye = Se && Re.process,
                            ve = function() {
                                try {
                                    return Ye && Ye.binding && Ye.binding("util")
                                } catch (g) {}
                            }(),
                            Je = ve && ve.isArrayBuffer,
                            He = ve && ve.isDate,
                            ke = ve && ve.isMap,
                            fe = ve && ve.isRegExp,
                            Te = ve && ve.isSet,
                            ze = ve && ve.isTypedArray,
                            De = y("length"),
                            we = p(Ve),
                            Oe = p(We),
                            Me = p(he),
                            je = function g(I) {
                                function e(g) {
                                    if (ts(g) && !da(g) && !(g instanceof r)) {
                                        if (g instanceof t) return g;
                                        if (dA.call(g, "__wrapped__")) return Il(g)
                                    }
                                    return new t(g)
                                }

                                function n() {}

                                function t(g, I) {
                                    this.__wrapped__ = g, this.__actions__ = [], this.__chain__ = !!I, this.__index__ = 0, this.__values__ = tg
                                }

                                function r(g) {
                                    this.__wrapped__ = g, this.__actions__ = [], this.__dir__ = 1, this.__filtered__ = !1, this.__iteratees__ = [], this.__takeCount__ = Yg, this.__views__ = []
                                }

                                function p() {
                                    var g = new r(this.__wrapped__);
                                    return g.__actions__ = vt(this.__actions__), g.__dir__ = this.__dir__, g.__filtered__ = this.__filtered__, g.__iteratees__ = vt(this.__iteratees__), g.__takeCount__ = this.__takeCount__, g.__views__ = vt(this.__views__), g
                                }

                                function _() {
                                    if (this.__filtered__) {
                                        var g = new r(this);
                                        g.__dir__ = -1, g.__filtered__ = !0
                                    } else g = this.clone(), g.__dir__ *= -1;
                                    return g
                                }

                                function Ig() {
                                    var g = this.__wrapped__.value(),
                                        I = this.__dir__,
                                        e = da(g),
                                        n = I < 0,
                                        t = e ? g.length : 0,
                                        C = hC(0, t, this.__views__),
                                        l = C.start,
                                        i = C.end,
                                        s = i - l,
                                        B = n ? i : l - 1,
                                        A = this.__iteratees__,
                                        Q = A.length,
                                        a = 0,
                                        c = wA(s, this.__takeCount__);
                                    if (!e || !n && t == s && c == s) return ot(g, this.__actions__);
                                    var F = [];
                                    g: for (; s-- && a < c;) {
                                        B += I;
                                        for (var d = -1, u = g[B]; ++d < Q;) {
                                            var b = A[d],
                                                o = b.iteratee,
                                                U = b.type,
                                                r = o(u);
                                            if (U == Xg) u = r;
                                            else if (!r) {
                                                if (U == Rg) continue g;
                                                break g
                                            }
                                        }
                                        F[a++] = u
                                    }
                                    return F
                                }

                                function eg(g) {
                                    var I = -1,
                                        e = null == g ? 0 : g.length;
                                    for (this.clear(); ++I < e;) {
                                        var n = g[I];
                                        this.set(n[0], n[1])
                                    }
                                }

                                function kI() {
                                    this.__data__ = IQ ? IQ(null) : {}, this.size = 0
                                }

                                function qI(g) {
                                    var I = this.has(g) && delete this.__data__[g];
                                    return this.size -= I ? 1 : 0, I
                                }

                                function $I(g) {
                                    var I = this.__data__;
                                    if (IQ) {
                                        var e = I[g];
                                        return e === sg ? tg : e
                                    }
                                    return dA.call(I, g) ? I[g] : tg
                                }

                                function ge(g) {
                                    var I = this.__data__;
                                    return IQ ? I[g] !== tg : dA.call(I, g)
                                }

                                function Ie(g, I) {
                                    var e = this.__data__;
                                    return this.size += this.has(g) ? 0 : 1, e[g] = IQ && I === tg ? sg : I, this
                                }

                                function ee(g) {
                                    var I = -1,
                                        e = null == g ? 0 : g.length;
                                    for (this.clear(); ++I < e;) {
                                        var n = g[I];
                                        this.set(n[0], n[1])
                                    }
                                }

                                function ne() {
                                    this.__data__ = [], this.size = 0
                                }

                                function te(g) {
                                    var I = this.__data__,
                                        e = Pe(I, g);
                                    return !(e < 0) && (e == I.length - 1 ? I.pop() : pA.call(I, e, 1), --this.size, !0)
                                }

                                function Ce(g) {
                                    var I = this.__data__,
                                        e = Pe(I, g);
                                    return e < 0 ? tg : I[e][1]
                                }

                                function le(g) {
                                    return Pe(this.__data__, g) > -1
                                }

                                function ie(g, I) {
                                    var e = this.__data__,
                                        n = Pe(e, g);
                                    return n < 0 ? (++this.size, e.push([g, I])) : e[n][1] = I, this
                                }

                                function se(g) {
                                    var I = -1,
                                        e = null == g ? 0 : g.length;
                                    for (this.clear(); ++I < e;) {
                                        var n = g[I];
                                        this.set(n[0], n[1])
                                    }
                                }

                                function Be() {
                                    this.size = 0, this.__data__ = {
                                        hash: new eg,
                                        map: new(_A || ee),
                                        string: new eg
                                    }
                                }

                                function Ae(g) {
                                    var I = mC(this, g).delete(g);
                                    return this.size -= I ? 1 : 0, I
                                }

                                function Qe(g) {
                                    return mC(this, g).get(g)
                                }

                                function ae(g) {
                                    return mC(this, g).has(g)
                                }

                                function ce(g, I) {
                                    var e = mC(this, g),
                                        n = e.size;
                                    return e.set(g, I), this.size += e.size == n ? 0 : 1, this
                                }

                                function ue(g) {
                                    var I = -1,
                                        e = null == g ? 0 : g.length;
                                    for (this.__data__ = new se; ++I < e;) this.add(g[I])
                                }

                                function be(g) {
                                    return this.__data__.set(g, sg), this
                                }

                                function oe(g) {
                                    return this.__data__.has(g)
                                }

                                function Ue(g) {
                                    var I = this.__data__ = new ee(g);
                                    this.size = I.size
                                }

                                function Ve() {
                                    this.__data__ = new ee, this.size = 0
                                }

                                function We(g) {
                                    var I = this.__data__,
                                        e = I.delete(g);
                                    return this.size = I.size, e
                                }

                                function he(g) {
                                    return this.__data__.get(g)
                                }

                                function xe(g) {
                                    return this.__data__.has(g)
                                }

                                function Re(g, I) {
                                    var e = this.__data__;
                                    if (e instanceof ee) {
                                        var n = e.__data__;
                                        if (!_A || n.length < Cg - 1) return n.push([g, I]), this.size = ++e.size, this;
                                        e = this.__data__ = new se(n)
                                    }
                                    return e.set(g, I), this.size = e.size, this
                                }

                                function Xe(g, I) {
                                    var e = da(g),
                                        n = !e && Fa(g),
                                        t = !e && !n && ba(g),
                                        C = !e && !n && !t && ma(g),
                                        l = e || n || t || C,
                                        i = l ? L(g.length, sA) : [],
                                        s = i.length;
                                    for (var B in g) !I && !dA.call(g, B) || l && ("length" == B || t && ("offset" == B || "parent" == B) || C && ("buffer" == B || "byteLength" == B || "byteOffset" == B) || EC(B, s)) || i.push(B);
                                    return i
                                }

                                function Le(g) {
                                    var I = g.length;
                                    return I ? g[$n(0, I - 1)] : tg
                                }

                                function Ee(g, I) {
                                    return _C(vt(g), In(I, 0, g.length))
                                }

                                function Ye(g) {
                                    return _C(vt(g))
                                }

                                function ve(g, I, e) {
                                    (e === tg || Di(g[I], e)) && (e !== tg || I in g) || $e(g, I, e)
                                }

                                function De(g, I, e) {
                                    var n = g[I];
                                    dA.call(g, I) && Di(n, e) && (e !== tg || I in g) || $e(g, I, e)
                                }

                                function Pe(g, I) {
                                    for (var e = g.length; e--;)
                                        if (Di(g[e][0], I)) return e;
                                    return -1
                                }

                                function Ke(g, I, e, n) {
                                    return cQ(g, function(g, t, C) {
                                        I(n, g, e(g), C)
                                    }), n
                                }

                                function _e(g, I) {
                                    return g && Jt(I, Hs(I), g)
                                }

                                function qe(g, I) {
                                    return g && Jt(I, ks(I), g)
                                }

                                function $e(g, I, e) {
                                    "__proto__" == I && LA ? LA(g, I, {
                                        configurable: !0,
                                        enumerable: !0,
                                        value: e,
                                        writable: !0
                                    }) : g[I] = e
                                }

                                function gn(g, I) {
                                    for (var e = -1, n = I.length, t = IA(n), C = null == g; ++e < n;) t[e] = C ? tg : Ys(g, I[e]);
                                    return t
                                }

                                function In(g, I, e) {
                                    return g === g && (e !== tg && (g = g <= e ? g : e), I !== tg && (g = g >= I ? g : I)), g
                                }

                                function en(g, I, e, n, t, C) {
                                    var l, i = I & Qg,
                                        s = I & ag,
                                        A = I & cg;
                                    if (e && (l = t ? e(g, n, t, C) : e(g)), l !== tg) return l;
                                    if (!ns(g)) return g;
                                    var Q = da(g);
                                    if (Q) {
                                        if (l = pC(g), !i) return vt(g, l)
                                    } else {
                                        var a = WQ(g),
                                            c = a == Mg || a == jg;
                                        if (ba(g)) return Wt(g, i);
                                        if (a == qg || a == kg || c && !t) {
                                            if (l = s || c ? {} : RC(g), !i) return s ? kt(g, qe(l, g)) : Ht(g, _e(l, g))
                                        } else {
                                            if (!Ze[a]) return t ? g : {};
                                            l = XC(g, a, en, i)
                                        }
                                    }
                                    C || (C = new Ue);
                                    var F = C.get(g);
                                    if (F) return F;
                                    C.set(g, l);
                                    var d = A ? s ? oC : bC : s ? ks : Hs,
                                        u = Q ? tg : d(g);
                                    return B(u || g, function(n, t) {
                                        u && (t = n, n = g[t]), De(l, t, en(n, I, e, t, g, C))
                                    }), l
                                }

                                function nn(g) {
                                    var I = Hs(g);
                                    return function(e) {
                                        return tn(e, g, I)
                                    }
                                }

                                function tn(g, I, e) {
                                    var n = e.length;
                                    if (null == g) return !n;
                                    for (g = lA(g); n--;) {
                                        var t = e[n],
                                            C = I[t],
                                            l = g[t];
                                        if (l === tg && !(t in g) || !C(l)) return !1
                                    }
                                    return !0
                                }

                                function Cn(g, I, e) {
                                    if ("function" != typeof g) throw new BA(ig);
                                    return yQ(function() {
                                        g.apply(tg, e)
                                    }, I)
                                }

                                function ln(g, I, e, n) {
                                    var t = -1,
                                        C = c,
                                        l = !0,
                                        i = g.length,
                                        s = [],
                                        B = I.length;
                                    if (!i) return s;
                                    e && (I = d(I, S(e))), n ? (C = F, l = !1) : I.length >= Cg && (C = v, l = !1, I = new ue(I));
                                    g: for (; ++t < i;) {
                                        var A = g[t],
                                            Q = null == e ? A : e(A);
                                        if (A = n || 0 !== A ? A : 0, l && Q === Q) {
                                            for (var a = B; a--;)
                                                if (I[a] === Q) continue g;
                                            s.push(A)
                                        } else C(I, Q, n) || s.push(A)
                                    }
                                    return s
                                }

                                function sn(g, I) {
                                    var e = !0;
                                    return cQ(g, function(g, n, t) {
                                        return e = !!I(g, n, t)
                                    }), e
                                }

                                function Bn(g, I, e) {
                                    for (var n = -1, t = g.length; ++n < t;) {
                                        var C = g[n],
                                            l = I(C);
                                        if (null != l && (i === tg ? l === l && !ds(l) : e(l, i))) var i = l,
                                            s = C
                                    }
                                    return s
                                }

                                function An(g, I, e, n) {
                                    var t = g.length;
                                    for (e = Gs(e), e < 0 && (e = -e > t ? 0 : t + e), n = n === tg || n > t ? t : Gs(n), n < 0 && (n += t), n = e > n ? 0 : ms(n); e < n;) g[e++] = I;
                                    return g
                                }

                                function Qn(g, I) {
                                    var e = [];
                                    return cQ(g, function(g, n, t) {
                                        I(g, n, t) && e.push(g)
                                    }), e
                                }

                                function an(g, I, e, n, t) {
                                    var C = -1,
                                        l = g.length;
                                    for (e || (e = LC), t || (t = []); ++C < l;) {
                                        var i = g[C];
                                        I > 0 && e(i) ? I > 1 ? an(i, I - 1, e, n, t) : u(t, i) : n || (t[t.length] = i)
                                    }
                                    return t
                                }

                                function cn(g, I) {
                                    return g && dQ(g, I, Hs)
                                }

                                function Fn(g, I) {
                                    return g && uQ(g, I, Hs)
                                }

                                function dn(g, I) {
                                    return a(I, function(I) {
                                        return gs(g[I])
                                    })
                                }

                                function un(g, I) {
                                    I = Zt(I, g);
                                    for (var e = 0, n = I.length; null != g && e < n;) g = g[qC(I[e++])];
                                    return e && e == n ? g : tg
                                }

                                function bn(g, I, e) {
                                    var n = I(g);
                                    return da(g) ? n : u(n, e(g))
                                }

                                function on(g) {
                                    return null == g ? g === tg ? tI : _g : NA && NA in lA(g) ? WC(g) : wC(g)
                                }

                                function Un(g, I) {
                                    return g > I
                                }

                                function rn(g, I) {
                                    return null != g && dA.call(g, I)
                                }

                                function Gn(g, I) {
                                    return null != g && I in lA(g)
                                }

                                function mn(g, I, e) {
                                    return g >= wA(I, e) && g < DA(I, e)
                                }

                                function Zn(g, I, e) {
                                    for (var n = e ? F : c, t = g[0].length, C = g.length, l = C, i = IA(C), s = 1 / 0, B = []; l--;) {
                                        var A = g[l];
                                        l && I && (A = d(A, S(I))), s = wA(A.length, s), i[l] = !e && (I || t >= 120 && A.length >= 120) ? new ue(l && A) : tg
                                    }
                                    A = g[0];
                                    var Q = -1,
                                        a = i[0];
                                    g: for (; ++Q < t && B.length < s;) {
                                        var u = A[Q],
                                            b = I ? I(u) : u;
                                        if (u = e || 0 !== u ? u : 0, !(a ? v(a, b) : n(B, b, e))) {
                                            for (l = C; --l;) {
                                                var o = i[l];
                                                if (!(o ? v(o, b) : n(g[l], b, e))) continue g
                                            }
                                            a && a.push(b), B.push(u)
                                        }
                                    }
                                    return B
                                }

                                function Vn(g, I, e, n) {
                                    return cn(g, function(g, t, C) {
                                        I(n, e(g), t, C)
                                    }), n
                                }

                                function Wn(g, I, e) {
                                    I = Zt(I, g), g = MC(g, I);
                                    var n = null == g ? g : g[qC(rl(I))];
                                    return null == n ? tg : i(n, g, e)
                                }

                                function hn(g) {
                                    return ts(g) && on(g) == kg
                                }

                                function xn(g) {
                                    return ts(g) && on(g) == iI
                                }

                                function yn(g) {
                                    return ts(g) && on(g) == Dg
                                }

                                function pn(g, I, e, n, t) {
                                    return g === I || (null == g || null == I || !ts(g) && !ts(I) ? g !== g && I !== I : Rn(g, I, e, n, pn, t))
                                }

                                function Rn(g, I, e, n, t, C) {
                                    var l = da(g),
                                        i = da(I),
                                        s = l ? fg : WQ(g),
                                        B = i ? fg : WQ(I);
                                    s = s == kg ? qg : s, B = B == kg ? qg : B;
                                    var A = s == qg,
                                        Q = B == qg,
                                        a = s == B;
                                    if (a && ba(g)) {
                                        if (!ba(I)) return !1;
                                        l = !0, A = !1
                                    }
                                    if (a && !A) return C || (C = new Ue), l || ma(g) ? cC(g, I, e, n, t, C) : FC(g, I, s, e, n, t, C);
                                    if (!(e & Fg)) {
                                        var c = A && dA.call(g, "__wrapped__"),
                                            F = Q && dA.call(I, "__wrapped__");
                                        if (c || F) {
                                            var d = c ? g.value() : g,
                                                u = F ? I.value() : I;
                                            return C || (C = new Ue), t(d, u, e, n, C)
                                        }
                                    }
                                    return !!a && (C || (C = new Ue), dC(g, I, e, n, t, C))
                                }

                                function Xn(g) {
                                    return ts(g) && WQ(g) == Pg
                                }

                                function Nn(g, I, e, n) {
                                    var t = e.length,
                                        C = t,
                                        l = !n;
                                    if (null == g) return !C;
                                    for (g = lA(g); t--;) {
                                        var i = e[t];
                                        if (l && i[2] ? i[1] !== g[i[0]] : !(i[0] in g)) return !1
                                    }
                                    for (; ++t < C;) {
                                        i = e[t];
                                        var s = i[0],
                                            B = g[s],
                                            A = i[1];
                                        if (l && i[2]) {
                                            if (B === tg && !(s in g)) return !1
                                        } else {
                                            var Q = new Ue;
                                            if (n) var a = n(B, A, s, g, I, Q);
                                            if (!(a === tg ? pn(A, B, Fg | dg, n, Q) : a)) return !1
                                        }
                                    }
                                    return !0
                                }

                                function Ln(g) {
                                    return !(!ns(g) || HC(g)) && (gs(g) ? GA : OI).test($C(g))
                                }

                                function En(g) {
                                    return ts(g) && on(g) == gI
                                }

                                function Sn(g) {
                                    return ts(g) && WQ(g) == II
                                }

                                function Yn(g) {
                                    return ts(g) && es(g.length) && !!me[on(g)]
                                }

                                function vn(g) {
                                    return "function" == typeof g ? g : null == g ? pB : "object" == typeof g ? da(g) ? zn(g[0], g[1]) : Tn(g) : vB(g)
                                }

                                function Jn(g) {
                                    if (!kC(g)) return zA(g);
                                    var I = [];
                                    for (var e in lA(g)) dA.call(g, e) && "constructor" != e && I.push(e);
                                    return I
                                }

                                function Hn(g) {
                                    if (!ns(g)) return DC(g);
                                    var I = kC(g),
                                        e = [];
                                    for (var n in g)("constructor" != n || !I && dA.call(g, n)) && e.push(n);
                                    return e
                                }

                                function kn(g, I) {
                                    return g < I
                                }

                                function fn(g, I) {
                                    var e = -1,
                                        n = wi(g) ? IA(g.length) : [];
                                    return cQ(g, function(g, t, C) {
                                        n[++e] = I(g, t, C)
                                    }), n
                                }

                                function Tn(g) {
                                    var I = ZC(g);
                                    return 1 == I.length && I[0][2] ? TC(I[0][0], I[0][1]) : function(e) {
                                        return e === g || Nn(e, g, I)
                                    }
                                }

                                function zn(g, I) {
                                    return YC(g) && fC(I) ? TC(qC(g), I) : function(e) {
                                        var n = Ys(e, g);
                                        return n === tg && n === I ? Js(e, g) : pn(I, n, Fg | dg)
                                    }
                                }

                                function Dn(g, I, e, n, t) {
                                    g !== I && dQ(I, function(C, l) {
                                        if (ns(C)) t || (t = new Ue), wn(g, I, l, e, Dn, n, t);
                                        else {
                                            var i = n ? n(g[l], C, l + "", g, I, t) : tg;
                                            i === tg && (i = C), ve(g, l, i)
                                        }
                                    }, ks)
                                }

                                function wn(g, I, e, n, t, C, l) {
                                    var i = g[e],
                                        s = I[e],
                                        B = l.get(s);
                                    if (B) return void ve(g, e, B);
                                    var A = C ? C(i, s, e + "", g, I, l) : tg,
                                        Q = A === tg;
                                    if (Q) {
                                        var a = da(s),
                                            c = !a && ba(s),
                                            F = !a && !c && ma(s);
                                        A = s, a || c || F ? da(i) ? A = i : Oi(i) ? A = vt(i) : c ? (Q = !1, A = Wt(s, !0)) : F ? (Q = !1, A = Nt(s, !0)) : A = [] : as(s) || Fa(s) ? (A = i, Fa(i) ? A = Vs(i) : (!ns(i) || n && gs(i)) && (A = RC(s))) : Q = !1
                                    }
                                    Q && (l.set(s, A), t(A, s, n, C, l), l.delete(s)), ve(g, e, A)
                                }

                                function On(g, I) {
                                    var e = g.length;
                                    if (e) return I += I < 0 ? e : 0, EC(I, e) ? g[I] : tg
                                }

                                function Mn(g, I, e) {
                                    var n = -1;
                                    return I = d(I.length ? I : [pB], S(GC())), X(fn(g, function(g, e, t) {
                                        return {
                                            criteria: d(I, function(I) {
                                                return I(g)
                                            }),
                                            index: ++n,
                                            value: g
                                        }
                                    }), function(g, I) {
                                        return Et(g, I, e)
                                    })
                                }

                                function jn(g, I) {
                                    return Pn(g, I, function(I, e) {
                                        return Js(g, e)
                                    })
                                }

                                function Pn(g, I, e) {
                                    for (var n = -1, t = I.length, C = {}; ++n < t;) {
                                        var l = I[n],
                                            i = un(g, l);
                                        e(i, l) && Ct(C, Zt(l, g), i)
                                    }
                                    return C
                                }

                                function Kn(g) {
                                    return function(I) {
                                        return un(I, g)
                                    }
                                }

                                function _n(g, I, e, n) {
                                    var t = n ? W : V,
                                        C = -1,
                                        l = I.length,
                                        i = g;
                                    for (g === I && (I = vt(I)), e && (i = d(g, S(e))); ++C < l;)
                                        for (var s = 0, B = I[C], A = e ? e(B) : B;
                                            (s = t(i, A, s, n)) > -1;) i !== g && pA.call(i, s, 1), pA.call(g, s, 1);
                                    return g
                                }

                                function qn(g, I) {
                                    for (var e = g ? I.length : 0, n = e - 1; e--;) {
                                        var t = I[e];
                                        if (e == n || t !== C) {
                                            var C = t;
                                            EC(t) ? pA.call(g, t, 1) : dt(g, t)
                                        }
                                    }
                                    return g
                                }

                                function $n(g, I) {
                                    return g + JA(jA() * (I - g + 1))
                                }

                                function gt(g, I, e, n) {
                                    for (var t = -1, C = DA(vA((I - g) / (e || 1)), 0), l = IA(C); C--;) l[n ? C : ++t] = g, g += e;
                                    return l
                                }

                                function It(g, I) {
                                    var e = "";
                                    if (!g || I < 1 || I > Lg) return e;
                                    do {
                                        I % 2 && (e += g), (I = JA(I / 2)) && (g += g)
                                    } while (I);
                                    return e
                                }

                                function et(g, I) {
                                    return pQ(OC(g, I, pB), g + "")
                                }

                                function nt(g) {
                                    return Le(qs(g))
                                }

                                function tt(g, I) {
                                    var e = qs(g);
                                    return _C(e, In(I, 0, e.length))
                                }

                                function Ct(g, I, e, n) {
                                    if (!ns(g)) return g;
                                    I = Zt(I, g);
                                    for (var t = -1, C = I.length, l = C - 1, i = g; null != i && ++t < C;) {
                                        var s = qC(I[t]),
                                            B = e;
                                        if (t != l) {
                                            var A = i[s];
                                            B = n ? n(A, s, i) : tg, B === tg && (B = ns(A) ? A : EC(I[t + 1]) ? [] : {})
                                        }
                                        De(i, s, B), i = i[s]
                                    }
                                    return g
                                }

                                function lt(g) {
                                    return _C(qs(g))
                                }

                                function it(g, I, e) {
                                    var n = -1,
                                        t = g.length;
                                    I < 0 && (I = -I > t ? 0 : t + I), e = e > t ? t : e, e < 0 && (e += t), t = I > e ? 0 : e - I >>> 0, I >>>= 0;
                                    for (var C = IA(t); ++n < t;) C[n] = g[n + I];
                                    return C
                                }

                                function st(g, I) {
                                    var e;
                                    return cQ(g, function(g, n, t) {
                                        return !(e = I(g, n, t))
                                    }), !!e
                                }

                                function Bt(g, I, e) {
                                    var n = 0,
                                        t = null == g ? n : g.length;
                                    if ("number" == typeof I && I === I && t <= Jg) {
                                        for (; n < t;) {
                                            var C = n + t >>> 1,
                                                l = g[C];
                                            null !== l && !ds(l) && (e ? l <= I : l < I) ? n = C + 1 : t = C
                                        }
                                        return t
                                    }
                                    return At(g, I, pB, e)
                                }

                                function At(g, I, e, n) {
                                    I = e(I);
                                    for (var t = 0, C = null == g ? 0 : g.length, l = I !== I, i = null === I, s = ds(I), B = I === tg; t < C;) {
                                        var A = JA((t + C) / 2),
                                            Q = e(g[A]),
                                            a = Q !== tg,
                                            c = null === Q,
                                            F = Q === Q,
                                            d = ds(Q);
                                        if (l) var u = n || F;
                                        else u = B ? F && (n || a) : i ? F && a && (n || !c) : s ? F && a && !c && (n || !d) : !c && !d && (n ? Q <= I : Q < I);
                                        u ? t = A + 1 : C = A
                                    }
                                    return wA(C, vg)
                                }

                                function Qt(g, I) {
                                    for (var e = -1, n = g.length, t = 0, C = []; ++e < n;) {
                                        var l = g[e],
                                            i = I ? I(l) : l;
                                        if (!e || !Di(i, s)) {
                                            var s = i;
                                            C[t++] = 0 === l ? 0 : l
                                        }
                                    }
                                    return C
                                }

                                function at(g) {
                                    return "number" == typeof g ? g : ds(g) ? Sg : +g
                                }

                                function ct(g) {
                                    if ("string" == typeof g) return g;
                                    if (da(g)) return d(g, ct) + "";
                                    if (ds(g)) return QQ ? QQ.call(g) : "";
                                    var I = g + "";
                                    return "0" == I && 1 / g == -Ng ? "-0" : I
                                }

                                function Ft(g, I, e) {
                                    var n = -1,
                                        t = c,
                                        C = g.length,
                                        l = !0,
                                        i = [],
                                        s = i;
                                    if (e) l = !1, t = F;
                                    else if (C >= Cg) {
                                        var B = I ? null : GQ(g);
                                        if (B) return P(B);
                                        l = !1, t = v, s = new ue
                                    } else s = I ? [] : i;
                                    g: for (; ++n < C;) {
                                        var A = g[n],
                                            Q = I ? I(A) : A;
                                        if (A = e || 0 !== A ? A : 0, l && Q === Q) {
                                            for (var a = s.length; a--;)
                                                if (s[a] === Q) continue g;
                                            I && s.push(Q), i.push(A)
                                        } else t(s, Q, e) || (s !== i && s.push(Q), i.push(A))
                                    }
                                    return i
                                }

                                function dt(g, I) {
                                    return I = Zt(I, g), null == (g = MC(g, I)) || delete g[qC(rl(I))]
                                }

                                function ut(g, I, e, n) {
                                    return Ct(g, I, e(un(g, I)), n)
                                }

                                function bt(g, I, e, n) {
                                    for (var t = g.length, C = n ? t : -1;
                                        (n ? C-- : ++C < t) && I(g[C], C, g););
                                    return e ? it(g, n ? 0 : C, n ? C + 1 : t) : it(g, n ? C + 1 : 0, n ? t : C)
                                }

                                function ot(g, I) {
                                    var e = g;
                                    return e instanceof r && (e = e.value()), b(I, function(g, I) {
                                        return I.func.apply(I.thisArg, u([g], I.args))
                                    }, e)
                                }

                                function Ut(g, I, e) {
                                    var n = g.length;
                                    if (n < 2) return n ? Ft(g[0]) : [];
                                    for (var t = -1, C = IA(n); ++t < n;)
                                        for (var l = g[t], i = -1; ++i < n;) i != t && (C[t] = ln(C[t] || l, g[i], I, e));
                                    return Ft(an(C, 1), I, e)
                                }

                                function rt(g, I, e) {
                                    for (var n = -1, t = g.length, C = I.length, l = {}; ++n < t;) {
                                        var i = n < C ? I[n] : tg;
                                        e(l, g[n], i)
                                    }
                                    return l
                                }

                                function Gt(g) {
                                    return Oi(g) ? g : []
                                }

                                function mt(g) {
                                    return "function" == typeof g ? g : pB
                                }

                                function Zt(g, I) {
                                    return da(g) ? g : YC(g, I) ? [g] : RQ(hs(g))
                                }

                                function Vt(g, I, e) {
                                    var n = g.length;
                                    return e = e === tg ? n : e, !I && e >= n ? g : it(g, I, e)
                                }

                                function Wt(g, I) {
                                    if (I) return g.slice();
                                    var e = g.length,
                                        n = WA ? WA(e) : new g.constructor(e);
                                    return g.copy(n), n
                                }

                                function ht(g) {
                                    var I = new g.constructor(g.byteLength);
                                    return new VA(I).set(new VA(g)), I
                                }

                                function xt(g, I) {
                                    var e = I ? ht(g.buffer) : g.buffer;
                                    return new g.constructor(e, g.byteOffset, g.byteLength)
                                }

                                function yt(g, I, e) {
                                    return b(I ? e(O(g), Qg) : O(g), C, new g.constructor)
                                }

                                function pt(g) {
                                    var I = new g.constructor(g.source, zI.exec(g));
                                    return I.lastIndex = g.lastIndex, I
                                }

                                function Rt(g, I, e) {
                                    return b(I ? e(P(g), Qg) : P(g), l, new g.constructor)
                                }

                                function Xt(g) {
                                    return AQ ? lA(AQ.call(g)) : {}
                                }

                                function Nt(g, I) {
                                    var e = I ? ht(g.buffer) : g.buffer;
                                    return new g.constructor(e, g.byteOffset, g.length)
                                }

                                function Lt(g, I) {
                                    if (g !== I) {
                                        var e = g !== tg,
                                            n = null === g,
                                            t = g === g,
                                            C = ds(g),
                                            l = I !== tg,
                                            i = null === I,
                                            s = I === I,
                                            B = ds(I);
                                        if (!i && !B && !C && g > I || C && l && s && !i && !B || n && l && s || !e && s || !t) return 1;
                                        if (!n && !C && !B && g < I || B && e && t && !n && !C || i && e && t || !l && t || !s) return -1
                                    }
                                    return 0
                                }

                                function Et(g, I, e) {
                                    for (var n = -1, t = g.criteria, C = I.criteria, l = t.length, i = e.length; ++n < l;) {
                                        var s = Lt(t[n], C[n]);
                                        if (s) {
                                            if (n >= i) return s;
                                            return s * ("desc" == e[n] ? -1 : 1)
                                        }
                                    }
                                    return g.index - I.index
                                }

                                function St(g, I, e, n) {
                                    for (var t = -1, C = g.length, l = e.length, i = -1, s = I.length, B = DA(C - l, 0), A = IA(s + B), Q = !n; ++i < s;) A[i] = I[i];
                                    for (; ++t < l;)(Q || t < C) && (A[e[t]] = g[t]);
                                    for (; B--;) A[i++] = g[t++];
                                    return A
                                }

                                function Yt(g, I, e, n) {
                                    for (var t = -1, C = g.length, l = -1, i = e.length, s = -1, B = I.length, A = DA(C - i, 0), Q = IA(A + B), a = !n; ++t < A;) Q[t] = g[t];
                                    for (var c = t; ++s < B;) Q[c + s] = I[s];
                                    for (; ++l < i;)(a || t < C) && (Q[c + e[l]] = g[t++]);
                                    return Q
                                }

                                function vt(g, I) {
                                    var e = -1,
                                        n = g.length;
                                    for (I || (I = IA(n)); ++e < n;) I[e] = g[e];
                                    return I
                                }

                                function Jt(g, I, e, n) {
                                    var t = !e;
                                    e || (e = {});
                                    for (var C = -1, l = I.length; ++C < l;) {
                                        var i = I[C],
                                            s = n ? n(e[i], g[i], i, e, g) : tg;
                                        s === tg && (s = g[i]), t ? $e(e, i, s) : De(e, i, s)
                                    }
                                    return e
                                }

                                function Ht(g, I) {
                                    return Jt(g, ZQ(g), I)
                                }

                                function kt(g, I) {
                                    return Jt(g, VQ(g), I)
                                }

                                function ft(g, I) {
                                    return function(e, n) {
                                        var t = da(e) ? s : Ke,
                                            C = I ? I() : {};
                                        return t(e, g, GC(n, 2), C)
                                    }
                                }

                                function Tt(g) {
                                    return et(function(I, e) {
                                        var n = -1,
                                            t = e.length,
                                            C = t > 1 ? e[t - 1] : tg,
                                            l = t > 2 ? e[2] : tg;
                                        for (C = g.length > 3 && "function" == typeof C ? (t--, C) : tg, l && SC(e[0], e[1], l) && (C = t < 3 ? tg : C, t = 1), I = lA(I); ++n < t;) {
                                            var i = e[n];
                                            i && g(I, i, n, C)
                                        }
                                        return I
                                    })
                                }

                                function zt(g, I) {
                                    return function(e, n) {
                                        if (null == e) return e;
                                        if (!wi(e)) return g(e, n);
                                        for (var t = e.length, C = I ? t : -1, l = lA(e);
                                            (I ? C-- : ++C < t) && !1 !== n(l[C], C, l););
                                        return e
                                    }
                                }

                                function Dt(g) {
                                    return function(I, e, n) {
                                        for (var t = -1, C = lA(I), l = n(I), i = l.length; i--;) {
                                            var s = l[g ? i : ++t];
                                            if (!1 === e(C[s], s, C)) break
                                        }
                                        return I
                                    }
                                }

                                function wt(g, I, e) {
                                    function n() {
                                        return (this && this !== Ne && this instanceof n ? C : g).apply(t ? e : this, arguments)
                                    }
                                    var t = I & ug,
                                        C = jt(g);
                                    return n
                                }

                                function Ot(g) {
                                    return function(I) {
                                        I = hs(I);
                                        var e = z(I) ? gg(I) : tg,
                                            n = e ? e[0] : I.charAt(0),
                                            t = e ? Vt(e, 1).join("") : I.slice(1);
                                        return n[g]() + t
                                    }
                                }

                                function Mt(g) {
                                    return function(I) {
                                        return b(VB(tB(I).replace(Fe, "")), g, "")
                                    }
                                }

                                function jt(g) {
                                    return function() {
                                        var I = arguments;
                                        switch (I.length) {
                                            case 0:
                                                return new g;
                                            case 1:
                                                return new g(I[0]);
                                            case 2:
                                                return new g(I[0], I[1]);
                                            case 3:
                                                return new g(I[0], I[1], I[2]);
                                            case 4:
                                                return new g(I[0], I[1], I[2], I[3]);
                                            case 5:
                                                return new g(I[0], I[1], I[2], I[3], I[4]);
                                            case 6:
                                                return new g(I[0], I[1], I[2], I[3], I[4], I[5]);
                                            case 7:
                                                return new g(I[0], I[1], I[2], I[3], I[4], I[5], I[6])
                                        }
                                        var e = aQ(g.prototype),
                                            n = g.apply(e, I);
                                        return ns(n) ? n : e
                                    }
                                }

                                function Pt(g, I, e) {
                                    function n() {
                                        for (var C = arguments.length, l = IA(C), s = C, B = rC(n); s--;) l[s] = arguments[s];
                                        var A = C < 3 && l[0] !== B && l[C - 1] !== B ? [] : j(l, B);
                                        return (C -= A.length) < e ? lC(g, I, qt, n.placeholder, tg, l, A, tg, tg, e - C) : i(this && this !== Ne && this instanceof n ? t : g, this, l)
                                    }
                                    var t = jt(g);
                                    return n
                                }

                                function Kt(g) {
                                    return function(I, e, n) {
                                        var t = lA(I);
                                        if (!wi(I)) {
                                            var C = GC(e, 3);
                                            I = Hs(I), e = function(g) {
                                                return C(t[g], g, t)
                                            }
                                        }
                                        var l = g(I, e, n);
                                        return l > -1 ? t[C ? I[l] : l] : tg
                                    }
                                }

                                function _t(g) {
                                    return uC(function(I) {
                                        var e = I.length,
                                            n = e,
                                            C = t.prototype.thru;
                                        for (g && I.reverse(); n--;) {
                                            var l = I[n];
                                            if ("function" != typeof l) throw new BA(ig);
                                            if (C && !i && "wrapper" == UC(l)) var i = new t([], !0)
                                        }
                                        for (n = i ? n : e; ++n < e;) {
                                            l = I[n];
                                            var s = UC(l),
                                                B = "wrapper" == s ? mQ(l) : tg;
                                            i = B && JC(B[0]) && B[1] == (Zg | Ug | Gg | Vg) && !B[4].length && 1 == B[9] ? i[UC(B[0])].apply(i, B[3]) : 1 == l.length && JC(l) ? i[s]() : i.thru(l)
                                        }
                                        return function() {
                                            var g = arguments,
                                                n = g[0];
                                            if (i && 1 == g.length && da(n)) return i.plant(n).value();
                                            for (var t = 0, C = e ? I[t].apply(this, g) : n; ++t < e;) C = I[t].call(this, C);
                                            return C
                                        }
                                    })
                                }

                                function qt(g, I, e, n, t, C, l, i, s, B) {
                                    function A() {
                                        for (var b = arguments.length, o = IA(b), U = b; U--;) o[U] = arguments[U];
                                        if (F) var r = rC(A),
                                            G = k(o, r);
                                        if (n && (o = St(o, n, t, F)), C && (o = Yt(o, C, l, F)), b -= G, F && b < B) {
                                            var m = j(o, r);
                                            return lC(g, I, qt, A.placeholder, e, o, m, i, s, B - b)
                                        }
                                        var Z = a ? e : this,
                                            V = c ? Z[g] : g;
                                        return b = o.length, i ? o = jC(o, i) : d && b > 1 && o.reverse(), Q && s < b && (o.length = s), this && this !== Ne && this instanceof A && (V = u || jt(V)), V.apply(Z, o)
                                    }
                                    var Q = I & Zg,
                                        a = I & ug,
                                        c = I & bg,
                                        F = I & (Ug | rg),
                                        d = I & Wg,
                                        u = c ? tg : jt(g);
                                    return A
                                }

                                function $t(g, I) {
                                    return function(e, n) {
                                        return Vn(e, g, I(n), {})
                                    }
                                }

                                function gC(g, I) {
                                    return function(e, n) {
                                        var t;
                                        if (e === tg && n === tg) return I;
                                        if (e !== tg && (t = e), n !== tg) {
                                            if (t === tg) return n;
                                            "string" == typeof e || "string" == typeof n ? (e = ct(e), n = ct(n)) : (e = at(e), n = at(n)), t = g(e, n)
                                        }
                                        return t
                                    }
                                }

                                function IC(g) {
                                    return uC(function(I) {
                                        return I = d(I, S(GC())), et(function(e) {
                                            var n = this;
                                            return g(I, function(g) {
                                                return i(g, n, e)
                                            })
                                        })
                                    })
                                }

                                function eC(g, I) {
                                    I = I === tg ? " " : ct(I);
                                    var e = I.length;
                                    if (e < 2) return e ? It(I, g) : I;
                                    var n = It(I, vA(g / $(I)));
                                    return z(I) ? Vt(gg(n), 0, g).join("") : n.slice(0, g)
                                }

                                function nC(g, I, e, n) {
                                    function t() {
                                        for (var I = -1, s = arguments.length, B = -1, A = n.length, Q = IA(A + s), a = this && this !== Ne && this instanceof t ? l : g; ++B < A;) Q[B] = n[B];
                                        for (; s--;) Q[B++] = arguments[++I];
                                        return i(a, C ? e : this, Q)
                                    }
                                    var C = I & ug,
                                        l = jt(g);
                                    return t
                                }

                                function tC(g) {
                                    return function(I, e, n) {
                                        return n && "number" != typeof n && SC(I, e, n) && (e = n = tg), I = rs(I), e === tg ? (e = I, I = 0) : e = rs(e), n = n === tg ? I < e ? 1 : -1 : rs(n), gt(I, e, n, g)
                                    }
                                }

                                function CC(g) {
                                    return function(I, e) {
                                        return "string" == typeof I && "string" == typeof e || (I = Zs(I), e = Zs(e)), g(I, e)
                                    }
                                }

                                function lC(g, I, e, n, t, C, l, i, s, B) {
                                    var A = I & Ug,
                                        Q = A ? l : tg,
                                        a = A ? tg : l,
                                        c = A ? C : tg,
                                        F = A ? tg : C;
                                    I |= A ? Gg : mg, (I &= ~(A ? mg : Gg)) & og || (I &= ~(ug | bg));
                                    var d = [g, I, t, c, Q, F, a, i, s, B],
                                        u = e.apply(tg, d);
                                    return JC(g) && xQ(u, d), u.placeholder = n, PC(u, g, I)
                                }

                                function iC(g) {
                                    var I = CA[g];
                                    return function(g, e) {
                                        if (g = Zs(g), e = null == e ? 0 : wA(Gs(e), 292)) {
                                            var n = (hs(g) + "e").split("e");
                                            return n = (hs(I(n[0] + "e" + (+n[1] + e))) + "e").split("e"), +(n[0] + "e" + (+n[1] - e))
                                        }
                                        return I(g)
                                    }
                                }

                                function sC(g) {
                                    return function(I) {
                                        var e = WQ(I);
                                        return e == Pg ? O(I) : e == II ? K(I) : E(I, g(I))
                                    }
                                }

                                function BC(g, I, e, n, t, C, l, i) {
                                    var s = I & bg;
                                    if (!s && "function" != typeof g) throw new BA(ig);
                                    var B = n ? n.length : 0;
                                    if (B || (I &= ~(Gg | mg), n = t = tg), l = l === tg ? l : DA(Gs(l), 0), i = i === tg ? i : Gs(i), B -= t ? t.length : 0, I & mg) {
                                        var A = n,
                                            Q = t;
                                        n = t = tg
                                    }
                                    var a = s ? tg : mQ(g),
                                        c = [g, I, e, n, t, A, Q, C, l, i];
                                    if (a && zC(c, a), g = c[0], I = c[1], e = c[2], n = c[3], t = c[4], i = c[9] = c[9] === tg ? s ? 0 : g.length : DA(c[9] - B, 0), !i && I & (Ug | rg) && (I &= ~(Ug | rg)), I && I != ug) F = I == Ug || I == rg ? Pt(g, I, i) : I != Gg && I != (ug | Gg) || t.length ? qt.apply(tg, c) : nC(g, I, e, n);
                                    else var F = wt(g, I, e);
                                    return PC((a ? bQ : xQ)(F, c), g, I)
                                }

                                function AC(g, I, e, n) {
                                    return g === tg || Di(g, aA[e]) && !dA.call(n, e) ? I : g
                                }

                                function QC(g, I, e, n, t, C) {
                                    return ns(g) && ns(I) && (C.set(I, g), Dn(g, I, tg, QC, C), C.delete(I)), g
                                }

                                function aC(g) {
                                    return as(g) ? tg : g
                                }

                                function cC(g, I, e, n, t, C) {
                                    var l = e & Fg,
                                        i = g.length,
                                        s = I.length;
                                    if (i != s && !(l && s > i)) return !1;
                                    var B = C.get(g);
                                    if (B && C.get(I)) return B == I;
                                    var A = -1,
                                        Q = !0,
                                        a = e & dg ? new ue : tg;
                                    for (C.set(g, I), C.set(I, g); ++A < i;) {
                                        var c = g[A],
                                            F = I[A];
                                        if (n) var d = l ? n(F, c, A, I, g, C) : n(c, F, A, g, I, C);
                                        if (d !== tg) {
                                            if (d) continue;
                                            Q = !1;
                                            break
                                        }
                                        if (a) {
                                            if (!U(I, function(g, I) {
                                                    if (!v(a, I) && (c === g || t(c, g, e, n, C))) return a.push(I)
                                                })) {
                                                Q = !1;
                                                break
                                            }
                                        } else if (c !== F && !t(c, F, e, n, C)) {
                                            Q = !1;
                                            break
                                        }
                                    }
                                    return C.delete(g), C.delete(I), Q
                                }

                                function FC(g, I, e, n, t, C, l) {
                                    switch (e) {
                                        case sI:
                                            if (g.byteLength != I.byteLength || g.byteOffset != I.byteOffset) return !1;
                                            g = g.buffer, I = I.buffer;
                                        case iI:
                                            return !(g.byteLength != I.byteLength || !C(new VA(g), new VA(I)));
                                        case zg:
                                        case Dg:
                                        case Kg:
                                            return Di(+g, +I);
                                        case Og:
                                            return g.name == I.name && g.message == I.message;
                                        case gI:
                                        case eI:
                                            return g == I + "";
                                        case Pg:
                                            var i = O;
                                        case II:
                                            var s = n & Fg;
                                            if (i || (i = P), g.size != I.size && !s) return !1;
                                            var B = l.get(g);
                                            if (B) return B == I;
                                            n |= dg, l.set(g, I);
                                            var A = cC(i(g), i(I), n, t, C, l);
                                            return l.delete(g), A;
                                        case nI:
                                            if (AQ) return AQ.call(g) == AQ.call(I)
                                    }
                                    return !1
                                }

                                function dC(g, I, e, n, t, C) {
                                    var l = e & Fg,
                                        i = bC(g),
                                        s = i.length;
                                    if (s != bC(I).length && !l) return !1;
                                    for (var B = s; B--;) {
                                        var A = i[B];
                                        if (!(l ? A in I : dA.call(I, A))) return !1
                                    }
                                    var Q = C.get(g);
                                    if (Q && C.get(I)) return Q == I;
                                    var a = !0;
                                    C.set(g, I), C.set(I, g);
                                    for (var c = l; ++B < s;) {
                                        A = i[B];
                                        var F = g[A],
                                            d = I[A];
                                        if (n) var u = l ? n(d, F, A, I, g, C) : n(F, d, A, g, I, C);
                                        if (!(u === tg ? F === d || t(F, d, e, n, C) : u)) {
                                            a = !1;
                                            break
                                        }
                                        c || (c = "constructor" == A)
                                    }
                                    if (a && !c) {
                                        var b = g.constructor,
                                            o = I.constructor;
                                        b != o && "constructor" in g && "constructor" in I && !("function" == typeof b && b instanceof b && "function" == typeof o && o instanceof o) && (a = !1)
                                    }
                                    return C.delete(g), C.delete(I), a
                                }

                                function uC(g) {
                                    return pQ(OC(g, tg, al), g + "")
                                }

                                function bC(g) {
                                    return bn(g, Hs, ZQ)
                                }

                                function oC(g) {
                                    return bn(g, ks, VQ)
                                }

                                function UC(g) {
                                    for (var I = g.name + "", e = nQ[I], n = dA.call(nQ, I) ? e.length : 0; n--;) {
                                        var t = e[n],
                                            C = t.func;
                                        if (null == C || C == g) return t.name
                                    }
                                    return I
                                }

                                function rC(g) {
                                    return (dA.call(e, "placeholder") ? e : g).placeholder
                                }

                                function GC() {
                                    var g = e.iteratee || RB;
                                    return g = g === RB ? vn : g, arguments.length ? g(arguments[0], arguments[1]) : g
                                }

                                function mC(g, I) {
                                    var e = g.__data__;
                                    return vC(I) ? e["string" == typeof I ? "string" : "hash"] : e.map
                                }

                                function ZC(g) {
                                    for (var I = Hs(g), e = I.length; e--;) {
                                        var n = I[e],
                                            t = g[n];
                                        I[e] = [n, t, fC(t)]
                                    }
                                    return I
                                }

                                function VC(g, I) {
                                    var e = T(g, I);
                                    return Ln(e) ? e : tg
                                }

                                function WC(g) {
                                    var I = dA.call(g, NA),
                                        e = g[NA];
                                    try {
                                        g[NA] = tg;
                                        var n = !0
                                    } catch (g) {}
                                    var t = oA.call(g);
                                    return n && (I ? g[NA] = e : delete g[NA]), t
                                }

                                function hC(g, I, e) {
                                    for (var n = -1, t = e.length; ++n < t;) {
                                        var C = e[n],
                                            l = C.size;
                                        switch (C.type) {
                                            case "drop":
                                                g += l;
                                                break;
                                            case "dropRight":
                                                I -= l;
                                                break;
                                            case "take":
                                                I = wA(I, g + l);
                                                break;
                                            case "takeRight":
                                                g = DA(g, I - l)
                                        }
                                    }
                                    return {
                                        start: g,
                                        end: I
                                    }
                                }

                                function xC(g) {
                                    var I = g.match(JI);
                                    return I ? I[1].split(HI) : []
                                }

                                function yC(g, I, e) {
                                    I = Zt(I, g);
                                    for (var n = -1, t = I.length, C = !1; ++n < t;) {
                                        var l = qC(I[n]);
                                        if (!(C = null != g && e(g, l))) break;
                                        g = g[l]
                                    }
                                    return C || ++n != t ? C : !!(t = null == g ? 0 : g.length) && es(t) && EC(l, t) && (da(g) || Fa(g))
                                }

                                function pC(g) {
                                    var I = g.length,
                                        e = g.constructor(I);
                                    return I && "string" == typeof g[0] && dA.call(g, "index") && (e.index = g.index, e.input = g.input), e
                                }

                                function RC(g) {
                                    return "function" != typeof g.constructor || kC(g) ? {} : aQ(hA(g))
                                }

                                function XC(g, I, e, n) {
                                    var t = g.constructor;
                                    switch (I) {
                                        case iI:
                                            return ht(g);
                                        case zg:
                                        case Dg:
                                            return new t(+g);
                                        case sI:
                                            return xt(g, n);
                                        case BI:
                                        case AI:
                                        case QI:
                                        case aI:
                                        case cI:
                                        case FI:
                                        case dI:
                                        case uI:
                                        case bI:
                                            return Nt(g, n);
                                        case Pg:
                                            return yt(g, n, e);
                                        case Kg:
                                        case eI:
                                            return new t(g);
                                        case gI:
                                            return pt(g);
                                        case II:
                                            return Rt(g, n, e);
                                        case nI:
                                            return Xt(g)
                                    }
                                }

                                function NC(g, I) {
                                    var e = I.length;
                                    if (!e) return g;
                                    var n = e - 1;
                                    return I[n] = (e > 1 ? "& " : "") + I[n], I = I.join(e > 2 ? ", " : " "), g.replace(vI, "{\n/* [wrapped with " + I + "] */\n")
                                }

                                function LC(g) {
                                    return da(g) || Fa(g) || !!(RA && g && g[RA])
                                }

                                function EC(g, I) {
                                    return !!(I = null == I ? Lg : I) && ("number" == typeof g || jI.test(g)) && g > -1 && g % 1 == 0 && g < I
                                }

                                function SC(g, I, e) {
                                    if (!ns(e)) return !1;
                                    var n = typeof I;
                                    return !!("number" == n ? wi(e) && EC(I, e.length) : "string" == n && I in e) && Di(e[I], g)
                                }

                                function YC(g, I) {
                                    if (da(g)) return !1;
                                    var e = typeof g;
                                    return !("number" != e && "symbol" != e && "boolean" != e && null != g && !ds(g)) || (pI.test(g) || !yI.test(g) || null != I && g in lA(I))
                                }

                                function vC(g) {
                                    var I = typeof g;
                                    return "string" == I || "number" == I || "symbol" == I || "boolean" == I ? "__proto__" !== g : null === g
                                }

                                function JC(g) {
                                    var I = UC(g),
                                        n = e[I];
                                    if ("function" != typeof n || !(I in r.prototype)) return !1;
                                    if (g === n) return !0;
                                    var t = mQ(n);
                                    return !!t && g === t[0]
                                }

                                function HC(g) {
                                    return !!bA && bA in g
                                }

                                function kC(g) {
                                    var I = g && g.constructor;
                                    return g === ("function" == typeof I && I.prototype || aA)
                                }

                                function fC(g) {
                                    return g === g && !ns(g)
                                }

                                function TC(g, I) {
                                    return function(e) {
                                        return null != e && (e[g] === I && (I !== tg || g in lA(e)))
                                    }
                                }

                                function zC(g, I) {
                                    var e = g[1],
                                        n = I[1],
                                        t = e | n,
                                        C = t < (ug | bg | Zg),
                                        l = n == Zg && e == Ug || n == Zg && e == Vg && g[7].length <= I[8] || n == (Zg | Vg) && I[7].length <= I[8] && e == Ug;
                                    if (!C && !l) return g;
                                    n & ug && (g[2] = I[2], t |= e & ug ? 0 : og);
                                    var i = I[3];
                                    if (i) {
                                        var s = g[3];
                                        g[3] = s ? St(s, i, I[4]) : i, g[4] = s ? j(g[3], Ag) : I[4]
                                    }
                                    return i = I[5], i && (s = g[5], g[5] = s ? Yt(s, i, I[6]) : i, g[6] = s ? j(g[5], Ag) : I[6]), i = I[7], i && (g[7] = i), n & Zg && (g[8] = null == g[8] ? I[8] : wA(g[8], I[8])), null == g[9] && (g[9] = I[9]), g[0] = I[0], g[1] = t, g
                                }

                                function DC(g) {
                                    var I = [];
                                    if (null != g)
                                        for (var e in lA(g)) I.push(e);
                                    return I
                                }

                                function wC(g) {
                                    return oA.call(g)
                                }

                                function OC(g, I, e) {
                                    return I = DA(I === tg ? g.length - 1 : I, 0),
                                        function() {
                                            for (var n = arguments, t = -1, C = DA(n.length - I, 0), l = IA(C); ++t < C;) l[t] = n[I + t];
                                            t = -1;
                                            for (var s = IA(I + 1); ++t < I;) s[t] = n[t];
                                            return s[I] = e(l), i(g, this, s)
                                        }
                                }

                                function MC(g, I) {
                                    return I.length < 2 ? g : un(g, it(I, 0, -1))
                                }

                                function jC(g, I) {
                                    for (var e = g.length, n = wA(I.length, e), t = vt(g); n--;) {
                                        var C = I[n];
                                        g[n] = EC(C, e) ? t[C] : tg
                                    }
                                    return g
                                }

                                function PC(g, I, e) {
                                    var n = I + "";
                                    return pQ(g, NC(n, gl(xC(n), e)))
                                }

                                function KC(g) {
                                    var I = 0,
                                        e = 0;
                                    return function() {
                                        var n = OA(),
                                            t = pg - (n - e);
                                        if (e = n, t > 0) {
                                            if (++I >= yg) return arguments[0]
                                        } else I = 0;
                                        return g.apply(tg, arguments)
                                    }
                                }

                                function _C(g, I) {
                                    var e = -1,
                                        n = g.length,
                                        t = n - 1;
                                    for (I = I === tg ? n : I; ++e < I;) {
                                        var C = $n(e, t),
                                            l = g[C];
                                        g[C] = g[e], g[e] = l
                                    }
                                    return g.length = I, g
                                }

                                function qC(g) {
                                    if ("string" == typeof g || ds(g)) return g;
                                    var I = g + "";
                                    return "0" == I && 1 / g == -Ng ? "-0" : I
                                }

                                function $C(g) {
                                    if (null != g) {
                                        try {
                                            return FA.call(g)
                                        } catch (g) {}
                                        try {
                                            return g + ""
                                        } catch (g) {}
                                    }
                                    return ""
                                }

                                function gl(g, I) {
                                    return B(Hg, function(e) {
                                        var n = "_." + e[0];
                                        I & e[1] && !c(g, n) && g.push(n)
                                    }), g.sort()
                                }

                                function Il(g) {
                                    if (g instanceof r) return g.clone();
                                    var I = new t(g.__wrapped__, g.__chain__);
                                    return I.__actions__ = vt(g.__actions__), I.__index__ = g.__index__, I.__values__ = g.__values__, I
                                }

                                function el(g, I, e) {
                                    I = (e ? SC(g, I, e) : I === tg) ? 1 : DA(Gs(I), 0);
                                    var n = null == g ? 0 : g.length;
                                    if (!n || I < 1) return [];
                                    for (var t = 0, C = 0, l = IA(vA(n / I)); t < n;) l[C++] = it(g, t, t += I);
                                    return l
                                }

                                function nl(g) {
                                    for (var I = -1, e = null == g ? 0 : g.length, n = 0, t = []; ++I < e;) {
                                        var C = g[I];
                                        C && (t[n++] = C)
                                    }
                                    return t
                                }

                                function tl() {
                                    var g = arguments.length;
                                    if (!g) return [];
                                    for (var I = IA(g - 1), e = arguments[0], n = g; n--;) I[n - 1] = arguments[n];
                                    return u(da(e) ? vt(e) : [e], an(I, 1))
                                }

                                function Cl(g, I, e) {
                                    var n = null == g ? 0 : g.length;
                                    return n ? (I = e || I === tg ? 1 : Gs(I), it(g, I < 0 ? 0 : I, n)) : []
                                }

                                function ll(g, I, e) {
                                    var n = null == g ? 0 : g.length;
                                    return n ? (I = e || I === tg ? 1 : Gs(I), I = n - I, it(g, 0, I < 0 ? 0 : I)) : []
                                }

                                function il(g, I) {
                                    return g && g.length ? bt(g, GC(I, 3), !0, !0) : []
                                }

                                function sl(g, I) {
                                    return g && g.length ? bt(g, GC(I, 3), !0) : []
                                }

                                function Bl(g, I, e, n) {
                                    var t = null == g ? 0 : g.length;
                                    return t ? (e && "number" != typeof e && SC(g, I, e) && (e = 0, n = t), An(g, I, e, n)) : []
                                }

                                function Al(g, I, e) {
                                    var n = null == g ? 0 : g.length;
                                    if (!n) return -1;
                                    var t = null == e ? 0 : Gs(e);
                                    return t < 0 && (t = DA(n + t, 0)), Z(g, GC(I, 3), t)
                                }

                                function Ql(g, I, e) {
                                    var n = null == g ? 0 : g.length;
                                    if (!n) return -1;
                                    var t = n - 1;
                                    return e !== tg && (t = Gs(e), t = e < 0 ? DA(n + t, 0) : wA(t, n - 1)), Z(g, GC(I, 3), t, !0)
                                }

                                function al(g) {
                                    return (null == g ? 0 : g.length) ? an(g, 1) : []
                                }

                                function cl(g) {
                                    return (null == g ? 0 : g.length) ? an(g, Ng) : []
                                }

                                function Fl(g, I) {
                                    return (null == g ? 0 : g.length) ? (I = I === tg ? 1 : Gs(I), an(g, I)) : []
                                }

                                function dl(g) {
                                    for (var I = -1, e = null == g ? 0 : g.length, n = {}; ++I < e;) {
                                        var t = g[I];
                                        n[t[0]] = t[1]
                                    }
                                    return n
                                }

                                function ul(g) {
                                    return g && g.length ? g[0] : tg
                                }

                                function bl(g, I, e) {
                                    var n = null == g ? 0 : g.length;
                                    if (!n) return -1;
                                    var t = null == e ? 0 : Gs(e);
                                    return t < 0 && (t = DA(n + t, 0)), V(g, I, t)
                                }

                                function ol(g) {
                                    return (null == g ? 0 : g.length) ? it(g, 0, -1) : []
                                }

                                function Ul(g, I) {
                                    return null == g ? "" : TA.call(g, I)
                                }

                                function rl(g) {
                                    var I = null == g ? 0 : g.length;
                                    return I ? g[I - 1] : tg
                                }

                                function Gl(g, I, e) {
                                    var n = null == g ? 0 : g.length;
                                    if (!n) return -1;
                                    var t = n;
                                    return e !== tg && (t = Gs(e), t = t < 0 ? DA(n + t, 0) : wA(t, n - 1)), I === I ? q(g, I, t) : Z(g, h, t, !0)
                                }

                                function ml(g, I) {
                                    return g && g.length ? On(g, Gs(I)) : tg
                                }

                                function Zl(g, I) {
                                    return g && g.length && I && I.length ? _n(g, I) : g
                                }

                                function Vl(g, I, e) {
                                    return g && g.length && I && I.length ? _n(g, I, GC(e, 2)) : g
                                }

                                function Wl(g, I, e) {
                                    return g && g.length && I && I.length ? _n(g, I, tg, e) : g
                                }

                                function hl(g, I) {
                                    var e = [];
                                    if (!g || !g.length) return e;
                                    var n = -1,
                                        t = [],
                                        C = g.length;
                                    for (I = GC(I, 3); ++n < C;) {
                                        var l = g[n];
                                        I(l, n, g) && (e.push(l), t.push(n))
                                    }
                                    return qn(g, t), e
                                }

                                function xl(g) {
                                    return null == g ? g : PA.call(g)
                                }

                                function yl(g, I, e) {
                                    var n = null == g ? 0 : g.length;
                                    return n ? (e && "number" != typeof e && SC(g, I, e) ? (I = 0, e = n) : (I = null == I ? 0 : Gs(I), e = e === tg ? n : Gs(e)), it(g, I, e)) : []
                                }

                                function pl(g, I) {
                                    return Bt(g, I)
                                }

                                function Rl(g, I, e) {
                                    return At(g, I, GC(e, 2))
                                }

                                function Xl(g, I) {
                                    var e = null == g ? 0 : g.length;
                                    if (e) {
                                        var n = Bt(g, I);
                                        if (n < e && Di(g[n], I)) return n
                                    }
                                    return -1
                                }

                                function Nl(g, I) {
                                    return Bt(g, I, !0)
                                }

                                function Ll(g, I, e) {
                                    return At(g, I, GC(e, 2), !0)
                                }

                                function El(g, I) {
                                    if (null == g ? 0 : g.length) {
                                        var e = Bt(g, I, !0) - 1;
                                        if (Di(g[e], I)) return e
                                    }
                                    return -1
                                }

                                function Sl(g) {
                                    return g && g.length ? Qt(g) : []
                                }

                                function Yl(g, I) {
                                    return g && g.length ? Qt(g, GC(I, 2)) : []
                                }

                                function vl(g) {
                                    var I = null == g ? 0 : g.length;
                                    return I ? it(g, 1, I) : []
                                }

                                function Jl(g, I, e) {
                                    return g && g.length ? (I = e || I === tg ? 1 : Gs(I), it(g, 0, I < 0 ? 0 : I)) : []
                                }

                                function Hl(g, I, e) {
                                    var n = null == g ? 0 : g.length;
                                    return n ? (I = e || I === tg ? 1 : Gs(I), I = n - I, it(g, I < 0 ? 0 : I, n)) : []
                                }

                                function kl(g, I) {
                                    return g && g.length ? bt(g, GC(I, 3), !1, !0) : []
                                }

                                function fl(g, I) {
                                    return g && g.length ? bt(g, GC(I, 3)) : []
                                }

                                function Tl(g) {
                                    return g && g.length ? Ft(g) : []
                                }

                                function zl(g, I) {
                                    return g && g.length ? Ft(g, GC(I, 2)) : []
                                }

                                function Dl(g, I) {
                                    return I = "function" == typeof I ? I : tg, g && g.length ? Ft(g, tg, I) : []
                                }

                                function wl(g) {
                                    if (!g || !g.length) return [];
                                    var I = 0;
                                    return g = a(g, function(g) {
                                        if (Oi(g)) return I = DA(g.length, I), !0
                                    }), L(I, function(I) {
                                        return d(g, y(I))
                                    })
                                }

                                function Ol(g, I) {
                                    if (!g || !g.length) return [];
                                    var e = wl(g);
                                    return null == I ? e : d(e, function(g) {
                                        return i(I, tg, g)
                                    })
                                }

                                function Ml(g, I) {
                                    return rt(g || [], I || [], De)
                                }

                                function jl(g, I) {
                                    return rt(g || [], I || [], Ct)
                                }

                                function Pl(g) {
                                    var I = e(g);
                                    return I.__chain__ = !0, I
                                }

                                function Kl(g, I) {
                                    return I(g), g
                                }

                                function _l(g, I) {
                                    return I(g)
                                }

                                function ql() {
                                    return Pl(this)
                                }

                                function $l() {
                                    return new t(this.value(), this.__chain__)
                                }

                                function gi() {
                                    this.__values__ === tg && (this.__values__ = Us(this.value()));
                                    var g = this.__index__ >= this.__values__.length;
                                    return {
                                        done: g,
                                        value: g ? tg : this.__values__[this.__index__++]
                                    }
                                }

                                function Ii() {
                                    return this
                                }

                                function ei(g) {
                                    for (var I, e = this; e instanceof n;) {
                                        var t = Il(e);
                                        t.__index__ = 0, t.__values__ = tg, I ? C.__wrapped__ = t : I = t;
                                        var C = t;
                                        e = e.__wrapped__
                                    }
                                    return C.__wrapped__ = g, I
                                }

                                function ni() {
                                    var g = this.__wrapped__;
                                    if (g instanceof r) {
                                        var I = g;
                                        return this.__actions__.length && (I = new r(this)), I = I.reverse(), I.__actions__.push({
                                            func: _l,
                                            args: [xl],
                                            thisArg: tg
                                        }), new t(I, this.__chain__)
                                    }
                                    return this.thru(xl)
                                }

                                function ti() {
                                    return ot(this.__wrapped__, this.__actions__)
                                }

                                function Ci(g, I, e) {
                                    var n = da(g) ? Q : sn;
                                    return e && SC(g, I, e) && (I = tg), n(g, GC(I, 3))
                                }

                                function li(g, I) {
                                    return (da(g) ? a : Qn)(g, GC(I, 3))
                                }

                                function ii(g, I) {
                                    return an(ci(g, I), 1)
                                }

                                function si(g, I) {
                                    return an(ci(g, I), Ng)
                                }

                                function Bi(g, I, e) {
                                    return e = e === tg ? 1 : Gs(e), an(ci(g, I), e)
                                }

                                function Ai(g, I) {
                                    return (da(g) ? B : cQ)(g, GC(I, 3))
                                }

                                function Qi(g, I) {
                                    return (da(g) ? A : FQ)(g, GC(I, 3))
                                }

                                function ai(g, I, e, n) {
                                    g = wi(g) ? g : qs(g), e = e && !n ? Gs(e) : 0;
                                    var t = g.length;
                                    return e < 0 && (e = DA(t + e, 0)), Fs(g) ? e <= t && g.indexOf(I, e) > -1 : !!t && V(g, I, e) > -1
                                }

                                function ci(g, I) {
                                    return (da(g) ? d : fn)(g, GC(I, 3))
                                }

                                function Fi(g, I, e, n) {
                                    return null == g ? [] : (da(I) || (I = null == I ? [] : [I]), e = n ? tg : e, da(e) || (e = null == e ? [] : [e]), Mn(g, I, e))
                                }

                                function di(g, I, e) {
                                    var n = da(g) ? b : R,
                                        t = arguments.length < 3;
                                    return n(g, GC(I, 4), e, t, cQ)
                                }

                                function ui(g, I, e) {
                                    var n = da(g) ? o : R,
                                        t = arguments.length < 3;
                                    return n(g, GC(I, 4), e, t, FQ)
                                }

                                function bi(g, I) {
                                    return (da(g) ? a : Qn)(g, Xi(GC(I, 3)))
                                }

                                function oi(g) {
                                    return (da(g) ? Le : nt)(g)
                                }

                                function Ui(g, I, e) {
                                    return I = (e ? SC(g, I, e) : I === tg) ? 1 : Gs(I), (da(g) ? Ee : tt)(g, I)
                                }

                                function ri(g) {
                                    return (da(g) ? Ye : lt)(g)
                                }

                                function Gi(g) {
                                    if (null == g) return 0;
                                    if (wi(g)) return Fs(g) ? $(g) : g.length;
                                    var I = WQ(g);
                                    return I == Pg || I == II ? g.size : Jn(g).length
                                }

                                function mi(g, I, e) {
                                    var n = da(g) ? U : st;
                                    return e && SC(g, I, e) && (I = tg), n(g, GC(I, 3))
                                }

                                function Zi(g, I) {
                                    if ("function" != typeof I) throw new BA(ig);
                                    return g = Gs(g),
                                        function() {
                                            if (--g < 1) return I.apply(this, arguments)
                                        }
                                }

                                function Vi(g, I, e) {
                                    return I = e ? tg : I, I = g && null == I ? g.length : I, BC(g, Zg, tg, tg, tg, tg, I)
                                }

                                function Wi(g, I) {
                                    var e;
                                    if ("function" != typeof I) throw new BA(ig);
                                    return g = Gs(g),
                                        function() {
                                            return --g > 0 && (e = I.apply(this, arguments)), g <= 1 && (I = tg), e
                                        }
                                }

                                function hi(g, I, e) {
                                    I = e ? tg : I;
                                    var n = BC(g, Ug, tg, tg, tg, tg, tg, I);
                                    return n.placeholder = hi.placeholder, n
                                }

                                function xi(g, I, e) {
                                    I = e ? tg : I;
                                    var n = BC(g, rg, tg, tg, tg, tg, tg, I);
                                    return n.placeholder = xi.placeholder, n
                                }

                                function yi(g, I, e) {
                                    function n(I) {
                                        var e = a,
                                            n = c;
                                        return a = c = tg, o = I, d = g.apply(n, e)
                                    }

                                    function t(g) {
                                        return o = g, u = yQ(i, I), U ? n(g) : d
                                    }

                                    function C(g) {
                                        var e = g - b,
                                            n = g - o,
                                            t = I - e;
                                        return r ? wA(t, F - n) : t
                                    }

                                    function l(g) {
                                        var e = g - b,
                                            n = g - o;
                                        return b === tg || e >= I || e < 0 || r && n >= F
                                    }

                                    function i() {
                                        var g = na();
                                        if (l(g)) return s(g);
                                        u = yQ(i, C(g))
                                    }

                                    function s(g) {
                                        return u = tg, G && a ? n(g) : (a = c = tg, d)
                                    }

                                    function B() {
                                        u !== tg && rQ(u), o = 0, a = b = c = u = tg
                                    }

                                    function A() {
                                        return u === tg ? d : s(na())
                                    }

                                    function Q() {
                                        var g = na(),
                                            e = l(g);
                                        if (a = arguments, c = this, b = g, e) {
                                            if (u === tg) return t(b);
                                            if (r) return u = yQ(i, I), n(b)
                                        }
                                        return u === tg && (u = yQ(i, I)), d
                                    }
                                    var a, c, F, d, u, b, o = 0,
                                        U = !1,
                                        r = !1,
                                        G = !0;
                                    if ("function" != typeof g) throw new BA(ig);
                                    return I = Zs(I) || 0, ns(e) && (U = !!e.leading, r = "maxWait" in e, F = r ? DA(Zs(e.maxWait) || 0, I) : F, G = "trailing" in e ? !!e.trailing : G), Q.cancel = B, Q.flush = A, Q
                                }

                                function pi(g) {
                                    return BC(g, Wg)
                                }

                                function Ri(g, I) {
                                    if ("function" != typeof g || null != I && "function" != typeof I) throw new BA(ig);
                                    var e = function() {
                                        var n = arguments,
                                            t = I ? I.apply(this, n) : n[0],
                                            C = e.cache;
                                        if (C.has(t)) return C.get(t);
                                        var l = g.apply(this, n);
                                        return e.cache = C.set(t, l) || C, l
                                    };
                                    return e.cache = new(Ri.Cache || se), e
                                }

                                function Xi(g) {
                                    if ("function" != typeof g) throw new BA(ig);
                                    return function() {
                                        var I = arguments;
                                        switch (I.length) {
                                            case 0:
                                                return !g.call(this);
                                            case 1:
                                                return !g.call(this, I[0]);
                                            case 2:
                                                return !g.call(this, I[0], I[1]);
                                            case 3:
                                                return !g.call(this, I[0], I[1], I[2])
                                        }
                                        return !g.apply(this, I)
                                    }
                                }

                                function Ni(g) {
                                    return Wi(2, g)
                                }

                                function Li(g, I) {
                                    if ("function" != typeof g) throw new BA(ig);
                                    return I = I === tg ? I : Gs(I), et(g, I)
                                }

                                function Ei(g, I) {
                                    if ("function" != typeof g) throw new BA(ig);
                                    return I = null == I ? 0 : DA(Gs(I), 0), et(function(e) {
                                        var n = e[I],
                                            t = Vt(e, 0, I);
                                        return n && u(t, n), i(g, this, t)
                                    })
                                }

                                function Si(g, I, e) {
                                    var n = !0,
                                        t = !0;
                                    if ("function" != typeof g) throw new BA(ig);
                                    return ns(e) && (n = "leading" in e ? !!e.leading : n, t = "trailing" in e ? !!e.trailing : t), yi(g, I, {
                                        leading: n,
                                        maxWait: I,
                                        trailing: t
                                    })
                                }

                                function Yi(g) {
                                    return Vi(g, 1)
                                }

                                function vi(g, I) {
                                    return Ba(mt(I), g)
                                }

                                function Ji() {
                                    if (!arguments.length) return [];
                                    var g = arguments[0];
                                    return da(g) ? g : [g]
                                }

                                function Hi(g) {
                                    return en(g, cg)
                                }

                                function ki(g, I) {
                                    return I = "function" == typeof I ? I : tg, en(g, cg, I)
                                }

                                function fi(g) {
                                    return en(g, Qg | cg)
                                }

                                function Ti(g, I) {
                                    return I = "function" == typeof I ? I : tg, en(g, Qg | cg, I)
                                }

                                function zi(g, I) {
                                    return null == I || tn(g, I, Hs(I))
                                }

                                function Di(g, I) {
                                    return g === I || g !== g && I !== I
                                }

                                function wi(g) {
                                    return null != g && es(g.length) && !gs(g)
                                }

                                function Oi(g) {
                                    return ts(g) && wi(g)
                                }

                                function Mi(g) {
                                    return !0 === g || !1 === g || ts(g) && on(g) == zg
                                }

                                function ji(g) {
                                    return ts(g) && 1 === g.nodeType && !as(g)
                                }

                                function Pi(g) {
                                    if (null == g) return !0;
                                    if (wi(g) && (da(g) || "string" == typeof g || "function" == typeof g.splice || ba(g) || ma(g) || Fa(g))) return !g.length;
                                    var I = WQ(g);
                                    if (I == Pg || I == II) return !g.size;
                                    if (kC(g)) return !Jn(g).length;
                                    for (var e in g)
                                        if (dA.call(g, e)) return !1;
                                    return !0
                                }

                                function Ki(g, I) {
                                    return pn(g, I)
                                }

                                function _i(g, I, e) {
                                    e = "function" == typeof e ? e : tg;
                                    var n = e ? e(g, I) : tg;
                                    return n === tg ? pn(g, I, tg, e) : !!n
                                }

                                function qi(g) {
                                    if (!ts(g)) return !1;
                                    var I = on(g);
                                    return I == Og || I == wg || "string" == typeof g.message && "string" == typeof g.name && !as(g)
                                }

                                function $i(g) {
                                    return "number" == typeof g && fA(g)
                                }

                                function gs(g) {
                                    if (!ns(g)) return !1;
                                    var I = on(g);
                                    return I == Mg || I == jg || I == Tg || I == $g
                                }

                                function Is(g) {
                                    return "number" == typeof g && g == Gs(g)
                                }

                                function es(g) {
                                    return "number" == typeof g && g > -1 && g % 1 == 0 && g <= Lg
                                }

                                function ns(g) {
                                    var I = typeof g;
                                    return null != g && ("object" == I || "function" == I)
                                }

                                function ts(g) {
                                    return null != g && "object" == typeof g
                                }

                                function Cs(g, I) {
                                    return g === I || Nn(g, I, ZC(I))
                                }

                                function ls(g, I, e) {
                                    return e = "function" == typeof e ? e : tg, Nn(g, I, ZC(I), e)
                                }

                                function is(g) {
                                    return Qs(g) && g != +g
                                }

                                function ss(g) {
                                    if (hQ(g)) throw new nA(lg);
                                    return Ln(g)
                                }

                                function Bs(g) {
                                    return null === g
                                }

                                function As(g) {
                                    return null == g
                                }

                                function Qs(g) {
                                    return "number" == typeof g || ts(g) && on(g) == Kg
                                }

                                function as(g) {
                                    if (!ts(g) || on(g) != qg) return !1;
                                    var I = hA(g);
                                    if (null === I) return !0;
                                    var e = dA.call(I, "constructor") && I.constructor;
                                    return "function" == typeof e && e instanceof e && FA.call(e) == UA
                                }

                                function cs(g) {
                                    return Is(g) && g >= -Lg && g <= Lg
                                }

                                function Fs(g) {
                                    return "string" == typeof g || !da(g) && ts(g) && on(g) == eI
                                }

                                function ds(g) {
                                    return "symbol" == typeof g || ts(g) && on(g) == nI
                                }

                                function us(g) {
                                    return g === tg
                                }

                                function bs(g) {
                                    return ts(g) && WQ(g) == CI
                                }

                                function os(g) {
                                    return ts(g) && on(g) == lI
                                }

                                function Us(g) {
                                    if (!g) return [];
                                    if (wi(g)) return Fs(g) ? gg(g) : vt(g);
                                    if (XA && g[XA]) return w(g[XA]());
                                    var I = WQ(g);
                                    return (I == Pg ? O : I == II ? P : qs)(g)
                                }

                                function rs(g) {
                                    if (!g) return 0 === g ? g : 0;
                                    if ((g = Zs(g)) === Ng || g === -Ng) {
                                        return (g < 0 ? -1 : 1) * Eg
                                    }
                                    return g === g ? g : 0
                                }

                                function Gs(g) {
                                    var I = rs(g),
                                        e = I % 1;
                                    return I === I ? e ? I - e : I : 0
                                }

                                function ms(g) {
                                    return g ? In(Gs(g), 0, Yg) : 0
                                }

                                function Zs(g) {
                                    if ("number" == typeof g) return g;
                                    if (ds(g)) return Sg;
                                    if (ns(g)) {
                                        var I = "function" == typeof g.valueOf ? g.valueOf() : g;
                                        g = ns(I) ? I + "" : I
                                    }
                                    if ("string" != typeof g) return 0 === g ? g : +g;
                                    g = g.replace(EI, "");
                                    var e = wI.test(g);
                                    return e || MI.test(g) ? pe(g.slice(2), e ? 2 : 8) : DI.test(g) ? Sg : +g
                                }

                                function Vs(g) {
                                    return Jt(g, ks(g))
                                }

                                function Ws(g) {
                                    return g ? In(Gs(g), -Lg, Lg) : 0 === g ? g : 0
                                }

                                function hs(g) {
                                    return null == g ? "" : ct(g)
                                }

                                function xs(g, I) {
                                    var e = aQ(g);
                                    return null == I ? e : _e(e, I)
                                }

                                function ys(g, I) {
                                    return m(g, GC(I, 3), cn)
                                }

                                function ps(g, I) {
                                    return m(g, GC(I, 3), Fn)
                                }

                                function Rs(g, I) {
                                    return null == g ? g : dQ(g, GC(I, 3), ks)
                                }

                                function Xs(g, I) {
                                    return null == g ? g : uQ(g, GC(I, 3), ks)
                                }

                                function Ns(g, I) {
                                    return g && cn(g, GC(I, 3))
                                }

                                function Ls(g, I) {
                                    return g && Fn(g, GC(I, 3))
                                }

                                function Es(g) {
                                    return null == g ? [] : dn(g, Hs(g))
                                }

                                function Ss(g) {
                                    return null == g ? [] : dn(g, ks(g))
                                }

                                function Ys(g, I, e) {
                                    var n = null == g ? tg : un(g, I);
                                    return n === tg ? e : n
                                }

                                function vs(g, I) {
                                    return null != g && yC(g, I, rn)
                                }

                                function Js(g, I) {
                                    return null != g && yC(g, I, Gn)
                                }

                                function Hs(g) {
                                    return wi(g) ? Xe(g) : Jn(g)
                                }

                                function ks(g) {
                                    return wi(g) ? Xe(g, !0) : Hn(g)
                                }

                                function fs(g, I) {
                                    var e = {};
                                    return I = GC(I, 3), cn(g, function(g, n, t) {
                                        $e(e, I(g, n, t), g)
                                    }), e
                                }

                                function Ts(g, I) {
                                    var e = {};
                                    return I = GC(I, 3), cn(g, function(g, n, t) {
                                        $e(e, n, I(g, n, t))
                                    }), e
                                }

                                function zs(g, I) {
                                    return Ds(g, Xi(GC(I)))
                                }

                                function Ds(g, I) {
                                    if (null == g) return {};
                                    var e = d(oC(g), function(g) {
                                        return [g]
                                    });
                                    return I = GC(I), Pn(g, e, function(g, e) {
                                        return I(g, e[0])
                                    })
                                }

                                function ws(g, I, e) {
                                    I = Zt(I, g);
                                    var n = -1,
                                        t = I.length;
                                    for (t || (t = 1, g = tg); ++n < t;) {
                                        var C = null == g ? tg : g[qC(I[n])];
                                        C === tg && (n = t, C = e), g = gs(C) ? C.call(g) : C
                                    }
                                    return g
                                }

                                function Os(g, I, e) {
                                    return null == g ? g : Ct(g, I, e)
                                }

                                function Ms(g, I, e, n) {
                                    return n = "function" == typeof n ? n : tg, null == g ? g : Ct(g, I, e, n)
                                }

                                function js(g, I, e) {
                                    var n = da(g),
                                        t = n || ba(g) || ma(g);
                                    if (I = GC(I, 4), null == e) {
                                        var C = g && g.constructor;
                                        e = t ? n ? new C : [] : ns(g) && gs(C) ? aQ(hA(g)) : {}
                                    }
                                    return (t ? B : cn)(g, function(g, n, t) {
                                        return I(e, g, n, t)
                                    }), e
                                }

                                function Ps(g, I) {
                                    return null == g || dt(g, I)
                                }

                                function Ks(g, I, e) {
                                    return null == g ? g : ut(g, I, mt(e))
                                }

                                function _s(g, I, e, n) {
                                    return n = "function" == typeof n ? n : tg, null == g ? g : ut(g, I, mt(e), n)
                                }

                                function qs(g) {
                                    return null == g ? [] : Y(g, Hs(g))
                                }

                                function $s(g) {
                                    return null == g ? [] : Y(g, ks(g))
                                }

                                function gB(g, I, e) {
                                    return e === tg && (e = I, I = tg), e !== tg && (e = Zs(e), e = e === e ? e : 0), I !== tg && (I = Zs(I), I = I === I ? I : 0), In(Zs(g), I, e)
                                }

                                function IB(g, I, e) {
                                    return I = rs(I), e === tg ? (e = I, I = 0) : e = rs(e), g = Zs(g), mn(g, I, e)
                                }

                                function eB(g, I, e) {
                                    if (e && "boolean" != typeof e && SC(g, I, e) && (I = e = tg), e === tg && ("boolean" == typeof I ? (e = I, I = tg) : "boolean" == typeof g && (e = g, g = tg)), g === tg && I === tg ? (g = 0, I = 1) : (g = rs(g), I === tg ? (I = g, g = 0) : I = rs(I)), g > I) {
                                        var n = g;
                                        g = I, I = n
                                    }
                                    if (e || g % 1 || I % 1) {
                                        var t = jA();
                                        return wA(g + t * (I - g + ye("1e-" + ((t + "").length - 1))), I)
                                    }
                                    return $n(g, I)
                                }

                                function nB(g) {
                                    return ja(hs(g).toLowerCase())
                                }

                                function tB(g) {
                                    return (g = hs(g)) && g.replace(PI, we).replace(de, "")
                                }

                                function CB(g, I, e) {
                                    g = hs(g), I = ct(I);
                                    var n = g.length;
                                    e = e === tg ? n : In(Gs(e), 0, n);
                                    var t = e;
                                    return (e -= I.length) >= 0 && g.slice(e, t) == I
                                }

                                function lB(g) {
                                    return g = hs(g), g && VI.test(g) ? g.replace(mI, Oe) : g
                                }

                                function iB(g) {
                                    return g = hs(g), g && LI.test(g) ? g.replace(NI, "\\$&") : g
                                }

                                function sB(g, I, e) {
                                    g = hs(g), I = Gs(I);
                                    var n = I ? $(g) : 0;
                                    if (!I || n >= I) return g;
                                    var t = (I - n) / 2;
                                    return eC(JA(t), e) + g + eC(vA(t), e)
                                }

                                function BB(g, I, e) {
                                    g = hs(g), I = Gs(I);
                                    var n = I ? $(g) : 0;
                                    return I && n < I ? g + eC(I - n, e) : g
                                }

                                function AB(g, I, e) {
                                    g = hs(g), I = Gs(I);
                                    var n = I ? $(g) : 0;
                                    return I && n < I ? eC(I - n, e) + g : g
                                }

                                function QB(g, I, e) {
                                    return e || null == I ? I = 0 : I && (I = +I), MA(hs(g).replace(SI, ""), I || 0)
                                }

                                function aB(g, I, e) {
                                    return I = (e ? SC(g, I, e) : I === tg) ? 1 : Gs(I), It(hs(g), I)
                                }

                                function cB() {
                                    var g = arguments,
                                        I = hs(g[0]);
                                    return g.length < 3 ? I : I.replace(g[1], g[2])
                                }

                                function FB(g, I, e) {
                                    return e && "number" != typeof e && SC(g, I, e) && (I = e = tg), (e = e === tg ? Yg : e >>> 0) ? (g = hs(g), g && ("string" == typeof I || null != I && !ra(I)) && !(I = ct(I)) && z(g) ? Vt(gg(g), 0, e) : g.split(I, e)) : []
                                }

                                function dB(g, I, e) {
                                    return g = hs(g), e = null == e ? 0 : In(Gs(e), 0, g.length), I = ct(I), g.slice(e, e + I.length) == I
                                }

                                function uB(g, I, n) {
                                    var t = e.templateSettings;
                                    n && SC(g, I, n) && (I = tg), g = hs(g), I = xa({}, I, t, AC);
                                    var C, l, i = xa({}, I.imports, t.imports, AC),
                                        s = Hs(i),
                                        B = Y(i, s),
                                        A = 0,
                                        Q = I.interpolate || KI,
                                        a = "__p += '",
                                        c = iA((I.escape || KI).source + "|" + Q.source + "|" + (Q === xI ? TI : KI).source + "|" + (I.evaluate || KI).source + "|$", "g"),
                                        F = "//# sourceURL=" + ("sourceURL" in I ? I.sourceURL : "lodash.templateSources[" + ++Ge + "]") + "\n";
                                    g.replace(c, function(I, e, n, t, i, s) {
                                        return n || (n = t), a += g.slice(A, s).replace(_I, f), e && (C = !0, a += "' +\n__e(" + e + ") +\n'"), i && (l = !0, a += "';\n" + i + ";\n__p += '"), n && (a += "' +\n((__t = (" + n + ")) == null ? '' : __t) +\n'"), A = s + I.length, I
                                    }), a += "';\n";
                                    var d = I.variable;
                                    d || (a = "with (obj) {\n" + a + "\n}\n"), a = (l ? a.replace(oI, "") : a).replace(UI, "$1").replace(rI, "$1;"), a = "function(" + (d || "obj") + ") {\n" + (d ? "" : "obj || (obj = {});\n") + "var __t, __p = ''" + (C ? ", __e = _.escape" : "") + (l ? ", __j = Array.prototype.join;\nfunction print() { __p += __j.call(arguments, '') }\n" : ";\n") + a + "return __p\n}";
                                    var u = Pa(function() {
                                        return tA(s, F + "return " + a).apply(tg, B)
                                    });
                                    if (u.source = a, qi(u)) throw u;
                                    return u
                                }

                                function bB(g) {
                                    return hs(g).toLowerCase()
                                }

                                function oB(g) {
                                    return hs(g).toUpperCase()
                                }

                                function UB(g, I, e) {
                                    if ((g = hs(g)) && (e || I === tg)) return g.replace(EI, "");
                                    if (!g || !(I = ct(I))) return g;
                                    var n = gg(g),
                                        t = gg(I);
                                    return Vt(n, J(n, t), H(n, t) + 1).join("")
                                }

                                function rB(g, I, e) {
                                    if ((g = hs(g)) && (e || I === tg)) return g.replace(YI, "");
                                    if (!g || !(I = ct(I))) return g;
                                    var n = gg(g);
                                    return Vt(n, 0, H(n, gg(I)) + 1).join("")
                                }

                                function GB(g, I, e) {
                                    if ((g = hs(g)) && (e || I === tg)) return g.replace(SI, "");
                                    if (!g || !(I = ct(I))) return g;
                                    var n = gg(g);
                                    return Vt(n, J(n, gg(I))).join("")
                                }

                                function mB(g, I) {
                                    var e = hg,
                                        n = xg;
                                    if (ns(I)) {
                                        var t = "separator" in I ? I.separator : t;
                                        e = "length" in I ? Gs(I.length) : e, n = "omission" in I ? ct(I.omission) : n
                                    }
                                    g = hs(g);
                                    var C = g.length;
                                    if (z(g)) {
                                        var l = gg(g);
                                        C = l.length
                                    }
                                    if (e >= C) return g;
                                    var i = e - $(n);
                                    if (i < 1) return n;
                                    var s = l ? Vt(l, 0, i).join("") : g.slice(0, i);
                                    if (t === tg) return s + n;
                                    if (l && (i += s.length - i), ra(t)) {
                                        if (g.slice(i).search(t)) {
                                            var B, A = s;
                                            for (t.global || (t = iA(t.source, hs(zI.exec(t)) + "g")), t.lastIndex = 0; B = t.exec(A);) var Q = B.index;
                                            s = s.slice(0, Q === tg ? i : Q)
                                        }
                                    } else if (g.indexOf(ct(t), i) != i) {
                                        var a = s.lastIndexOf(t);
                                        a > -1 && (s = s.slice(0, a))
                                    }
                                    return s + n
                                }

                                function ZB(g) {
                                    return g = hs(g), g && ZI.test(g) ? g.replace(GI, Me) : g
                                }

                                function VB(g, I, e) {
                                    return g = hs(g), I = e ? tg : I, I === tg ? D(g) ? ng(g) : G(g) : g.match(I) || []
                                }

                                function WB(g) {
                                    var I = null == g ? 0 : g.length,
                                        e = GC();
                                    return g = I ? d(g, function(g) {
                                        if ("function" != typeof g[1]) throw new BA(ig);
                                        return [e(g[0]), g[1]]
                                    }) : [], et(function(e) {
                                        for (var n = -1; ++n < I;) {
                                            var t = g[n];
                                            if (i(t[0], this, e)) return i(t[1], this, e)
                                        }
                                    })
                                }

                                function hB(g) {
                                    return nn(en(g, Qg))
                                }

                                function xB(g) {
                                    return function() {
                                        return g
                                    }
                                }

                                function yB(g, I) {
                                    return null == g || g !== g ? I : g
                                }

                                function pB(g) {
                                    return g
                                }

                                function RB(g) {
                                    return vn("function" == typeof g ? g : en(g, Qg))
                                }

                                function XB(g) {
                                    return Tn(en(g, Qg))
                                }

                                function NB(g, I) {
                                    return zn(g, en(I, Qg))
                                }

                                function LB(g, I, e) {
                                    var n = Hs(I),
                                        t = dn(I, n);
                                    null != e || ns(I) && (t.length || !n.length) || (e = I, I = g, g = this, t = dn(I, Hs(I)));
                                    var C = !(ns(e) && "chain" in e && !e.chain),
                                        l = gs(g);
                                    return B(t, function(e) {
                                        var n = I[e];
                                        g[e] = n, l && (g.prototype[e] = function() {
                                            var I = this.__chain__;
                                            if (C || I) {
                                                var e = g(this.__wrapped__);
                                                return (e.__actions__ = vt(this.__actions__)).push({
                                                    func: n,
                                                    args: arguments,
                                                    thisArg: g
                                                }), e.__chain__ = I, e
                                            }
                                            return n.apply(g, u([this.value()], arguments))
                                        })
                                    }), g
                                }

                                function EB() {
                                    return Ne._ === this && (Ne._ = rA), this
                                }

                                function SB() {}

                                function YB(g) {
                                    return g = Gs(g), et(function(I) {
                                        return On(I, g)
                                    })
                                }

                                function vB(g) {
                                    return YC(g) ? y(qC(g)) : Kn(g)
                                }

                                function JB(g) {
                                    return function(I) {
                                        return null == g ? tg : un(g, I)
                                    }
                                }

                                function HB() {
                                    return []
                                }

                                function kB() {
                                    return !1
                                }

                                function fB() {
                                    return {}
                                }

                                function TB() {
                                    return ""
                                }

                                function zB() {
                                    return !0
                                }

                                function DB(g, I) {
                                    if ((g = Gs(g)) < 1 || g > Lg) return [];
                                    var e = Yg,
                                        n = wA(g, Yg);
                                    I = GC(I), g -= Yg;
                                    for (var t = L(n, I); ++e < g;) I(e);
                                    return t
                                }

                                function wB(g) {
                                    return da(g) ? d(g, qC) : ds(g) ? [g] : vt(RQ(hs(g)))
                                }

                                function OB(g) {
                                    var I = ++uA;
                                    return hs(g) + I
                                }

                                function MB(g) {
                                    return g && g.length ? Bn(g, pB, Un) : tg
                                }

                                function jB(g, I) {
                                    return g && g.length ? Bn(g, GC(I, 2), Un) : tg
                                }

                                function PB(g) {
                                    return x(g, pB)
                                }

                                function KB(g, I) {
                                    return x(g, GC(I, 2))
                                }

                                function _B(g) {
                                    return g && g.length ? Bn(g, pB, kn) : tg
                                }

                                function qB(g, I) {
                                    return g && g.length ? Bn(g, GC(I, 2), kn) : tg
                                }

                                function $B(g) {
                                    return g && g.length ? N(g, pB) : 0
                                }

                                function gA(g, I) {
                                    return g && g.length ? N(g, GC(I, 2)) : 0
                                }
                                I = null == I ? Ne : je.defaults(Ne.Object(), I, je.pick(Ne, re));
                                var IA = I.Array,
                                    eA = I.Date,
                                    nA = I.Error,
                                    tA = I.Function,
                                    CA = I.Math,
                                    lA = I.Object,
                                    iA = I.RegExp,
                                    sA = I.String,
                                    BA = I.TypeError,
                                    AA = IA.prototype,
                                    QA = tA.prototype,
                                    aA = lA.prototype,
                                    cA = I["__core-js_shared__"],
                                    FA = QA.toString,
                                    dA = aA.hasOwnProperty,
                                    uA = 0,
                                    bA = function() {
                                        var g = /[^.]+$/.exec(cA && cA.keys && cA.keys.IE_PROTO || "");
                                        return g ? "Symbol(src)_1." + g : ""
                                    }(),
                                    oA = aA.toString,
                                    UA = FA.call(lA),
                                    rA = Ne._,
                                    GA = iA("^" + FA.call(dA).replace(NI, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$"),
                                    mA = Se ? I.Buffer : tg,
                                    ZA = I.Symbol,
                                    VA = I.Uint8Array,
                                    WA = mA ? mA.allocUnsafe : tg,
                                    hA = M(lA.getPrototypeOf, lA),
                                    xA = lA.create,
                                    yA = aA.propertyIsEnumerable,
                                    pA = AA.splice,
                                    RA = ZA ? ZA.isConcatSpreadable : tg,
                                    XA = ZA ? ZA.iterator : tg,
                                    NA = ZA ? ZA.toStringTag : tg,
                                    LA = function() {
                                        try {
                                            var g = VC(lA, "defineProperty");
                                            return g({}, "", {}), g
                                        } catch (g) {}
                                    }(),
                                    EA = I.clearTimeout !== Ne.clearTimeout && I.clearTimeout,
                                    SA = eA && eA.now !== Ne.Date.now && eA.now,
                                    YA = I.setTimeout !== Ne.setTimeout && I.setTimeout,
                                    vA = CA.ceil,
                                    JA = CA.floor,
                                    HA = lA.getOwnPropertySymbols,
                                    kA = mA ? mA.isBuffer : tg,
                                    fA = I.isFinite,
                                    TA = AA.join,
                                    zA = M(lA.keys, lA),
                                    DA = CA.max,
                                    wA = CA.min,
                                    OA = eA.now,
                                    MA = I.parseInt,
                                    jA = CA.random,
                                    PA = AA.reverse,
                                    KA = VC(I, "DataView"),
                                    _A = VC(I, "Map"),
                                    qA = VC(I, "Promise"),
                                    $A = VC(I, "Set"),
                                    gQ = VC(I, "WeakMap"),
                                    IQ = VC(lA, "create"),
                                    eQ = gQ && new gQ,
                                    nQ = {},
                                    tQ = $C(KA),
                                    CQ = $C(_A),
                                    lQ = $C(qA),
                                    iQ = $C($A),
                                    sQ = $C(gQ),
                                    BQ = ZA ? ZA.prototype : tg,
                                    AQ = BQ ? BQ.valueOf : tg,
                                    QQ = BQ ? BQ.toString : tg,
                                    aQ = function() {
                                        function g() {}
                                        return function(I) {
                                            if (!ns(I)) return {};
                                            if (xA) return xA(I);
                                            g.prototype = I;
                                            var e = new g;
                                            return g.prototype = tg, e
                                        }
                                    }();
                                e.templateSettings = {
                                    escape: WI,
                                    evaluate: hI,
                                    interpolate: xI,
                                    variable: "",
                                    imports: {
                                        _: e
                                    }
                                }, e.prototype = n.prototype, e.prototype.constructor = e, t.prototype = aQ(n.prototype), t.prototype.constructor = t, r.prototype = aQ(n.prototype), r.prototype.constructor = r, eg.prototype.clear = kI, eg.prototype.delete = qI, eg.prototype.get = $I, eg.prototype.has = ge, eg.prototype.set = Ie, ee.prototype.clear = ne, ee.prototype.delete = te, ee.prototype.get = Ce, ee.prototype.has = le, ee.prototype.set = ie, se.prototype.clear = Be, se.prototype.delete = Ae, se.prototype.get = Qe, se.prototype.has = ae, se.prototype.set = ce, ue.prototype.add = ue.prototype.push = be, ue.prototype.has = oe, Ue.prototype.clear = Ve, Ue.prototype.delete = We, Ue.prototype.get = he, Ue.prototype.has = xe, Ue.prototype.set = Re;
                                var cQ = zt(cn),
                                    FQ = zt(Fn, !0),
                                    dQ = Dt(),
                                    uQ = Dt(!0),
                                    bQ = eQ ? function(g, I) {
                                        return eQ.set(g, I), g
                                    } : pB,
                                    oQ = LA ? function(g, I) {
                                        return LA(g, "toString", {
                                            configurable: !0,
                                            enumerable: !1,
                                            value: xB(I),
                                            writable: !0
                                        })
                                    } : pB,
                                    UQ = et,
                                    rQ = EA || function(g) {
                                        return Ne.clearTimeout(g)
                                    },
                                    GQ = $A && 1 / P(new $A([, -0]))[1] == Ng ? function(g) {
                                        return new $A(g)
                                    } : SB,
                                    mQ = eQ ? function(g) {
                                        return eQ.get(g)
                                    } : SB,
                                    ZQ = HA ? function(g) {
                                        return null == g ? [] : (g = lA(g), a(HA(g), function(I) {
                                            return yA.call(g, I)
                                        }))
                                    } : HB,
                                    VQ = HA ? function(g) {
                                        for (var I = []; g;) u(I, ZQ(g)), g = hA(g);
                                        return I
                                    } : HB,
                                    WQ = on;
                                (KA && WQ(new KA(new ArrayBuffer(1))) != sI || _A && WQ(new _A) != Pg || qA && "[object Promise]" != WQ(qA.resolve()) || $A && WQ(new $A) != II || gQ && WQ(new gQ) != CI) && (WQ = function(g) {
                                    var I = on(g),
                                        e = I == qg ? g.constructor : tg,
                                        n = e ? $C(e) : "";
                                    if (n) switch (n) {
                                        case tQ:
                                            return sI;
                                        case CQ:
                                            return Pg;
                                        case lQ:
                                            return "[object Promise]";
                                        case iQ:
                                            return II;
                                        case sQ:
                                            return CI
                                    }
                                    return I
                                });
                                var hQ = cA ? gs : kB,
                                    xQ = KC(bQ),
                                    yQ = YA || function(g, I) {
                                        return Ne.setTimeout(g, I)
                                    },
                                    pQ = KC(oQ),
                                    RQ = function(g) {
                                        var I = Ri(g, function(g) {
                                                return e.size === Bg && e.clear(), g
                                            }),
                                            e = I.cache;
                                        return I
                                    }(function(g) {
                                        var I = [];
                                        return RI.test(g) && I.push(""), g.replace(XI, function(g, e, n, t) {
                                            I.push(n ? t.replace(fI, "$1") : e || g)
                                        }), I
                                    }),
                                    XQ = et(function(g, I) {
                                        return Oi(g) ? ln(g, an(I, 1, Oi, !0)) : []
                                    }),
                                    NQ = et(function(g, I) {
                                        var e = rl(I);
                                        return Oi(e) && (e = tg), Oi(g) ? ln(g, an(I, 1, Oi, !0), GC(e, 2)) : []
                                    }),
                                    LQ = et(function(g, I) {
                                        var e = rl(I);
                                        return Oi(e) && (e = tg), Oi(g) ? ln(g, an(I, 1, Oi, !0), tg, e) : []
                                    }),
                                    EQ = et(function(g) {
                                        var I = d(g, Gt);
                                        return I.length && I[0] === g[0] ? Zn(I) : []
                                    }),
                                    SQ = et(function(g) {
                                        var I = rl(g),
                                            e = d(g, Gt);
                                        return I === rl(e) ? I = tg : e.pop(), e.length && e[0] === g[0] ? Zn(e, GC(I, 2)) : []
                                    }),
                                    YQ = et(function(g) {
                                        var I = rl(g),
                                            e = d(g, Gt);
                                        return I = "function" == typeof I ? I : tg, I && e.pop(), e.length && e[0] === g[0] ? Zn(e, tg, I) : []
                                    }),
                                    vQ = et(Zl),
                                    JQ = uC(function(g, I) {
                                        var e = null == g ? 0 : g.length,
                                            n = gn(g, I);
                                        return qn(g, d(I, function(g) {
                                            return EC(g, e) ? +g : g
                                        }).sort(Lt)), n
                                    }),
                                    HQ = et(function(g) {
                                        return Ft(an(g, 1, Oi, !0))
                                    }),
                                    kQ = et(function(g) {
                                        var I = rl(g);
                                        return Oi(I) && (I = tg), Ft(an(g, 1, Oi, !0), GC(I, 2))
                                    }),
                                    fQ = et(function(g) {
                                        var I = rl(g);
                                        return I = "function" == typeof I ? I : tg, Ft(an(g, 1, Oi, !0), tg, I)
                                    }),
                                    TQ = et(function(g, I) {
                                        return Oi(g) ? ln(g, I) : []
                                    }),
                                    zQ = et(function(g) {
                                        return Ut(a(g, Oi))
                                    }),
                                    DQ = et(function(g) {
                                        var I = rl(g);
                                        return Oi(I) && (I = tg), Ut(a(g, Oi), GC(I, 2))
                                    }),
                                    wQ = et(function(g) {
                                        var I = rl(g);
                                        return I = "function" == typeof I ? I : tg, Ut(a(g, Oi), tg, I)
                                    }),
                                    OQ = et(wl),
                                    MQ = et(function(g) {
                                        var I = g.length,
                                            e = I > 1 ? g[I - 1] : tg;
                                        return e = "function" == typeof e ? (g.pop(), e) : tg, Ol(g, e)
                                    }),
                                    jQ = uC(function(g) {
                                        var I = g.length,
                                            e = I ? g[0] : 0,
                                            n = this.__wrapped__,
                                            C = function(I) {
                                                return gn(I, g)
                                            };
                                        return !(I > 1 || this.__actions__.length) && n instanceof r && EC(e) ? (n = n.slice(e, +e + (I ? 1 : 0)), n.__actions__.push({
                                            func: _l,
                                            args: [C],
                                            thisArg: tg
                                        }), new t(n, this.__chain__).thru(function(g) {
                                            return I && !g.length && g.push(tg), g
                                        })) : this.thru(C)
                                    }),
                                    PQ = ft(function(g, I, e) {
                                        dA.call(g, e) ? ++g[e] : $e(g, e, 1)
                                    }),
                                    KQ = Kt(Al),
                                    _Q = Kt(Ql),
                                    qQ = ft(function(g, I, e) {
                                        dA.call(g, e) ? g[e].push(I) : $e(g, e, [I])
                                    }),
                                    $Q = et(function(g, I, e) {
                                        var n = -1,
                                            t = "function" == typeof I,
                                            C = wi(g) ? IA(g.length) : [];
                                        return cQ(g, function(g) {
                                            C[++n] = t ? i(I, g, e) : Wn(g, I, e)
                                        }), C
                                    }),
                                    ga = ft(function(g, I, e) {
                                        $e(g, e, I)
                                    }),
                                    Ia = ft(function(g, I, e) {
                                        g[e ? 0 : 1].push(I)
                                    }, function() {
                                        return [
                                            [],
                                            []
                                        ]
                                    }),
                                    ea = et(function(g, I) {
                                        if (null == g) return [];
                                        var e = I.length;
                                        return e > 1 && SC(g, I[0], I[1]) ? I = [] : e > 2 && SC(I[0], I[1], I[2]) && (I = [I[0]]), Mn(g, an(I, 1), [])
                                    }),
                                    na = SA || function() {
                                        return Ne.Date.now()
                                    },
                                    ta = et(function(g, I, e) {
                                        var n = ug;
                                        if (e.length) {
                                            var t = j(e, rC(ta));
                                            n |= Gg
                                        }
                                        return BC(g, n, I, e, t)
                                    }),
                                    Ca = et(function(g, I, e) {
                                        var n = ug | bg;
                                        if (e.length) {
                                            var t = j(e, rC(Ca));
                                            n |= Gg
                                        }
                                        return BC(I, n, g, e, t)
                                    }),
                                    la = et(function(g, I) {
                                        return Cn(g, 1, I)
                                    }),
                                    ia = et(function(g, I, e) {
                                        return Cn(g, Zs(I) || 0, e)
                                    });
                                Ri.Cache = se;
                                var sa = UQ(function(g, I) {
                                        I = 1 == I.length && da(I[0]) ? d(I[0], S(GC())) : d(an(I, 1), S(GC()));
                                        var e = I.length;
                                        return et(function(n) {
                                            for (var t = -1, C = wA(n.length, e); ++t < C;) n[t] = I[t].call(this, n[t]);
                                            return i(g, this, n)
                                        })
                                    }),
                                    Ba = et(function(g, I) {
                                        var e = j(I, rC(Ba));
                                        return BC(g, Gg, tg, I, e)
                                    }),
                                    Aa = et(function(g, I) {
                                        var e = j(I, rC(Aa));
                                        return BC(g, mg, tg, I, e)
                                    }),
                                    Qa = uC(function(g, I) {
                                        return BC(g, Vg, tg, tg, tg, I)
                                    }),
                                    aa = CC(Un),
                                    ca = CC(function(g, I) {
                                        return g >= I
                                    }),
                                    Fa = hn(function() {
                                        return arguments
                                    }()) ? hn : function(g) {
                                        return ts(g) && dA.call(g, "callee") && !yA.call(g, "callee")
                                    },
                                    da = IA.isArray,
                                    ua = Je ? S(Je) : xn,
                                    ba = kA || kB,
                                    oa = He ? S(He) : yn,
                                    Ua = ke ? S(ke) : Xn,
                                    ra = fe ? S(fe) : En,
                                    Ga = Te ? S(Te) : Sn,
                                    ma = ze ? S(ze) : Yn,
                                    Za = CC(kn),
                                    Va = CC(function(g, I) {
                                        return g <= I
                                    }),
                                    Wa = Tt(function(g, I) {
                                        if (kC(I) || wi(I)) return void Jt(I, Hs(I), g);
                                        for (var e in I) dA.call(I, e) && De(g, e, I[e])
                                    }),
                                    ha = Tt(function(g, I) {
                                        Jt(I, ks(I), g)
                                    }),
                                    xa = Tt(function(g, I, e, n) {
                                        Jt(I, ks(I), g, n)
                                    }),
                                    ya = Tt(function(g, I, e, n) {
                                        Jt(I, Hs(I), g, n)
                                    }),
                                    pa = uC(gn),
                                    Ra = et(function(g) {
                                        return g.push(tg, AC), i(xa, tg, g)
                                    }),
                                    Xa = et(function(g) {
                                        return g.push(tg, QC), i(Ya, tg, g)
                                    }),
                                    Na = $t(function(g, I, e) {
                                        g[I] = e
                                    }, xB(pB)),
                                    La = $t(function(g, I, e) {
                                        dA.call(g, I) ? g[I].push(e) : g[I] = [e]
                                    }, GC),
                                    Ea = et(Wn),
                                    Sa = Tt(function(g, I, e) {
                                        Dn(g, I, e)
                                    }),
                                    Ya = Tt(function(g, I, e, n) {
                                        Dn(g, I, e, n)
                                    }),
                                    va = uC(function(g, I) {
                                        var e = {};
                                        if (null == g) return e;
                                        var n = !1;
                                        I = d(I, function(I) {
                                            return I = Zt(I, g), n || (n = I.length > 1), I
                                        }), Jt(g, oC(g), e), n && (e = en(e, Qg | ag | cg, aC));
                                        for (var t = I.length; t--;) dt(e, I[t]);
                                        return e
                                    }),
                                    Ja = uC(function(g, I) {
                                        return null == g ? {} : jn(g, I)
                                    }),
                                    Ha = sC(Hs),
                                    ka = sC(ks),
                                    fa = Mt(function(g, I, e) {
                                        return I = I.toLowerCase(), g + (e ? nB(I) : I)
                                    }),
                                    Ta = Mt(function(g, I, e) {
                                        return g + (e ? "-" : "") + I.toLowerCase()
                                    }),
                                    za = Mt(function(g, I, e) {
                                        return g + (e ? " " : "") + I.toLowerCase()
                                    }),
                                    Da = Ot("toLowerCase"),
                                    wa = Mt(function(g, I, e) {
                                        return g + (e ? "_" : "") + I.toLowerCase()
                                    }),
                                    Oa = Mt(function(g, I, e) {
                                        return g + (e ? " " : "") + ja(I)
                                    }),
                                    Ma = Mt(function(g, I, e) {
                                        return g + (e ? " " : "") + I.toUpperCase()
                                    }),
                                    ja = Ot("toUpperCase"),
                                    Pa = et(function(g, I) {
                                        try {
                                            return i(g, tg, I)
                                        } catch (g) {
                                            return qi(g) ? g : new nA(g)
                                        }
                                    }),
                                    Ka = uC(function(g, I) {
                                        return B(I, function(I) {
                                            I = qC(I), $e(g, I, ta(g[I], g))
                                        }), g
                                    }),
                                    _a = _t(),
                                    qa = _t(!0),
                                    $a = et(function(g, I) {
                                        return function(e) {
                                            return Wn(e, g, I)
                                        }
                                    }),
                                    gc = et(function(g, I) {
                                        return function(e) {
                                            return Wn(g, e, I)
                                        }
                                    }),
                                    Ic = IC(d),
                                    ec = IC(Q),
                                    nc = IC(U),
                                    tc = tC(),
                                    Cc = tC(!0),
                                    lc = gC(function(g, I) {
                                        return g + I
                                    }, 0),
                                    ic = iC("ceil"),
                                    sc = gC(function(g, I) {
                                        return g / I
                                    }, 1),
                                    Bc = iC("floor"),
                                    Ac = gC(function(g, I) {
                                        return g * I
                                    }, 1),
                                    Qc = iC("round"),
                                    ac = gC(function(g, I) {
                                        return g - I
                                    }, 0);
                                return e.after = Zi, e.ary = Vi, e.assign = Wa, e.assignIn = ha, e.assignInWith = xa, e.assignWith = ya, e.at = pa, e.before = Wi, e.bind = ta, e.bindAll = Ka, e.bindKey = Ca, e.castArray = Ji, e.chain = Pl, e.chunk = el, e.compact = nl, e.concat = tl, e.cond = WB, e.conforms = hB, e.constant = xB, e.countBy = PQ, e.create = xs, e.curry = hi, e.curryRight = xi, e.debounce = yi, e.defaults = Ra, e.defaultsDeep = Xa, e.defer = la, e.delay = ia, e.difference = XQ, e.differenceBy = NQ, e.differenceWith = LQ, e.drop = Cl, e.dropRight = ll, e.dropRightWhile = il, e.dropWhile = sl, e.fill = Bl, e.filter = li, e.flatMap = ii, e.flatMapDeep = si, e.flatMapDepth = Bi, e.flatten = al, e.flattenDeep = cl, e.flattenDepth = Fl, e.flip = pi, e.flow = _a, e.flowRight = qa, e.fromPairs = dl, e.functions = Es, e.functionsIn = Ss, e.groupBy = qQ, e.initial = ol, e.intersection = EQ, e.intersectionBy = SQ, e.intersectionWith = YQ, e.invert = Na, e.invertBy = La, e.invokeMap = $Q, e.iteratee = RB, e.keyBy = ga, e.keys = Hs, e.keysIn = ks, e.map = ci, e.mapKeys = fs, e.mapValues = Ts, e.matches = XB, e.matchesProperty = NB, e.memoize = Ri, e.merge = Sa, e.mergeWith = Ya, e.method = $a, e.methodOf = gc, e.mixin = LB, e.negate = Xi, e.nthArg = YB, e.omit = va, e.omitBy = zs, e.once = Ni, e.orderBy = Fi, e.over = Ic, e.overArgs = sa, e.overEvery = ec, e.overSome = nc, e.partial = Ba, e.partialRight = Aa, e.partition = Ia, e.pick = Ja, e.pickBy = Ds, e.property = vB, e.propertyOf = JB, e.pull = vQ, e.pullAll = Zl, e.pullAllBy = Vl, e.pullAllWith = Wl, e.pullAt = JQ, e.range = tc, e.rangeRight = Cc, e.rearg = Qa, e.reject = bi, e.remove = hl, e.rest = Li, e.reverse = xl, e.sampleSize = Ui, e.set = Os, e.setWith = Ms, e.shuffle = ri, e.slice = yl, e.sortBy = ea, e.sortedUniq = Sl, e.sortedUniqBy = Yl, e.split = FB, e.spread = Ei, e.tail = vl, e.take = Jl, e.takeRight = Hl, e.takeRightWhile = kl, e.takeWhile = fl, e.tap = Kl, e.throttle = Si, e.thru = _l, e.toArray = Us, e.toPairs = Ha, e.toPairsIn = ka, e.toPath = wB, e.toPlainObject = Vs, e.transform = js, e.unary = Yi, e.union = HQ, e.unionBy = kQ, e.unionWith = fQ, e.uniq = Tl, e.uniqBy = zl, e.uniqWith = Dl, e.unset = Ps, e.unzip = wl, e.unzipWith = Ol, e.update = Ks, e.updateWith = _s, e.values = qs, e.valuesIn = $s, e.without = TQ, e.words = VB, e.wrap = vi, e.xor = zQ, e.xorBy = DQ, e.xorWith = wQ, e.zip = OQ, e.zipObject = Ml, e.zipObjectDeep = jl, e.zipWith = MQ, e.entries = Ha, e.entriesIn = ka, e.extend = ha, e.extendWith = xa, LB(e, e), e.add = lc, e.attempt = Pa, e.camelCase = fa, e.capitalize = nB, e.ceil = ic, e.clamp = gB, e.clone = Hi, e.cloneDeep = fi, e.cloneDeepWith = Ti, e.cloneWith = ki, e.conformsTo = zi, e.deburr = tB, e.defaultTo = yB, e.divide = sc, e.endsWith = CB, e.eq = Di, e.escape = lB, e.escapeRegExp = iB, e.every = Ci, e.find = KQ, e.findIndex = Al, e.findKey = ys, e.findLast = _Q, e.findLastIndex = Ql, e.findLastKey = ps, e.floor = Bc, e.forEach = Ai, e.forEachRight = Qi, e.forIn = Rs, e.forInRight = Xs, e.forOwn = Ns, e.forOwnRight = Ls, e.get = Ys, e.gt = aa, e.gte = ca, e.has = vs, e.hasIn = Js, e.head = ul, e.identity = pB, e.includes = ai, e.indexOf = bl, e.inRange = IB, e.invoke = Ea, e.isArguments = Fa, e.isArray = da, e.isArrayBuffer = ua, e.isArrayLike = wi, e.isArrayLikeObject = Oi, e.isBoolean = Mi, e.isBuffer = ba, e.isDate = oa, e.isElement = ji, e.isEmpty = Pi, e.isEqual = Ki, e.isEqualWith = _i, e.isError = qi, e.isFinite = $i, e.isFunction = gs, e.isInteger = Is, e.isLength = es, e.isMap = Ua, e.isMatch = Cs, e.isMatchWith = ls, e.isNaN = is, e.isNative = ss, e.isNil = As, e.isNull = Bs, e.isNumber = Qs, e.isObject = ns, e.isObjectLike = ts, e.isPlainObject = as, e.isRegExp = ra, e.isSafeInteger = cs, e.isSet = Ga, e.isString = Fs, e.isSymbol = ds, e.isTypedArray = ma, e.isUndefined = us, e.isWeakMap = bs, e.isWeakSet = os, e.join = Ul, e.kebabCase = Ta, e.last = rl, e.lastIndexOf = Gl, e.lowerCase = za, e.lowerFirst = Da, e.lt = Za, e.lte = Va, e.max = MB, e.maxBy = jB, e.mean = PB, e.meanBy = KB, e.min = _B, e.minBy = qB, e.stubArray = HB, e.stubFalse = kB, e.stubObject = fB, e.stubString = TB, e.stubTrue = zB, e.multiply = Ac, e.nth = ml, e.noConflict = EB, e.noop = SB, e.now = na, e.pad = sB, e.padEnd = BB, e.padStart = AB, e.parseInt = QB, e.random = eB, e.reduce = di, e.reduceRight = ui, e.repeat = aB, e.replace = cB, e.result = ws, e.round = Qc, e.runInContext = g, e.sample = oi, e.size = Gi, e.snakeCase = wa, e.some = mi, e.sortedIndex = pl, e.sortedIndexBy = Rl, e.sortedIndexOf = Xl, e.sortedLastIndex = Nl, e.sortedLastIndexBy = Ll, e.sortedLastIndexOf = El, e.startCase = Oa, e.startsWith = dB, e.subtract = ac, e.sum = $B, e.sumBy = gA, e.template = uB, e.times = DB, e.toFinite = rs, e.toInteger = Gs, e.toLength = ms, e.toLower = bB, e.toNumber = Zs, e.toSafeInteger = Ws, e.toString = hs, e.toUpper = oB, e.trim = UB, e.trimEnd = rB, e.trimStart = GB, e.truncate = mB, e.unescape = ZB, e.uniqueId = OB, e.upperCase = Ma, e.upperFirst = ja, e.each = Ai, e.eachRight = Qi, e.first = ul, LB(e, function() {
                                    var g = {};
                                    return cn(e, function(I, n) {
                                        dA.call(e.prototype, n) || (g[n] = I)
                                    }), g
                                }(), {
                                    chain: !1
                                }), e.VERSION = "4.17.4", B(["bind", "bindKey", "curry", "curryRight", "partial", "partialRight"], function(g) {
                                    e[g].placeholder = e
                                }), B(["drop", "take"], function(g, I) {
                                    r.prototype[g] = function(e) {
                                        e = e === tg ? 1 : DA(Gs(e), 0);
                                        var n = this.__filtered__ && !I ? new r(this) : this.clone();
                                        return n.__filtered__ ? n.__takeCount__ = wA(e, n.__takeCount__) : n.__views__.push({
                                            size: wA(e, Yg),
                                            type: g + (n.__dir__ < 0 ? "Right" : "")
                                        }), n
                                    }, r.prototype[g + "Right"] = function(I) {
                                        return this.reverse()[g](I).reverse()
                                    }
                                }), B(["filter", "map", "takeWhile"], function(g, I) {
                                    var e = I + 1,
                                        n = e == Rg || 3 == e;
                                    r.prototype[g] = function(g) {
                                        var I = this.clone();
                                        return I.__iteratees__.push({
                                            iteratee: GC(g, 3),
                                            type: e
                                        }), I.__filtered__ = I.__filtered__ || n, I
                                    }
                                }), B(["head", "last"], function(g, I) {
                                    var e = "take" + (I ? "Right" : "");
                                    r.prototype[g] = function() {
                                        return this[e](1).value()[0]
                                    }
                                }), B(["initial", "tail"], function(g, I) {
                                    var e = "drop" + (I ? "" : "Right");
                                    r.prototype[g] = function() {
                                        return this.__filtered__ ? new r(this) : this[e](1)
                                    }
                                }), r.prototype.compact = function() {
                                    return this.filter(pB)
                                }, r.prototype.find = function(g) {
                                    return this.filter(g).head()
                                }, r.prototype.findLast = function(g) {
                                    return this.reverse().find(g)
                                }, r.prototype.invokeMap = et(function(g, I) {
                                    return "function" == typeof g ? new r(this) : this.map(function(e) {
                                        return Wn(e, g, I)
                                    })
                                }), r.prototype.reject = function(g) {
                                    return this.filter(Xi(GC(g)))
                                }, r.prototype.slice = function(g, I) {
                                    g = Gs(g);
                                    var e = this;
                                    return e.__filtered__ && (g > 0 || I < 0) ? new r(e) : (g < 0 ? e = e.takeRight(-g) : g && (e = e.drop(g)), I !== tg && (I = Gs(I), e = I < 0 ? e.dropRight(-I) : e.take(I - g)), e)
                                }, r.prototype.takeRightWhile = function(g) {
                                    return this.reverse().takeWhile(g).reverse()
                                }, r.prototype.toArray = function() {
                                    return this.take(Yg)
                                }, cn(r.prototype, function(g, I) {
                                    var n = /^(?:filter|find|map|reject)|While$/.test(I),
                                        C = /^(?:head|last)$/.test(I),
                                        l = e[C ? "take" + ("last" == I ? "Right" : "") : I],
                                        i = C || /^find/.test(I);
                                    l && (e.prototype[I] = function() {
                                        var I = this.__wrapped__,
                                            s = C ? [1] : arguments,
                                            B = I instanceof r,
                                            A = s[0],
                                            Q = B || da(I),
                                            a = function(g) {
                                                var I = l.apply(e, u([g], s));
                                                return C && c ? I[0] : I
                                            };
                                        Q && n && "function" == typeof A && 1 != A.length && (B = Q = !1);
                                        var c = this.__chain__,
                                            F = !!this.__actions__.length,
                                            d = i && !c,
                                            b = B && !F;
                                        if (!i && Q) {
                                            I = b ? I : new r(this);
                                            var o = g.apply(I, s);
                                            return o.__actions__.push({
                                                func: _l,
                                                args: [a],
                                                thisArg: tg
                                            }), new t(o, c)
                                        }
                                        return d && b ? g.apply(this, s) : (o = this.thru(a), d ? C ? o.value()[0] : o.value() : o)
                                    })
                                }), B(["pop", "push", "shift", "sort", "splice", "unshift"], function(g) {
                                    var I = AA[g],
                                        n = /^(?:push|sort|unshift)$/.test(g) ? "tap" : "thru",
                                        t = /^(?:pop|shift)$/.test(g);
                                    e.prototype[g] = function() {
                                        var g = arguments;
                                        if (t && !this.__chain__) {
                                            var e = this.value();
                                            return I.apply(da(e) ? e : [], g)
                                        }
                                        return this[n](function(e) {
                                            return I.apply(da(e) ? e : [], g)
                                        })
                                    }
                                }), cn(r.prototype, function(g, I) {
                                    var n = e[I];
                                    if (n) {
                                        var t = n.name + "";
                                        (nQ[t] || (nQ[t] = [])).push({
                                            name: I,
                                            func: n
                                        })
                                    }
                                }), nQ[qt(tg, bg).name] = [{
                                    name: "wrapper",
                                    func: tg
                                }], r.prototype.clone = p, r.prototype.reverse = _, r.prototype.value = Ig, e.prototype.at = jQ, e.prototype.chain = ql, e.prototype.commit = $l, e.prototype.next = gi, e.prototype.plant = ei, e.prototype.reverse = ni, e.prototype.toJSON = e.prototype.valueOf = e.prototype.value = ti, e.prototype.first = e.prototype.head, XA && (e.prototype[XA] = Ii), e
                            }();
                        Ne._ = je, (t = function() {
                            return je
                        }.call(I, e, I, n)) !== tg && (n.exports = t)
                    }).call(this)
                }).call(I, e(1), e(66)(g))
            },
            66: function(g, I) {
                g.exports = function(g) {
                    return g.webpackPolyfill || (g.deprecate = function() {}, g.paths = [], g.children || (g.children = []), Object.defineProperty(g, "loaded", {
                        enumerable: !0,
                        get: function() {
                            return g.l
                        }
                    }), Object.defineProperty(g, "id", {
                        enumerable: !0,
                        get: function() {
                            return g.i
                        }
                    }), g.webpackPolyfill = 1), g
                }
            },
            67: function(g, I, e) {
                "use strict";

                function n(g, I, e) {
                    return s.diff(g, I, e)
                }

                function t(g, I, e) {
                    var n = (0, i.generateOptions)(e, {
                        ignoreWhitespace: !0
                    });
                    return s.diff(g, I, n)
                }
                I.__esModule = !0, I.lineDiff = void 0, I.diffLines = n, I.diffTrimmedLines = t;
                var C = e(62),
                    l = function(g) {
                        return g && g.__esModule ? g : {
                            default: g
                        }
                    }(C),
                    i = e(69),
                    s = I.lineDiff = new l.default;
                s.tokenize = function(g) {
                    var I = [],
                        e = g.split(/(\n|\r\n)/);
                    e[e.length - 1] || e.pop();
                    for (var n = 0; n < e.length; n++) {
                        var t = e[n];
                        n % 2 && !this.options.newlineIsToken ? I[I.length - 1] += t : (this.options.ignoreWhitespace && (t = t.trim()), I.push(t))
                    }
                    return I
                }
            },
            68: function(g, I, e) {
                (function(I) {
                    g.exports = I.ko = e(77)
                }).call(I, e(1))
            },
            69: function(g, I, e) {
                "use strict";

                function n(g, I) {
                    if ("function" == typeof g) I.callback = g;
                    else if (g)
                        for (var e in g) g.hasOwnProperty(e) && (I[e] = g[e]);
                    return I
                }
                I.__esModule = !0, I.generateOptions = n
            },
            70: function(g, I, e) {
                "use strict";

                function n(g) {
                    function I(g) {
                        var I = /^(---|\+\+\+)\s+([\S ]*)(?:\t(.*?)\s*)?$/,
                            e = I.exec(t[i]);
                        if (e) {
                            var n = "---" === e[1] ? "old" : "new";
                            g[n + "FileName"] = e[2], g[n + "Header"] = e[3], i++
                        }
                    }

                    function e() {
                        for (var g = i, I = t[i++], e = I.split(/@@ -(\d+)(?:,(\d+))? \+(\d+)(?:,(\d+))? @@/), l = {
                                oldStart: +e[1],
                                oldLines: +e[2] || 1,
                                newStart: +e[3],
                                newLines: +e[4] || 1,
                                lines: [],
                                linedelimiters: []
                            }, s = 0, B = 0; i < t.length && !(0 === t[i].indexOf("--- ") && i + 2 < t.length && 0 === t[i + 1].indexOf("+++ ") && 0 === t[i + 2].indexOf("@@")); i++) {
                            var A = t[i][0];
                            if ("+" !== A && "-" !== A && " " !== A && "\\" !== A) break;
                            l.lines.push(t[i]), l.linedelimiters.push(C[i] || "\n"), "+" === A ? s++ : "-" === A ? B++ : " " === A && (s++, B++)
                        }
                        if (s || 1 !== l.newLines || (l.newLines = 0), B || 1 !== l.oldLines || (l.oldLines = 0), n.strict) {
                            if (s !== l.newLines) throw new Error("Added line count did not match for hunk at line " + (g + 1));
                            if (B !== l.oldLines) throw new Error("Removed line count did not match for hunk at line " + (g + 1))
                        }
                        return l
                    }
                    for (var n = arguments.length <= 1 || void 0 === arguments[1] ? {} : arguments[1], t = g.split(/\r\n|[\n\v\f\r\x85]/), C = g.match(/\r\n|[\n\v\f\r\x85]/g) || [], l = [], i = 0; i < t.length;) ! function() {
                        var g = {};
                        for (l.push(g); i < t.length;) {
                            var C = t[i];
                            if (/^(\-\-\-|\+\+\+|@@)\s/.test(C)) break;
                            var s = /^(?:Index:|diff(?: -r \w+)+)\s+(.+?)\s*$/.exec(C);
                            s && (g.index = s[1]), i++
                        }
                        for (I(g), I(g), g.hunks = []; i < t.length;) {
                            var B = t[i];
                            if (/^(Index:|diff|\-\-\-|\+\+\+)\s/.test(B)) break;
                            if (/^@@/.test(B)) g.hunks.push(e());
                            else {
                                if (B && n.strict) throw new Error("Unknown line " + (i + 1) + " " + JSON.stringify(B));
                                i++
                            }
                        }
                    }();
                    return l
                }
                I.__esModule = !0, I.parsePatch = n
            },
            76: function(g, I, e) {
                e(64), e(68), e(78), e(91), e(63), g.exports = e(93)
            },
            77: function(g, I, e) {
                    var n, t, C; /*!

/*
 * Knockout JavaScript library v3.4.2
 * (c) The Knockout.js team - http://knockoutjs.com/
 * License: MIT (http://www.opensource.org/licenses/mit-license.php)
 */
! function() {
    ! function(l) {
        var i = this || (0, eval)("this"),
            s = i.document,
            B = i.navigator,
            A = i.jQuery,
            Q = i.JSON;
        ! function(i) {
            t = [I, e], n = i, (C = "function" == typeof n ? n.apply(I, t) : n) !== l && (g.exports = C)
        }(function(g, I) {
            function e(g, I) {
                return !!(null === g || typeof g in b) && g === I
            }

            function n(g, I) {
                var e;
                return function() {
                    e || (e = u.utils.setTimeout(function() {
                        e = l, g()
                    }, I))
                }
            }

            function t(g, I) {
                var e;
                return function() {
                    clearTimeout(e), e = u.utils.setTimeout(g, I)
                }
            }

            function C(g) {
                var I = this;
                return g && u.utils.objectForEach(g, function(g, e) {
                    var n = u.extenders[g];
                    "function" == typeof n && (I = n(I, e) || I)
                }), I
            }

            function a(g, I) {
                I && I !== o ? "beforeChange" === I ? this._limitBeforeChange(g) : this._origNotifySubscribers(g, I) : this._limitChange(g)
            }

            function c(g, I) {
                null !== I && I.dispose && I.dispose()
            }

            function F(g, I) {
                var e = this.computedObservable,
                    n = e[V];
                n.isDisposed || (this.disposalCount && this.disposalCandidates[I] ? (e.addDependencyTracking(I, g, this.disposalCandidates[I]), this.disposalCandidates[I] = null, --this.disposalCount) : n.dependencyTracking[I] || e.addDependencyTracking(I, g, n.isSleeping ? {
                    _target: g
                } : e.subscribeToDependency(g)), g._notificationIsPending && g._notifyNextChangeIfValueIsDifferent())
            }

            function d(g, I, e, n) {
                u.bindingHandlers[g] = {
                    init: function(g, t, C, l, i) {
                        var s, B;
                        return u.computed(function() {
                            var C = t(),
                                l = u.utils.unwrapObservable(C),
                                A = !e != !l,
                                Q = !B;
                            (Q || I || A !== s) && (Q && u.computedContext.getDependenciesCount() && (B = u.utils.cloneNodes(u.virtualElements.childNodes(g), !0)), A ? (Q || u.virtualElements.setDomNodeChildren(g, u.utils.cloneNodes(B)), u.applyBindingsToDescendants(n ? n(i, C) : i, g)) : u.virtualElements.emptyNode(g), s = A)
                        }, null, {
                            disposeWhenNodeIsRemoved: g
                        }), {
                            controlsDescendantBindings: !0
                        }
                    }
                }, u.expressionRewriting.bindingRewriteValidators[g] = !1, u.virtualElements.allowedBindings[g] = !0
            }
            var u = void 0 !== g ? g : {};
            u.exportSymbol = function(g, I) {
                    for (var e = g.split("."), n = u, t = 0; t < e.length - 1; t++) n = n[e[t]];
                    n[e[e.length - 1]] = I
                }, u.exportProperty = function(g, I, e) {
                    g[I] = e
                }, u.version = "3.4.2", u.exportSymbol("version", u.version), u.options = {
                    deferUpdates: !1,
                    useOnlyNativeEvents: !1
                }, u.utils = function() {
                    function g(g, I) {
                        for (var e in g) g.hasOwnProperty(e) && I(e, g[e])
                    }

                    function I(g, I) {
                        if (I)
                            for (var e in I) I.hasOwnProperty(e) && (g[e] = I[e]);
                        return g
                    }

                    function e(g, I) {
                        return g.__proto__ = I, g
                    }

                    function n(g, I) {
                        if ("input" !== u.utils.tagNameLower(g) || !g.type) return !1;
                        if ("click" != I.toLowerCase()) return !1;
                        var e = g.type;
                        return "checkbox" == e || "radio" == e
                    }

                    function t(g, I, e) {
                        var n;
                        I && ("object" == typeof g.classList ? (n = g.classList[e ? "add" : "remove"], u.utils.arrayForEach(I.match(r), function(I) {
                            n.call(g.classList, I)
                        })) : "string" == typeof g.className.baseVal ? C(g.className, "baseVal", I, e) : C(g, "className", I, e))
                    }

                    function C(g, I, e, n) {
                        var t = g[I].match(r) || [];
                        u.utils.arrayForEach(e.match(r), function(g) {
                            u.utils.addOrRemoveItem(t, g, n)
                        }), g[I] = t.join(" ")
                    }
                    var a = {
                        __proto__: []
                    }
                    instanceof Array, c = {}, F = {};
                    c[B && /Firefox\/2/i.test(B.userAgent) ? "KeyboardEvent" : "UIEvents"] = ["keyup", "keydown", "keypress"], c.MouseEvents = ["click", "dblclick", "mousedown", "mouseup", "mousemove", "mouseover", "mouseout", "mouseenter", "mouseleave"], g(c, function(g, I) {
                        if (I.length)
                            for (var e = 0, n = I.length; e < n; e++) F[I[e]] = g
                    });
                    var d = {
                            propertychange: !0
                        },
                        b = s && function() {
                            for (var g = 3, I = s.createElement("div"), e = I.getElementsByTagName("i"); I.innerHTML = "\x3c!--[if gt IE " + ++g + "]><i></i><![endif]--\x3e", e[0];);
                            return g > 4 ? g : l
                        }(),
                        o = 6 === b,
                        U = 7 === b,
                        r = /\S+/g;
                    return {
                        fieldsIncludedWithJsonPost: ["authenticity_token", /^__RequestVerificationToken(_.*)?$/],
                        arrayForEach: function(g, I) {
                            for (var e = 0, n = g.length; e < n; e++) I(g[e], e)
                        },
                        arrayIndexOf: function(g, I) {
                            if ("function" == typeof Array.prototype.indexOf) return Array.prototype.indexOf.call(g, I);
                            for (var e = 0, n = g.length; e < n; e++)
                                if (g[e] === I) return e;
                            return -1
                        },
                        arrayFirst: function(g, I, e) {
                            for (var n = 0, t = g.length; n < t; n++)
                                if (I.call(e, g[n], n)) return g[n];
                            return null
                        },
                        arrayRemoveItem: function(g, I) {
                            var e = u.utils.arrayIndexOf(g, I);
                            e > 0 ? g.splice(e, 1) : 0 === e && g.shift()
                        },
                        arrayGetDistinctValues: function(g) {
                            g = g || [];
                            for (var I = [], e = 0, n = g.length; e < n; e++) u.utils.arrayIndexOf(I, g[e]) < 0 && I.push(g[e]);
                            return I
                        },
                        arrayMap: function(g, I) {
                            g = g || [];
                            for (var e = [], n = 0, t = g.length; n < t; n++) e.push(I(g[n], n));
                            return e
                        },
                        arrayFilter: function(g, I) {
                            g = g || [];
                            for (var e = [], n = 0, t = g.length; n < t; n++) I(g[n], n) && e.push(g[n]);
                            return e
                        },
                        arrayPushAll: function(g, I) {
                            if (I instanceof Array) g.push.apply(g, I);
                            else
                                for (var e = 0, n = I.length; e < n; e++) g.push(I[e]);
                            return g
                        },
                        addOrRemoveItem: function(g, I, e) {
                            var n = u.utils.arrayIndexOf(u.utils.peekObservable(g), I);
                            n < 0 ? e && g.push(I) : e || g.splice(n, 1)
                        },
                        canSetPrototype: a,
                        extend: I,
                        setPrototypeOf: e,
                        setPrototypeOfOrExtend: a ? e : I,
                        objectForEach: g,
                        objectMap: function(g, I) {
                            if (!g) return g;
                            var e = {};
                            for (var n in g) g.hasOwnProperty(n) && (e[n] = I(g[n], n, g));
                            return e
                        },
                        emptyDomNode: function(g) {
                            for (; g.firstChild;) u.removeNode(g.firstChild)
                        },
                        moveCleanedNodesToContainerElement: function(g) {
                            for (var I = u.utils.makeArray(g), e = I[0] && I[0].ownerDocument || s, n = e.createElement("div"), t = 0, C = I.length; t < C; t++) n.appendChild(u.cleanNode(I[t]));
                            return n
                        },
                        cloneNodes: function(g, I) {
                            for (var e = 0, n = g.length, t = []; e < n; e++) {
                                var C = g[e].cloneNode(!0);
                                t.push(I ? u.cleanNode(C) : C)
                            }
                            return t
                        },
                        setDomNodeChildren: function(g, I) {
                            if (u.utils.emptyDomNode(g), I)
                                for (var e = 0, n = I.length; e < n; e++) g.appendChild(I[e])
                        },
                        replaceDomNodes: function(g, I) {
                            var e = g.nodeType ? [g] : g;
                            if (e.length > 0) {
                                for (var n = e[0], t = n.parentNode, C = 0, l = I.length; C < l; C++) t.insertBefore(I[C], n);
                                for (var C = 0, l = e.length; C < l; C++) u.removeNode(e[C])
                            }
                        },
                        fixUpContinuousNodeArray: function(g, I) {
                            if (g.length) {
                                for (I = 8 === I.nodeType && I.parentNode || I; g.length && g[0].parentNode !== I;) g.splice(0, 1);
                                for (; g.length > 1 && g[g.length - 1].parentNode !== I;) g.length--;
                                if (g.length > 1) {
                                    var e = g[0],
                                        n = g[g.length - 1];
                                    for (g.length = 0; e !== n;) g.push(e), e = e.nextSibling;
                                    g.push(n)
                                }
                            }
                            return g
                        },
                        setOptionNodeSelectionState: function(g, I) {
                            b < 7 ? g.setAttribute("selected", I) : g.selected = I
                        },
                        stringTrim: function(g) {
                            return null === g || g === l ? "" : g.trim ? g.trim() : g.toString().replace(/^[\s\xa0]+|[\s\xa0]+$/g, "")
                        },
                        stringStartsWith: function(g, I) {
                            return g = g || "", !(I.length > g.length) && g.substring(0, I.length) === I
                        },
                        domNodeIsContainedBy: function(g, I) {
                            if (g === I) return !0;
                            if (11 === g.nodeType) return !1;
                            if (I.contains) return I.contains(3 === g.nodeType ? g.parentNode : g);
                            if (I.compareDocumentPosition) return 16 == (16 & I.compareDocumentPosition(g));
                            for (; g && g != I;) g = g.parentNode;
                            return !!g
                        },
                        domNodeIsAttachedToDocument: function(g) {
                            return u.utils.domNodeIsContainedBy(g, g.ownerDocument.documentElement)
                        },
                        anyDomNodeIsAttachedToDocument: function(g) {
                            return !!u.utils.arrayFirst(g, u.utils.domNodeIsAttachedToDocument)
                        },
                        tagNameLower: function(g) {
                            return g && g.tagName && g.tagName.toLowerCase()
                        },
                        catchFunctionErrors: function(g) {
                            return u.onError ? function() {
                                try {
                                    return g.apply(this, arguments)
                                } catch (g) {
                                    throw u.onError && u.onError(g), g
                                }
                            } : g
                        },
                        setTimeout: function(g, I) {
                            return setTimeout(u.utils.catchFunctionErrors(g), I)
                        },
                        deferError: function(g) {
                            setTimeout(function() {
                                throw u.onError && u.onError(g), g
                            }, 0)
                        },
                        registerEventHandler: function(g, I, e) {
                            var n = u.utils.catchFunctionErrors(e),
                                t = b && d[I];
                            if (u.options.useOnlyNativeEvents || t || !A)
                                if (t || "function" != typeof g.addEventListener) {
                                    if (void 0 === g.attachEvent) throw new Error("Browser doesn't support addEventListener or attachEvent");
                                    var C = function(I) {
                                            n.call(g, I)
                                        },
                                        l = "on" + I;
                                    g.attachEvent(l, C), u.utils.domNodeDisposal.addDisposeCallback(g, function() {
                                        g.detachEvent(l, C)
                                    })
                                } else g.addEventListener(I, n, !1);
                            else A(g).bind(I, n)
                        },
                        triggerEvent: function(g, I) {
                            if (!g || !g.nodeType) throw new Error("element must be a DOM node when calling triggerEvent");
                            var e = n(g, I);
                            if (u.options.useOnlyNativeEvents || !A || e)
                                if ("function" == typeof s.createEvent) {
                                    if ("function" != typeof g.dispatchEvent) throw new Error("The supplied element doesn't support dispatchEvent");
                                    var t = F[I] || "HTMLEvents",
                                        C = s.createEvent(t);
                                    C.initEvent(I, !0, !0, i, 0, 0, 0, 0, 0, !1, !1, !1, !1, 0, g), g.dispatchEvent(C)
                                } else if (e && g.click) g.click();
                            else {
                                if (void 0 === g.fireEvent) throw new Error("Browser doesn't support triggering events");
                                g.fireEvent("on" + I)
                            } else A(g).trigger(I)
                        },
                        unwrapObservable: function(g) {
                            return u.isObservable(g) ? g() : g
                        },
                        peekObservable: function(g) {
                            return u.isObservable(g) ? g.peek() : g
                        },
                        toggleDomNodeCssClass: t,
                        setTextContent: function(g, I) {
                            var e = u.utils.unwrapObservable(I);
                            null !== e && e !== l || (e = "");
                            var n = u.virtualElements.firstChild(g);
                            !n || 3 != n.nodeType || u.virtualElements.nextSibling(n) ? u.virtualElements.setDomNodeChildren(g, [g.ownerDocument.createTextNode(e)]) : n.data = e, u.utils.forceRefresh(g)
                        },
                        setElementName: function(g, I) {
                            if (g.name = I, b <= 7) try {
                                g.mergeAttributes(s.createElement("<input name='" + g.name + "'/>"), !1)
                            } catch (g) {}
                        },
                        forceRefresh: function(g) {
                            if (b >= 9) {
                                var I = 1 == g.nodeType ? g : g.parentNode;
                                I.style && (I.style.zoom = I.style.zoom)
                            }
                        },
                        ensureSelectElementIsRenderedCorrectly: function(g) {
                            if (b) {
                                var I = g.style.width;
                                g.style.width = 0, g.style.width = I
                            }
                        },
                        range: function(g, I) {
                            g = u.utils.unwrapObservable(g), I = u.utils.unwrapObservable(I);
                            for (var e = [], n = g; n <= I; n++) e.push(n);
                            return e
                        },
                        makeArray: function(g) {
                            for (var I = [], e = 0, n = g.length; e < n; e++) I.push(g[e]);
                            return I
                        },
                        createSymbolOrString: function(g) {
                            return g
                        },
                        isIe6: o,
                        isIe7: U,
                        ieVersion: b,
                        getFormFields: function(g, I) {
                            for (var e = u.utils.makeArray(g.getElementsByTagName("input")).concat(u.utils.makeArray(g.getElementsByTagName("textarea"))), n = "string" == typeof I ? function(g) {
                                    return g.name === I
                                } : function(g) {
                                    return I.test(g.name)
                                }, t = [], C = e.length - 1; C >= 0; C--) n(e[C]) && t.push(e[C]);
                            return t
                        },
                        parseJson: function(g) {
                            return "string" == typeof g && (g = u.utils.stringTrim(g)) ? Q && Q.parse ? Q.parse(g) : new Function("return " + g)() : null
                        },
                        stringifyJson: function(g, I, e) {
                            if (!Q || !Q.stringify) throw new Error("Cannot find JSON.stringify(). Some browsers (e.g., IE < 8) don't support it natively, but you can overcome this by adding a script reference to json2.js, downloadable from http://www.json.org/json2.js");
                            return Q.stringify(u.utils.unwrapObservable(g), I, e)
                        },
                        postJson: function(I, e, n) {
                            n = n || {};
                            var t = n.params || {},
                                C = n.includeFields || this.fieldsIncludedWithJsonPost,
                                l = I;
                            if ("object" == typeof I && "form" === u.utils.tagNameLower(I)) {
                                var i = I;
                                l = i.action;
                                for (var B = C.length - 1; B >= 0; B--)
                                    for (var A = u.utils.getFormFields(i, C[B]), Q = A.length - 1; Q >= 0; Q--) t[A[Q].name] = A[Q].value
                            }
                            e = u.utils.unwrapObservable(e);
                            var a = s.createElement("form");
                            a.style.display = "none", a.action = l, a.method = "post";
                            for (var c in e) {
                                var F = s.createElement("input");
                                F.type = "hidden", F.name = c, F.value = u.utils.stringifyJson(u.utils.unwrapObservable(e[c])), a.appendChild(F)
                            }
                            g(t, function(g, I) {
                                var e = s.createElement("input");
                                e.type = "hidden", e.name = g, e.value = I, a.appendChild(e)
                            }), s.body.appendChild(a), n.submitter ? n.submitter(a) : a.submit(), setTimeout(function() {
                                a.parentNode.removeChild(a)
                            }, 0)
                        }
                    }
                }(), u.exportSymbol("utils", u.utils), u.exportSymbol("utils.arrayForEach", u.utils.arrayForEach), u.exportSymbol("utils.arrayFirst", u.utils.arrayFirst), u.exportSymbol("utils.arrayFilter", u.utils.arrayFilter), u.exportSymbol("utils.arrayGetDistinctValues", u.utils.arrayGetDistinctValues), u.exportSymbol("utils.arrayIndexOf", u.utils.arrayIndexOf), u.exportSymbol("utils.arrayMap", u.utils.arrayMap), u.exportSymbol("utils.arrayPushAll", u.utils.arrayPushAll), u.exportSymbol("utils.arrayRemoveItem", u.utils.arrayRemoveItem), u.exportSymbol("utils.extend", u.utils.extend), u.exportSymbol("utils.fieldsIncludedWithJsonPost", u.utils.fieldsIncludedWithJsonPost), u.exportSymbol("utils.getFormFields", u.utils.getFormFields), u.exportSymbol("utils.peekObservable", u.utils.peekObservable), u.exportSymbol("utils.postJson", u.utils.postJson), u.exportSymbol("utils.parseJson", u.utils.parseJson), u.exportSymbol("utils.registerEventHandler", u.utils.registerEventHandler), u.exportSymbol("utils.stringifyJson", u.utils.stringifyJson), u.exportSymbol("utils.range", u.utils.range), u.exportSymbol("utils.toggleDomNodeCssClass", u.utils.toggleDomNodeCssClass), u.exportSymbol("utils.triggerEvent", u.utils.triggerEvent), u.exportSymbol("utils.unwrapObservable", u.utils.unwrapObservable), u.exportSymbol("utils.objectForEach", u.utils.objectForEach), u.exportSymbol("utils.addOrRemoveItem", u.utils.addOrRemoveItem), u.exportSymbol("utils.setTextContent", u.utils.setTextContent), u.exportSymbol("unwrap", u.utils.unwrapObservable), Function.prototype.bind || (Function.prototype.bind = function(g) {
                    var I = this;
                    if (1 === arguments.length) return function() {
                        return I.apply(g, arguments)
                    };
                    var e = Array.prototype.slice.call(arguments, 1);
                    return function() {
                        var n = e.slice(0);
                        return n.push.apply(n, arguments), I.apply(g, n)
                    }
                }), u.utils.domData = new function() {
                    function g(g, t) {
                        var C = g[e];
                        if (!C || "null" === C || !n[C]) {
                            if (!t) return l;
                            C = g[e] = "ko" + I++, n[C] = {}
                        }
                        return n[C]
                    }
                    var I = 0,
                        e = "__ko__" + (new Date).getTime(),
                        n = {};
                    return {
                        get: function(I, e) {
                            var n = g(I, !1);
                            return n === l ? l : n[e]
                        },
                        set: function(I, e, n) {
                            if (n !== l || g(I, !1) !== l) {
                                g(I, !0)[e] = n
                            }
                        },
                        clear: function(g) {
                            var I = g[e];
                            return !!I && (delete n[I], g[e] = null, !0)
                        },
                        nextKey: function() {
                            return I++ + e
                        }
                    }
                }, u.exportSymbol("utils.domData", u.utils.domData), u.exportSymbol("utils.domData.clear", u.utils.domData.clear), u.utils.domNodeDisposal = new function() {
                    function g(g, I) {
                        var e = u.utils.domData.get(g, t);
                        return e === l && I && (e = [], u.utils.domData.set(g, t, e)), e
                    }

                    function I(g) {
                        u.utils.domData.set(g, t, l)
                    }

                    function e(I) {
                        var e = g(I, !1);
                        if (e) {
                            e = e.slice(0);
                            for (var t = 0; t < e.length; t++) e[t](I)
                        }
                        u.utils.domData.clear(I), u.utils.domNodeDisposal.cleanExternalData(I), i[I.nodeType] && n(I)
                    }

                    function n(g) {
                        for (var I, n = g.firstChild; I = n;) n = I.nextSibling, 8 === I.nodeType && e(I)
                    }
                    var t = u.utils.domData.nextKey(),
                        C = {
                            1: !0,
                            8: !0,
                            9: !0
                        },
                        i = {
                            1: !0,
                            9: !0
                        };
                    return {
                        addDisposeCallback: function(I, e) {
                            if ("function" != typeof e) throw new Error("Callback must be a function");
                            g(I, !0).push(e)
                        },
                        removeDisposeCallback: function(e, n) {
                            var t = g(e, !1);
                            t && (u.utils.arrayRemoveItem(t, n), 0 == t.length && I(e))
                        },
                        cleanNode: function(g) {
                            if (C[g.nodeType] && (e(g), i[g.nodeType])) {
                                var I = [];
                                u.utils.arrayPushAll(I, g.getElementsByTagName("*"));
                                for (var n = 0, t = I.length; n < t; n++) e(I[n])
                            }
                            return g
                        },
                        removeNode: function(g) {
                            u.cleanNode(g), g.parentNode && g.parentNode.removeChild(g)
                        },
                        cleanExternalData: function(g) {
                            A && "function" == typeof A.cleanData && A.cleanData([g])
                        }
                    }
                }, u.cleanNode = u.utils.domNodeDisposal.cleanNode, u.removeNode = u.utils.domNodeDisposal.removeNode, u.exportSymbol("cleanNode", u.cleanNode), u.exportSymbol("removeNode", u.removeNode), u.exportSymbol("utils.domNodeDisposal", u.utils.domNodeDisposal), u.exportSymbol("utils.domNodeDisposal.addDisposeCallback", u.utils.domNodeDisposal.addDisposeCallback), u.exportSymbol("utils.domNodeDisposal.removeDisposeCallback", u.utils.domNodeDisposal.removeDisposeCallback),
                function() {
                    function g(g) {
                        var I = g.match(/^<([a-z]+)[ >]/);
                        return I && a[I[1]] || n
                    }

                    function I(I, e) {
                        e || (e = s);
                        var n = e.parentWindow || e.defaultView || i,
                            t = u.utils.stringTrim(I).toLowerCase(),
                            C = e.createElement("div"),
                            l = g(t),
                            B = l[0],
                            A = "ignored<div>" + l[1] + I + l[2] + "</div>";
                        for ("function" == typeof n.innerShiv ? C.appendChild(n.innerShiv(A)) : (c && e.appendChild(C), C.innerHTML = A, c && C.parentNode.removeChild(C)); B--;) C = C.lastChild;
                        return u.utils.makeArray(C.lastChild.childNodes)
                    }

                    function e(g, I) {
                        if (A.parseHTML) return A.parseHTML(g, I) || [];
                        var e = A.clean([g], I);
                        if (e && e[0]) {
                            for (var n = e[0]; n.parentNode && 11 !== n.parentNode.nodeType;) n = n.parentNode;
                            n.parentNode && n.parentNode.removeChild(n)
                        }
                        return e
                    }
                    var n = [0, "", ""],
                        t = [1, "<table>", "</table>"],
                        C = [2, "<table><tbody>", "</tbody></table>"],
                        B = [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                        Q = [1, "<select multiple='multiple'>", "</select>"],
                        a = {
                            thead: t,
                            tbody: t,
                            tfoot: t,
                            tr: C,
                            td: B,
                            th: B,
                            option: Q,
                            optgroup: Q
                        },
                        c = u.utils.ieVersion <= 8;
                    u.utils.parseHtmlFragment = function(g, n) {
                        return A ? e(g, n) : I(g, n)
                    }, u.utils.setHtml = function(g, I) {
                        if (u.utils.emptyDomNode(g), null !== (I = u.utils.unwrapObservable(I)) && I !== l)
                            if ("string" != typeof I && (I = I.toString()), A) A(g).html(I);
                            else
                                for (var e = u.utils.parseHtmlFragment(I, g.ownerDocument), n = 0; n < e.length; n++) g.appendChild(e[n])
                    }
                }(), u.exportSymbol("utils.parseHtmlFragment", u.utils.parseHtmlFragment), u.exportSymbol("utils.setHtml", u.utils.setHtml), u.memoization = function() {
                    function g() {
                        return (4294967296 * (1 + Math.random()) | 0).toString(16).substring(1)
                    }

                    function I() {
                        return g() + g()
                    }

                    function e(g, I) {
                        if (g)
                            if (8 == g.nodeType) {
                                var n = u.memoization.parseMemoText(g.nodeValue);
                                null != n && I.push({
                                    domNode: g,
                                    memoId: n
                                })
                            } else if (1 == g.nodeType)
                            for (var t = 0, C = g.childNodes, l = C.length; t < l; t++) e(C[t], I)
                    }
                    var n = {};
                    return {
                        memoize: function(g) {
                            if ("function" != typeof g) throw new Error("You can only pass a function to ko.memoization.memoize()");
                            var e = I();
                            return n[e] = g, "\x3c!--[ko_memo:" + e + "]--\x3e"
                        },
                        unmemoize: function(g, I) {
                            var e = n[g];
                            if (e === l) throw new Error("Couldn't find any memo with ID " + g + ". Perhaps it's already been unmemoized.");
                            try {
                                return e.apply(null, I || []), !0
                            } finally {
                                delete n[g]
                            }
                        },
                        unmemoizeDomNodeAndDescendants: function(g, I) {
                            var n = [];
                            e(g, n);
                            for (var t = 0, C = n.length; t < C; t++) {
                                var l = n[t].domNode,
                                    i = [l];
                                I && u.utils.arrayPushAll(i, I), u.memoization.unmemoize(n[t].memoId, i), l.nodeValue = "", l.parentNode && l.parentNode.removeChild(l)
                            }
                        },
                        parseMemoText: function(g) {
                            var I = g.match(/^\[ko_memo\:(.*?)\]$/);
                            return I ? I[1] : null
                        }
                    }
                }(), u.exportSymbol("memoization", u.memoization), u.exportSymbol("memoization.memoize", u.memoization.memoize), u.exportSymbol("memoization.unmemoize", u.memoization.unmemoize), u.exportSymbol("memoization.parseMemoText", u.memoization.parseMemoText), u.exportSymbol("memoization.unmemoizeDomNodeAndDescendants", u.memoization.unmemoizeDomNodeAndDescendants), u.tasks = function() {
                    function g() {
                        if (C)
                            for (var g, I = C, e = 0; B < C;)
                                if (g = t[B++]) {
                                    if (B > I) {
                                        if (++e >= 5e3) {
                                            B = C, u.utils.deferError(Error("'Too much recursion' after processing " + e + " task groups."));
                                            break
                                        }
                                        I = C
                                    }
                                    try {
                                        g()
                                    } catch (g) {
                                        u.utils.deferError(g)
                                    }
                                }
                    }

                    function I() {
                        g(), B = C = t.length = 0
                    }

                    function e() {
                        u.tasks.scheduler(I)
                    }
                    var n, t = [],
                        C = 0,
                        l = 1,
                        B = 0;
                    return n = i.MutationObserver ? function(g) {
                        var I = s.createElement("div");
                        return new MutationObserver(g).observe(I, {
                                attributes: !0
                            }),
                            function() {
                                I.classList.toggle("foo")
                            }
                    }(I) : s && "onreadystatechange" in s.createElement("script") ? function(g) {
                        var I = s.createElement("script");
                        I.onreadystatechange = function() {
                            I.onreadystatechange = null, s.documentElement.removeChild(I), I = null, g()
                        }, s.documentElement.appendChild(I)
                    } : function(g) {
                        setTimeout(g, 0)
                    }, {
                        scheduler: n,
                        schedule: function(g) {
                            return C || e(), t[C++] = g, l++
                        },
                        cancel: function(g) {
                            var I = g - (l - C);
                            I >= B && I < C && (t[I] = null)
                        },
                        resetForTesting: function() {
                            var g = C - B;
                            return B = C = t.length = 0, g
                        },
                        runEarly: g
                    }
                }(), u.exportSymbol("tasks", u.tasks), u.exportSymbol("tasks.schedule", u.tasks.schedule), u.exportSymbol("tasks.runEarly", u.tasks.runEarly), u.extenders = {
                    throttle: function(g, I) {
                        g.throttleEvaluation = I;
                        var e = null;
                        return u.dependentObservable({
                            read: g,
                            write: function(n) {
                                clearTimeout(e), e = u.utils.setTimeout(function() {
                                    g(n)
                                }, I)
                            }
                        })
                    },
                    rateLimit: function(g, I) {
                        var e, C, l;
                        "number" == typeof I ? e = I : (e = I.timeout, C = I.method), g._deferUpdates = !1, l = "notifyWhenChangesStop" == C ? t : n, g.limit(function(g) {
                            return l(g, e)
                        })
                    },
                    deferred: function(g, I) {
                        if (!0 !== I) throw new Error("The 'deferred' extender only accepts the value 'true', because it is not supported to turn deferral off once enabled.");
                        g._deferUpdates || (g._deferUpdates = !0, g.limit(function(I) {
                            var e, n = !1;
                            return function() {
                                if (!n) {
                                    u.tasks.cancel(e), e = u.tasks.schedule(I);
                                    try {
                                        n = !0, g.notifySubscribers(l, "dirty")
                                    } finally {
                                        n = !1
                                    }
                                }
                            }
                        }))
                    },
                    notify: function(g, I) {
                        g.equalityComparer = "always" == I ? null : e
                    }
                };
            var b = {
                undefined: 1,
                boolean: 1,
                number: 1,
                string: 1
            };
            u.exportSymbol("extenders", u.extenders), u.subscription = function(g, I, e) {
                this._target = g, this.callback = I, this.disposeCallback = e, this.isDisposed = !1, u.exportProperty(this, "dispose", this.dispose)
            }, u.subscription.prototype.dispose = function() {
                this.isDisposed = !0, this.disposeCallback()
            }, u.subscribable = function() {
                u.utils.setPrototypeOfOrExtend(this, U), U.init(this)
            };
            var o = "change",
                U = {
                    init: function(g) {
                        g._subscriptions = {
                            change: []
                        }, g._versionNumber = 1
                    },
                    subscribe: function(g, I, e) {
                        var n = this;
                        e = e || o;
                        var t = I ? g.bind(I) : g,
                            C = new u.subscription(n, t, function() {
                                u.utils.arrayRemoveItem(n._subscriptions[e], C), n.afterSubscriptionRemove && n.afterSubscriptionRemove(e)
                            });
                        return n.beforeSubscriptionAdd && n.beforeSubscriptionAdd(e), n._subscriptions[e] || (n._subscriptions[e] = []), n._subscriptions[e].push(C), C
                    },
                    notifySubscribers: function(g, I) {
                        if (I = I || o, I === o && this.updateVersion(), this.hasSubscriptionsForEvent(I)) {
                            var e = I === o && this._changeSubscriptions || this._subscriptions[I].slice(0);
                            try {
                                u.dependencyDetection.begin();
                                for (var n, t = 0; n = e[t]; ++t) n.isDisposed || n.callback(g)
                            } finally {
                                u.dependencyDetection.end()
                            }
                        }
                    },
                    getVersion: function() {
                        return this._versionNumber
                    },
                    hasChanged: function(g) {
                        return this.getVersion() !== g
                    },
                    updateVersion: function() {
                        ++this._versionNumber
                    },
                    limit: function(g) {
                        var I, e, n, t, C = this,
                            l = u.isObservable(C);
                        C._origNotifySubscribers || (C._origNotifySubscribers = C.notifySubscribers, C.notifySubscribers = a);
                        var i = g(function() {
                            C._notificationIsPending = !1, l && t === C && (t = C._evalIfChanged ? C._evalIfChanged() : C());
                            var g = e || C.isDifferent(n, t);
                            e = I = !1, g && C._origNotifySubscribers(n = t)
                        });
                        C._limitChange = function(g) {
                            C._changeSubscriptions = C._subscriptions[o].slice(0), C._notificationIsPending = I = !0, t = g, i()
                        }, C._limitBeforeChange = function(g) {
                            I || (n = g, C._origNotifySubscribers(g, "beforeChange"))
                        }, C._notifyNextChangeIfValueIsDifferent = function() {
                            C.isDifferent(n, C.peek(!0)) && (e = !0)
                        }
                    },
                    hasSubscriptionsForEvent: function(g) {
                        return this._subscriptions[g] && this._subscriptions[g].length
                    },
                    getSubscriptionsCount: function(g) {
                        if (g) return this._subscriptions[g] && this._subscriptions[g].length || 0;
                        var I = 0;
                        return u.utils.objectForEach(this._subscriptions, function(g, e) {
                            "dirty" !== g && (I += e.length)
                        }), I
                    },
                    isDifferent: function(g, I) {
                        return !this.equalityComparer || !this.equalityComparer(g, I)
                    },
                    extend: C
                };
            u.exportProperty(U, "subscribe", U.subscribe), u.exportProperty(U, "extend", U.extend), u.exportProperty(U, "getSubscriptionsCount", U.getSubscriptionsCount), u.utils.canSetPrototype && u.utils.setPrototypeOf(U, Function.prototype), u.subscribable.fn = U, u.isSubscribable = function(g) {
                return null != g && "function" == typeof g.subscribe && "function" == typeof g.notifySubscribers
            }, u.exportSymbol("subscribable", u.subscribable), u.exportSymbol("isSubscribable", u.isSubscribable), u.computedContext = u.dependencyDetection = function() {
                function g() {
                    return ++C
                }

                function I(g) {
                    t.push(n), n = g
                }

                function e() {
                    n = t.pop()
                }
                var n, t = [],
                    C = 0;
                return {
                    begin: I,
                    end: e,
                    registerDependency: function(I) {
                        if (n) {
                            if (!u.isSubscribable(I)) throw new Error("Only subscribable things can act as dependencies");
                            n.callback.call(n.callbackTarget, I, I._id || (I._id = g()))
                        }
                    },
                    ignore: function(g, n, t) {
                        try {
                            return I(), g.apply(n, t || [])
                        } finally {
                            e()
                        }
                    },
                    getDependenciesCount: function() {
                        if (n) return n.computed.getDependenciesCount()
                    },
                    isInitial: function() {
                        if (n) return n.isInitial
                    }
                }
            }(), u.exportSymbol("computedContext", u.computedContext), u.exportSymbol("computedContext.getDependenciesCount", u.computedContext.getDependenciesCount), u.exportSymbol("computedContext.isInitial", u.computedContext.isInitial), u.exportSymbol("ignoreDependencies", u.ignoreDependencies = u.dependencyDetection.ignore);
            var r = u.utils.createSymbolOrString("_latestValue");
            u.observable = function(g) {
                function I() {
                    return arguments.length > 0 ? (I.isDifferent(I[r], arguments[0]) && (I.valueWillMutate(), I[r] = arguments[0], I.valueHasMutated()), this) : (u.dependencyDetection.registerDependency(I), I[r])
                }
                return I[r] = g, u.utils.canSetPrototype || u.utils.extend(I, u.subscribable.fn), u.subscribable.fn.init(I), u.utils.setPrototypeOfOrExtend(I, G), u.options.deferUpdates && u.extenders.deferred(I, !0), I
            };
            var G = {
                equalityComparer: e,
                peek: function() {
                    return this[r]
                },
                valueHasMutated: function() {
                    this.notifySubscribers(this[r])
                },
                valueWillMutate: function() {
                    this.notifySubscribers(this[r], "beforeChange")
                }
            };
            u.utils.canSetPrototype && u.utils.setPrototypeOf(G, u.subscribable.fn);
            var m = u.observable.protoProperty = "__ko_proto__";
            G[m] = u.observable, u.hasPrototype = function(g, I) {
                return null !== g && g !== l && g[m] !== l && (g[m] === I || u.hasPrototype(g[m], I))
            }, u.isObservable = function(g) {
                return u.hasPrototype(g, u.observable)
            }, u.isWriteableObservable = function(g) {
                return "function" == typeof g && g[m] === u.observable || !("function" != typeof g || g[m] !== u.dependentObservable || !g.hasWriteFunction)
            }, u.exportSymbol("observable", u.observable), u.exportSymbol("isObservable", u.isObservable), u.exportSymbol("isWriteableObservable", u.isWriteableObservable), u.exportSymbol("isWritableObservable", u.isWriteableObservable), u.exportSymbol("observable.fn", G), u.exportProperty(G, "peek", G.peek), u.exportProperty(G, "valueHasMutated", G.valueHasMutated), u.exportProperty(G, "valueWillMutate", G.valueWillMutate), u.observableArray = function(g) {
                if ("object" != typeof(g = g || []) || !("length" in g)) throw new Error("The argument passed when initializing an observable array must be an array, or null, or undefined.");
                var I = u.observable(g);
                return u.utils.setPrototypeOfOrExtend(I, u.observableArray.fn), I.extend({
                    trackArrayChanges: !0
                })
            }, u.observableArray.fn = {
                remove: function(g) {
                    for (var I = this.peek(), e = [], n = "function" != typeof g || u.isObservable(g) ? function(I) {
                            return I === g
                        } : g, t = 0; t < I.length; t++) {
                        var C = I[t];
                        n(C) && (0 === e.length && this.valueWillMutate(), e.push(C), I.splice(t, 1), t--)
                    }
                    return e.length && this.valueHasMutated(), e
                },
                removeAll: function(g) {
                    if (g === l) {
                        var I = this.peek(),
                            e = I.slice(0);
                        return this.valueWillMutate(), I.splice(0, I.length), this.valueHasMutated(), e
                    }
                    return g ? this.remove(function(I) {
                        return u.utils.arrayIndexOf(g, I) >= 0
                    }) : []
                },
                destroy: function(g) {
                    var I = this.peek(),
                        e = "function" != typeof g || u.isObservable(g) ? function(I) {
                            return I === g
                        } : g;
                    this.valueWillMutate();
                    for (var n = I.length - 1; n >= 0; n--) {
                        e(I[n]) && (I[n]._destroy = !0)
                    }
                    this.valueHasMutated()
                },
                destroyAll: function(g) {
                    return g === l ? this.destroy(function() {
                        return !0
                    }) : g ? this.destroy(function(I) {
                        return u.utils.arrayIndexOf(g, I) >= 0
                    }) : []
                },
                indexOf: function(g) {
                    var I = this();
                    return u.utils.arrayIndexOf(I, g)
                },
                replace: function(g, I) {
                    var e = this.indexOf(g);
                    e >= 0 && (this.valueWillMutate(), this.peek()[e] = I, this.valueHasMutated())
                }
            }, u.utils.canSetPrototype && u.utils.setPrototypeOf(u.observableArray.fn, u.observable.fn), u.utils.arrayForEach(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function(g) {
                u.observableArray.fn[g] = function() {
                    var I = this.peek();
                    this.valueWillMutate(), this.cacheDiffForKnownOperation(I, g, arguments);
                    var e = I[g].apply(I, arguments);
                    return this.valueHasMutated(), e === I ? this : e
                }
            }), u.utils.arrayForEach(["slice"], function(g) {
                u.observableArray.fn[g] = function() {
                    var I = this();
                    return I[g].apply(I, arguments)
                }
            }), u.exportSymbol("observableArray", u.observableArray);
            var Z = "arrayChange";
            u.extenders.trackArrayChanges = function(g, I) {
                function e() {
                    if (!i) {
                        i = !0, C = g.notifySubscribers, g.notifySubscribers = function(g, I) {
                            return I && I !== o || ++B, C.apply(this, arguments)
                        };
                        var I = [].concat(g.peek() || []);
                        s = null, t = g.subscribe(function(e) {
                            if (e = [].concat(e || []), g.hasSubscriptionsForEvent(Z)) var t = n(I, e);
                            I = e, s = null, B = 0, t && t.length && g.notifySubscribers(t, Z)
                        })
                    }
                }

                function n(I, e) {
                    return (!s || B > 1) && (s = u.utils.compareArrays(I, e, g.compareArrayOptions)), s
                }
                if (g.compareArrayOptions = {}, I && "object" == typeof I && u.utils.extend(g.compareArrayOptions, I), g.compareArrayOptions.sparse = !0, !g.cacheDiffForKnownOperation) {
                    var t, C, i = !1,
                        s = null,
                        B = 0,
                        A = g.beforeSubscriptionAdd,
                        Q = g.afterSubscriptionRemove;
                    g.beforeSubscriptionAdd = function(I) {
                        A && A.call(g, I), I === Z && e()
                    }, g.afterSubscriptionRemove = function(I) {
                        Q && Q.call(g, I), I !== Z || g.hasSubscriptionsForEvent(Z) || (C && (g.notifySubscribers = C, C = l), t.dispose(), i = !1)
                    }, g.cacheDiffForKnownOperation = function(g, I, e) {
                        function n(g, I, e) {
                            return t[t.length] = {
                                status: g,
                                value: I,
                                index: e
                            }
                        }
                        if (i && !B) {
                            var t = [],
                                C = g.length,
                                l = e.length,
                                A = 0;
                            switch (I) {
                                case "push":
                                    A = C;
                                case "unshift":
                                    for (var Q = 0; Q < l; Q++) n("added", e[Q], A + Q);
                                    break;
                                case "pop":
                                    A = C - 1;
                                case "shift":
                                    C && n("deleted", g[A], A);
                                    break;
                                case "splice":
                                    for (var a = Math.min(Math.max(0, e[0] < 0 ? C + e[0] : e[0]), C), c = 1 === l ? C : Math.min(a + (e[1] || 0), C), F = a + l - 2, d = Math.max(c, F), b = [], o = [], Q = a, U = 2; Q < d; ++Q, ++U) Q < c && o.push(n("deleted", g[Q], Q)), Q < F && b.push(n("added", e[U], Q));
                                    u.utils.findMovesInArrayComparison(o, b);
                                    break;
                                default:
                                    return
                            }
                            s = t
                        }
                    }
                }
            };
            var V = u.utils.createSymbolOrString("_state");
            u.computed = u.dependentObservable = function(g, I, e) {
                function n() {
                    if (arguments.length > 0) {
                        if ("function" != typeof t) throw new Error("Cannot write a value to a ko.computed unless you specify a 'write' option. If you wish to read the current value, don't pass any parameters.");
                        return t.apply(C.evaluatorFunctionTarget, arguments), this
                    }
                    return u.dependencyDetection.registerDependency(n), (C.isDirty || C.isSleeping && n.haveDependenciesChanged()) && n.evaluateImmediate(), C.latestValue
                }
                if ("object" == typeof g ? e = g : (e = e || {}, g && (e.read = g)), "function" != typeof e.read) throw Error("Pass a function that returns the value of the ko.computed");
                var t = e.write,
                    C = {
                        latestValue: l,
                        isStale: !0,
                        isDirty: !0,
                        isBeingEvaluated: !1,
                        suppressDisposalUntilDisposeWhenReturnsFalse: !1,
                        isDisposed: !1,
                        pure: !1,
                        isSleeping: !1,
                        readFunction: e.read,
                        evaluatorFunctionTarget: I || e.owner,
                        disposeWhenNodeIsRemoved: e.disposeWhenNodeIsRemoved || e.disposeWhenNodeIsRemoved || null,
                        disposeWhen: e.disposeWhen || e.disposeWhen,
                        domNodeDisposalCallback: null,
                        dependencyTracking: {},
                        dependenciesCount: 0,
                        evaluationTimeoutInstance: null
                    };
                return n[V] = C, n.hasWriteFunction = "function" == typeof t, u.utils.canSetPrototype || u.utils.extend(n, u.subscribable.fn), u.subscribable.fn.init(n), u.utils.setPrototypeOfOrExtend(n, W), e.pure ? (C.pure = !0, C.isSleeping = !0, u.utils.extend(n, h)) : e.deferEvaluation && u.utils.extend(n, x), u.options.deferUpdates && u.extenders.deferred(n, !0), n._options = e, C.disposeWhenNodeIsRemoved && (C.suppressDisposalUntilDisposeWhenReturnsFalse = !0, C.disposeWhenNodeIsRemoved.nodeType || (C.disposeWhenNodeIsRemoved = null)), C.isSleeping || e.deferEvaluation || n.evaluateImmediate(), C.disposeWhenNodeIsRemoved && n.isActive() && u.utils.domNodeDisposal.addDisposeCallback(C.disposeWhenNodeIsRemoved, C.domNodeDisposalCallback = function() {
                    n.dispose()
                }), n
            };
            var W = {
                    equalityComparer: e,
                    getDependenciesCount: function() {
                        return this[V].dependenciesCount
                    },
                    addDependencyTracking: function(g, I, e) {
                        if (this[V].pure && I === this) throw Error("A 'pure' computed must not be called recursively");
                        this[V].dependencyTracking[g] = e, e._order = this[V].dependenciesCount++, e._version = I.getVersion()
                    },
                    haveDependenciesChanged: function() {
                        var g, I, e = this[V].dependencyTracking;
                        for (g in e)
                            if (e.hasOwnProperty(g) && (I = e[g], this._evalDelayed && I._target._notificationIsPending || I._target.hasChanged(I._version))) return !0
                    },
                    markDirty: function() {
                        this._evalDelayed && !this[V].isBeingEvaluated && this._evalDelayed(!1)
                    },
                    isActive: function() {
                        var g = this[V];
                        return g.isDirty || g.dependenciesCount > 0
                    },
                    respondToChange: function() {
                        this._notificationIsPending ? this[V].isDirty && (this[V].isStale = !0) : this.evaluatePossiblyAsync()
                    },
                    subscribeToDependency: function(g) {
                        if (g._deferUpdates && !this[V].disposeWhenNodeIsRemoved) {
                            var I = g.subscribe(this.markDirty, this, "dirty"),
                                e = g.subscribe(this.respondToChange, this);
                            return {
                                _target: g,
                                dispose: function() {
                                    I.dispose(), e.dispose()
                                }
                            }
                        }
                        return g.subscribe(this.evaluatePossiblyAsync, this)
                    },
                    evaluatePossiblyAsync: function() {
                        var g = this,
                            I = g.throttleEvaluation;
                        I && I >= 0 ? (clearTimeout(this[V].evaluationTimeoutInstance), this[V].evaluationTimeoutInstance = u.utils.setTimeout(function() {
                            g.evaluateImmediate(!0)
                        }, I)) : g._evalDelayed ? g._evalDelayed(!0) : g.evaluateImmediate(!0)
                    },
                    evaluateImmediate: function(g) {
                        var I = this,
                            e = I[V],
                            n = e.disposeWhen,
                            t = !1;
                        if (!e.isBeingEvaluated && !e.isDisposed) {
                            if (e.disposeWhenNodeIsRemoved && !u.utils.domNodeIsAttachedToDocument(e.disposeWhenNodeIsRemoved) || n && n()) {
                                if (!e.suppressDisposalUntilDisposeWhenReturnsFalse) return void I.dispose()
                            } else e.suppressDisposalUntilDisposeWhenReturnsFalse = !1;
                            e.isBeingEvaluated = !0;
                            try {
                                t = this.evaluateImmediate_CallReadWithDependencyDetection(g)
                            } finally {
                                e.isBeingEvaluated = !1
                            }
                            return e.dependenciesCount || I.dispose(), t
                        }
                    },
                    evaluateImmediate_CallReadWithDependencyDetection: function(g) {
                        var I = this,
                            e = I[V],
                            n = !1,
                            t = e.pure ? l : !e.dependenciesCount,
                            C = {
                                computedObservable: I,
                                disposalCandidates: e.dependencyTracking,
                                disposalCount: e.dependenciesCount
                            };
                        u.dependencyDetection.begin({
                            callbackTarget: C,
                            callback: F,
                            computed: I,
                            isInitial: t
                        }), e.dependencyTracking = {}, e.dependenciesCount = 0;
                        var i = this.evaluateImmediate_CallReadThenEndDependencyDetection(e, C);
                        return I.isDifferent(e.latestValue, i) && (e.isSleeping || I.notifySubscribers(e.latestValue, "beforeChange"), e.latestValue = i, I._latestValue = i, e.isSleeping ? I.updateVersion() : g && I.notifySubscribers(e.latestValue), n = !0), t && I.notifySubscribers(e.latestValue, "awake"), n
                    },
                    evaluateImmediate_CallReadThenEndDependencyDetection: function(g, I) {
                        try {
                            var e = g.readFunction;
                            return g.evaluatorFunctionTarget ? e.call(g.evaluatorFunctionTarget) : e()
                        } finally {
                            u.dependencyDetection.end(), I.disposalCount && !g.isSleeping && u.utils.objectForEach(I.disposalCandidates, c), g.isStale = g.isDirty = !1
                        }
                    },
                    peek: function(g) {
                        var I = this[V];
                        return (I.isDirty && (g || !I.dependenciesCount) || I.isSleeping && this.haveDependenciesChanged()) && this.evaluateImmediate(), I.latestValue
                    },
                    limit: function(g) {
                        u.subscribable.fn.limit.call(this, g), this._evalIfChanged = function() {
                            return this[V].isStale ? this.evaluateImmediate() : this[V].isDirty = !1, this[V].latestValue
                        }, this._evalDelayed = function(g) {
                            this._limitBeforeChange(this[V].latestValue), this[V].isDirty = !0, g && (this[V].isStale = !0), this._limitChange(this)
                        }
                    },
                    dispose: function() {
                        var g = this[V];
                        !g.isSleeping && g.dependencyTracking && u.utils.objectForEach(g.dependencyTracking, function(g, I) {
                            I.dispose && I.dispose()
                        }), g.disposeWhenNodeIsRemoved && g.domNodeDisposalCallback && u.utils.domNodeDisposal.removeDisposeCallback(g.disposeWhenNodeIsRemoved, g.domNodeDisposalCallback), g.dependencyTracking = null, g.dependenciesCount = 0, g.isDisposed = !0, g.isStale = !1, g.isDirty = !1, g.isSleeping = !1, g.disposeWhenNodeIsRemoved = null
                    }
                },
                h = {
                    beforeSubscriptionAdd: function(g) {
                        var I = this,
                            e = I[V];
                        if (!e.isDisposed && e.isSleeping && "change" == g) {
                            if (e.isSleeping = !1, e.isStale || I.haveDependenciesChanged()) e.dependencyTracking = null, e.dependenciesCount = 0, I.evaluateImmediate() && I.updateVersion();
                            else {
                                var n = [];
                                u.utils.objectForEach(e.dependencyTracking, function(g, I) {
                                    n[I._order] = g
                                }), u.utils.arrayForEach(n, function(g, n) {
                                    var t = e.dependencyTracking[g],
                                        C = I.subscribeToDependency(t._target);
                                    C._order = n, C._version = t._version, e.dependencyTracking[g] = C
                                })
                            }
                            e.isDisposed || I.notifySubscribers(e.latestValue, "awake")
                        }
                    },
                    afterSubscriptionRemove: function(g) {
                        var I = this[V];
                        I.isDisposed || "change" != g || this.hasSubscriptionsForEvent("change") || (u.utils.objectForEach(I.dependencyTracking, function(g, e) {
                            e.dispose && (I.dependencyTracking[g] = {
                                _target: e._target,
                                _order: e._order,
                                _version: e._version
                            }, e.dispose())
                        }), I.isSleeping = !0, this.notifySubscribers(l, "asleep"))
                    },
                    getVersion: function() {
                        var g = this[V];
                        return g.isSleeping && (g.isStale || this.haveDependenciesChanged()) && this.evaluateImmediate(), u.subscribable.fn.getVersion.call(this)
                    }
                },
                x = {
                    beforeSubscriptionAdd: function(g) {
                        "change" != g && "beforeChange" != g || this.peek()
                    }
                };
            u.utils.canSetPrototype && u.utils.setPrototypeOf(W, u.subscribable.fn);
            var y = u.observable.protoProperty;
            u.computed[y] = u.observable, W[y] = u.computed, u.isComputed = function(g) {
                    return u.hasPrototype(g, u.computed)
                }, u.isPureComputed = function(g) {
                    return u.hasPrototype(g, u.computed) && g[V] && g[V].pure
                }, u.exportSymbol("computed", u.computed), u.exportSymbol("dependentObservable", u.computed), u.exportSymbol("isComputed", u.isComputed), u.exportSymbol("isPureComputed", u.isPureComputed), u.exportSymbol("computed.fn", W), u.exportProperty(W, "peek", W.peek), u.exportProperty(W, "dispose", W.dispose), u.exportProperty(W, "isActive", W.isActive), u.exportProperty(W, "getDependenciesCount", W.getDependenciesCount), u.pureComputed = function(g, I) {
                    return "function" == typeof g ? u.computed(g, I, {
                        pure: !0
                    }) : (g = u.utils.extend({}, g), g.pure = !0, u.computed(g, I))
                }, u.exportSymbol("pureComputed", u.pureComputed),
                function() {
                    function g(n, t, C) {
                        if (C = C || new e, !!("object" != typeof(n = t(n)) || null === n || n === l || n instanceof RegExp || n instanceof Date || n instanceof String || n instanceof Number || n instanceof Boolean)) return n;
                        var i = n instanceof Array ? [] : {};
                        return C.save(n, i), I(n, function(I) {
                            var e = t(n[I]);
                            switch (typeof e) {
                                case "boolean":
                                case "number":
                                case "string":
                                case "function":
                                    i[I] = e;
                                    break;
                                case "object":
                                case "undefined":
                                    var s = C.get(e);
                                    i[I] = s !== l ? s : g(e, t, C)
                            }
                        }), i
                    }

                    function I(g, I) {
                        if (g instanceof Array) {
                            for (var e = 0; e < g.length; e++) I(e);
                            "function" == typeof g.toJSON && I("toJSON")
                        } else
                            for (var n in g) I(n)
                    }

                    function e() {
                        this.keys = [], this.values = []
                    }
                    u.toJS = function(I) {
                        if (0 == arguments.length) throw new Error("When calling ko.toJS, pass the object you want to convert.");
                        return g(I, function(g) {
                            for (var I = 0; u.isObservable(g) && I < 10; I++) g = g();
                            return g
                        })
                    }, u.toJSON = function(g, I, e) {
                        var n = u.toJS(g);
                        return u.utils.stringifyJson(n, I, e)
                    }, e.prototype = {
                        constructor: e,
                        save: function(g, I) {
                            var e = u.utils.arrayIndexOf(this.keys, g);
                            e >= 0 ? this.values[e] = I : (this.keys.push(g), this.values.push(I))
                        },
                        get: function(g) {
                            var I = u.utils.arrayIndexOf(this.keys, g);
                            return I >= 0 ? this.values[I] : l
                        }
                    }
                }(), u.exportSymbol("toJS", u.toJS), u.exportSymbol("toJSON", u.toJSON),
                function() {
                    u.selectExtensions = {
                        readValue: function(g) {
                            switch (u.utils.tagNameLower(g)) {
                                case "option":
                                    return !0 === g.__ko__hasDomDataOptionValue__ ? u.utils.domData.get(g, u.bindingHandlers.options.optionValueDomDataKey) : u.utils.ieVersion <= 7 ? g.getAttributeNode("value") && g.getAttributeNode("value").specified ? g.value : g.text : g.value;
                                case "select":
                                    return g.selectedIndex >= 0 ? u.selectExtensions.readValue(g.options[g.selectedIndex]) : l;
                                default:
                                    return g.value
                            }
                        },
                        writeValue: function(g, I, e) {
                            switch (u.utils.tagNameLower(g)) {
                                case "option":
                                    switch (typeof I) {
                                        case "string":
                                            u.utils.domData.set(g, u.bindingHandlers.options.optionValueDomDataKey, l), "__ko__hasDomDataOptionValue__" in g && delete g.__ko__hasDomDataOptionValue__, g.value = I;
                                            break;
                                        default:
                                            u.utils.domData.set(g, u.bindingHandlers.options.optionValueDomDataKey, I), g.__ko__hasDomDataOptionValue__ = !0, g.value = "number" == typeof I ? I : ""
                                    }
                                    break;
                                case "select":
                                    "" !== I && null !== I || (I = l);
                                    for (var n, t = -1, C = 0, i = g.options.length; C < i; ++C)
                                        if ((n = u.selectExtensions.readValue(g.options[C])) == I || "" == n && I === l) {
                                            t = C;
                                            break
                                        }(e || t >= 0 || I === l && g.size > 1) && (g.selectedIndex = t);
                                    break;
                                default:
                                    null !== I && I !== l || (I = ""), g.value = I
                            }
                        }
                    }
                }(), u.exportSymbol("selectExtensions", u.selectExtensions), u.exportSymbol("selectExtensions.readValue", u.selectExtensions.readValue), u.exportSymbol("selectExtensions.writeValue", u.selectExtensions.writeValue), u.expressionRewriting = function() {
                    function g(g) {
                        if (u.utils.arrayIndexOf(n, g) >= 0) return !1;
                        var I = g.match(t);
                        return null !== I && (I[1] ? "Object(" + I[1] + ")" + I[2] : g)
                    }

                    function I(g) {
                        var I = u.utils.stringTrim(g);
                        123 === I.charCodeAt(0) && (I = I.slice(1, -1));
                        var e, n = [],
                            t = I.match(C),
                            s = [],
                            B = 0;
                        if (t) {
                            t.push(",");
                            for (var A, Q = 0; A = t[Q]; ++Q) {
                                var a = A.charCodeAt(0);
                                if (44 === a) {
                                    if (B <= 0) {
                                        n.push(e && s.length ? {
                                            key: e,
                                            value: s.join("")
                                        } : {
                                            unknown: e || s.join("")
                                        }), e = B = 0, s = [];
                                        continue
                                    }
                                } else if (58 === a) {
                                    if (!B && !e && 1 === s.length) {
                                        e = s.pop();
                                        continue
                                    }
                                } else if (47 === a && Q && A.length > 1) {
                                    var c = t[Q - 1].match(l);
                                    c && !i[c[0]] && (I = I.substr(I.indexOf(A) + 1), t = I.match(C), t.push(","), Q = -1, A = "/")
                                } else 40 === a || 123 === a || 91 === a ? ++B : 41 === a || 125 === a || 93 === a ? --B : e || s.length || 34 !== a && 39 !== a || (A = A.slice(1, -1));
                                s.push(A)
                            }
                        }
                        return n
                    }

                    function e(e, n) {
                        function t(I, e) {
                            var n;
                            if (!B) {
                                if (! function(g) {
                                        return !g || !g.preprocess || (e = g.preprocess(e, I, t))
                                    }(u.getBindingHandler(I))) return;
                                s[I] && (n = g(e)) && l.push("'" + I + "':function(_z){" + n + "=_z}")
                            }
                            i && (e = "function(){return " + e + " }"), C.push("'" + I + "':" + e)
                        }
                        n = n || {};
                        var C = [],
                            l = [],
                            i = n.valueAccessors,
                            B = n.bindingParams,
                            A = "string" == typeof e ? I(e) : e;
                        return u.utils.arrayForEach(A, function(g) {
                            t(g.key || g.unknown, g.value)
                        }), l.length && t("_ko_property_writers", "{" + l.join(",") + " }"), C.join(",")
                    }
                    var n = ["true", "false", "null", "undefined"],
                        t = /^(?:[$_a-z][$\w]*|(.+)(\.\s*[$_a-z][$\w]*|\[.+\]))$/i,
                        C = RegExp("\"(?:[^\"\\\\]|\\\\.)*\"|'(?:[^'\\\\]|\\\\.)*'|/(?:[^/\\\\]|\\\\.)*/w*|[^\\s:,/][^,\"'{}()/:[\\]]*[^\\s,\"'{}()/:[\\]]|[^\\s]", "g"),
                        l = /[\])"'A-Za-z0-9_$]+$/,
                        i = {
                            in: 1,
                            return: 1,
                            typeof: 1
                        },
                        s = {};
                    return {
                        bindingRewriteValidators: [],
                        twoWayBindings: s,
                        parseObjectLiteral: I,
                        preProcessBindings: e,
                        keyValueArrayContainsKey: function(g, I) {
                            for (var e = 0; e < g.length; e++)
                                if (g[e].key == I) return !0;
                            return !1
                        },
                        writeValueToProperty: function(g, I, e, n, t) {
                            if (g && u.isObservable(g)) !u.isWriteableObservable(g) || t && g.peek() === n || g(n);
                            else {
                                var C = I.get("_ko_property_writers");
                                C && C[e] && C[e](n)
                            }
                        }
                    }
                }(), u.exportSymbol("expressionRewriting", u.expressionRewriting), u.exportSymbol("expressionRewriting.bindingRewriteValidators", u.expressionRewriting.bindingRewriteValidators), u.exportSymbol("expressionRewriting.parseObjectLiteral", u.expressionRewriting.parseObjectLiteral), u.exportSymbol("expressionRewriting.preProcessBindings", u.expressionRewriting.preProcessBindings), u.exportSymbol("expressionRewriting._twoWayBindings", u.expressionRewriting.twoWayBindings), u.exportSymbol("jsonExpressionRewriting", u.expressionRewriting), u.exportSymbol("jsonExpressionRewriting.insertPropertyAccessorsIntoJson", u.expressionRewriting.preProcessBindings),
                function() {
                    function g(g) {
                        return 8 == g.nodeType && l.test(C ? g.text : g.nodeValue)
                    }

                    function I(g) {
                        return 8 == g.nodeType && i.test(C ? g.text : g.nodeValue)
                    }

                    function e(e, n) {
                        for (var t = e, C = 1, l = []; t = t.nextSibling;) {
                            if (I(t) && 0 === --C) return l;
                            l.push(t), g(t) && C++
                        }
                        if (!n) throw new Error("Cannot find closing comment tag to match: " + e.nodeValue);
                        return null
                    }

                    function n(g, I) {
                        var n = e(g, I);
                        return n ? n.length > 0 ? n[n.length - 1].nextSibling : g.nextSibling : null
                    }

                    function t(e) {
                        var t = e.firstChild,
                            C = null;
                        if (t)
                            do {
                                if (C) C.push(t);
                                else if (g(t)) {
                                    var l = n(t, !0);
                                    l ? t = l : C = [t]
                                } else I(t) && (C = [t])
                            } while (t = t.nextSibling);
                        return C
                    }
                    var C = s && "\x3c!--test--\x3e" === s.createComment("test").text,
                        l = C ? /^<!--\s*ko(?:\s+([\s\S]+))?\s*-->$/ : /^\s*ko(?:\s+([\s\S]+))?\s*$/,
                        i = C ? /^<!--\s*\/ko\s*-->$/ : /^\s*\/ko\s*$/,
                        B = {
                            ul: !0,
                            ol: !0
                        };
                    u.virtualElements = {
                        allowedBindings: {},
                        childNodes: function(I) {
                            return g(I) ? e(I) : I.childNodes
                        },
                        emptyNode: function(I) {
                            if (g(I))
                                for (var e = u.virtualElements.childNodes(I), n = 0, t = e.length; n < t; n++) u.removeNode(e[n]);
                            else u.utils.emptyDomNode(I)
                        },
                        setDomNodeChildren: function(I, e) {
                            if (g(I)) {
                                u.virtualElements.emptyNode(I);
                                for (var n = I.nextSibling, t = 0, C = e.length; t < C; t++) n.parentNode.insertBefore(e[t], n)
                            } else u.utils.setDomNodeChildren(I, e)
                        },
                        prepend: function(I, e) {
                            g(I) ? I.parentNode.insertBefore(e, I.nextSibling) : I.firstChild ? I.insertBefore(e, I.firstChild) : I.appendChild(e)
                        },
                        insertAfter: function(I, e, n) {
                            n ? g(I) ? I.parentNode.insertBefore(e, n.nextSibling) : n.nextSibling ? I.insertBefore(e, n.nextSibling) : I.appendChild(e) : u.virtualElements.prepend(I, e)
                        },
                        firstChild: function(e) {
                            return g(e) ? !e.nextSibling || I(e.nextSibling) ? null : e.nextSibling : e.firstChild
                        },
                        nextSibling: function(e) {
                            return g(e) && (e = n(e)), e.nextSibling && I(e.nextSibling) ? null : e.nextSibling
                        },
                        hasBindingValue: g,
                        virtualNodeBindingValue: function(g) {
                            var I = (C ? g.text : g.nodeValue).match(l);
                            return I ? I[1] : null
                        },
                        normaliseVirtualElementDomStructure: function(g) {
                            if (B[u.utils.tagNameLower(g)]) {
                                var I = g.firstChild;
                                if (I)
                                    do {
                                        if (1 === I.nodeType) {
                                            var e = t(I);
                                            if (e)
                                                for (var n = I.nextSibling, C = 0; C < e.length; C++) n ? g.insertBefore(e[C], n) : g.appendChild(e[C])
                                        }
                                    } while (I = I.nextSibling)
                            }
                        }
                    }
                }(), u.exportSymbol("virtualElements", u.virtualElements), u.exportSymbol("virtualElements.allowedBindings", u.virtualElements.allowedBindings), u.exportSymbol("virtualElements.emptyNode", u.virtualElements.emptyNode), u.exportSymbol("virtualElements.insertAfter", u.virtualElements.insertAfter), u.exportSymbol("virtualElements.prepend", u.virtualElements.prepend), u.exportSymbol("virtualElements.setDomNodeChildren", u.virtualElements.setDomNodeChildren),
                function() {
                    function g(g, e, n) {
                        var t = g + (n && n.valueAccessors || "");
                        return e[t] || (e[t] = I(g, n))
                    }

                    function I(g, I) {
                        var e = u.expressionRewriting.preProcessBindings(g, I),
                            n = "with($context){with($data||{}){return{" + e + "}}}";
                        return new Function("$context", "$element", n)
                    }
                    u.bindingProvider = function() {
                        this.bindingCache = {}
                    }, u.utils.extend(u.bindingProvider.prototype, {
                        nodeHasBindings: function(g) {
                            switch (g.nodeType) {
                                case 1:
                                    return null != g.getAttribute("data-bind") || u.components.getComponentNameForNode(g);
                                case 8:
                                    return u.virtualElements.hasBindingValue(g);
                                default:
                                    return !1
                            }
                        },
                        getBindings: function(g, I) {
                            var e = this.getBindingsString(g, I),
                                n = e ? this.parseBindingsString(e, I, g) : null;
                            return u.components.addBindingsForCustomElement(n, g, I, !1)
                        },
                        getBindingAccessors: function(g, I) {
                            var e = this.getBindingsString(g, I),
                                n = e ? this.parseBindingsString(e, I, g, {
                                    valueAccessors: !0
                                }) : null;
                            return u.components.addBindingsForCustomElement(n, g, I, !0)
                        },
                        getBindingsString: function(g, I) {
                            switch (g.nodeType) {
                                case 1:
                                    return g.getAttribute("data-bind");
                                case 8:
                                    return u.virtualElements.virtualNodeBindingValue(g);
                                default:
                                    return null
                            }
                        },
                        parseBindingsString: function(I, e, n, t) {
                            try {
                                return g(I, this.bindingCache, t)(e, n)
                            } catch (g) {
                                throw g.message = "Unable to parse bindings.\nBindings value: " + I + "\nMessage: " + g.message, g
                            }
                        }
                    }), u.bindingProvider.instance = new u.bindingProvider
                }(), u.exportSymbol("bindingProvider", u.bindingProvider),
                function() {
                    function g(g) {
                        return function() {
                            return g
                        }
                    }

                    function I(g) {
                        return g()
                    }

                    function e(g) {
                        return u.utils.objectMap(u.dependencyDetection.ignore(g), function(I, e) {
                            return function() {
                                return g()[e]
                            }
                        })
                    }

                    function n(I, n, t) {
                        return "function" == typeof I ? e(I.bind(null, n, t)) : u.utils.objectMap(I, g)
                    }

                    function t(g, I) {
                        return e(this.getBindings.bind(this, g, I))
                    }

                    function C(g) {
                        if (!u.virtualElements.allowedBindings[g]) throw new Error("The binding '" + g + "' cannot be used with virtual elements")
                    }

                    function s(g, I, e) {
                        var n, t = u.virtualElements.firstChild(I),
                            C = u.bindingProvider.instance,
                            l = C.preprocessNode;
                        if (l) {
                            for (; n = t;) t = u.virtualElements.nextSibling(n), l.call(C, n);
                            t = u.virtualElements.firstChild(I)
                        }
                        for (; n = t;) t = u.virtualElements.nextSibling(n), B(g, n, e)
                    }

                    function B(g, I, e) {
                        var n = !0,
                            t = 1 === I.nodeType;
                        t && u.virtualElements.normaliseVirtualElementDomStructure(I), (t && e || u.bindingProvider.instance.nodeHasBindings(I)) && (n = a(I, null, g, e).shouldBindDescendants), n && !F[u.utils.tagNameLower(I)] && s(g, I, !t)
                    }

                    function Q(g) {
                        var I = [],
                            e = {},
                            n = [];
                        return u.utils.objectForEach(g, function t(C) {
                            if (!e[C]) {
                                var l = u.getBindingHandler(C);
                                l && (l.after && (n.push(C), u.utils.arrayForEach(l.after, function(I) {
                                    if (g[I]) {
                                        if (-1 !== u.utils.arrayIndexOf(n, I)) throw Error("Cannot combine the following bindings, because they have a cyclic dependency: " + n.join(", "));
                                        t(I)
                                    }
                                }), n.length--), I.push({
                                    key: C,
                                    handler: l
                                })), e[C] = !0
                            }
                        }), I
                    }

                    function a(g, e, n, i) {
                        function s() {
                            return u.utils.objectMap(F ? F() : A, I)
                        }
                        var B = u.utils.domData.get(g, d);
                        if (!e) {
                            if (B) throw Error("You cannot apply bindings multiple times to the same element.");
                            u.utils.domData.set(g, d, !0)
                        }!B && i && u.storedBindingContextForNode(g, n);
                        var A;
                        if (e && "function" != typeof e) A = e;
                        else {
                            var a = u.bindingProvider.instance,
                                c = a.getBindingAccessors || t,
                                F = u.dependentObservable(function() {
                                    return A = e ? e(n, g) : c.call(a, g, n), A && n._subscribable && n._subscribable(), A
                                }, null, {
                                    disposeWhenNodeIsRemoved: g
                                });
                            A && F.isActive() || (F = null)
                        }
                        var b;
                        if (A) {
                            var o = F ? function(g) {
                                return function() {
                                    return I(F()[g])
                                }
                            } : function(g) {
                                return A[g]
                            };
                            s.get = function(g) {
                                return A[g] && I(o(g))
                            }, s.has = function(g) {
                                return g in A
                            };
                            var U = Q(A);
                            u.utils.arrayForEach(U, function(I) {
                                var e = I.handler.init,
                                    t = I.handler.update,
                                    i = I.key;
                                8 === g.nodeType && C(i);
                                try {
                                    "function" == typeof e && u.dependencyDetection.ignore(function() {
                                        var I = e(g, o(i), s, n.$data, n);
                                        if (I && I.controlsDescendantBindings) {
                                            if (b !== l) throw new Error("Multiple bindings (" + b + " and " + i + ") are trying to control descendant bindings of the same element. You cannot use these bindings together on the same element.");
                                            b = i
                                        }
                                    }), "function" == typeof t && u.dependentObservable(function() {
                                        t(g, o(i), s, n.$data, n)
                                    }, null, {
                                        disposeWhenNodeIsRemoved: g
                                    })
                                } catch (g) {
                                    throw g.message = 'Unable to process binding "' + i + ": " + A[i] + '"\nMessage: ' + g.message, g
                                }
                            })
                        }
                        return {
                            shouldBindDescendants: b === l
                        }
                    }

                    function c(g) {
                        return g && g instanceof u.bindingContext ? g : new u.bindingContext(g)
                    }
                    u.bindingHandlers = {};
                    var F = {
                        script: !0,
                        textarea: !0,
                        template: !0
                    };
                    u.getBindingHandler = function(g) {
                        return u.bindingHandlers[g]
                    }, u.bindingContext = function(g, I, e, n, t) {
                        function C() {
                            var t = Q ? g() : g,
                                C = u.utils.unwrapObservable(t);
                            return I ? (I._subscribable && I._subscribable(), u.utils.extend(A, I), A._subscribable = B) : (A.$parents = [], A.$root = C, A.ko = u), A.$rawData = t, A.$data = C, e && (A[e] = C), n && n(A, I, C), A.$data
                        }

                        function i() {
                            return s && !u.utils.anyDomNodeIsAttachedToDocument(s)
                        }
                        var s, B, A = this,
                            Q = "function" == typeof g && !u.isObservable(g);
                        t && t.exportDependencies ? C() : (B = u.dependentObservable(C, null, {
                            disposeWhen: i,
                            disposeWhenNodeIsRemoved: !0
                        }), B.isActive() && (A._subscribable = B, B.equalityComparer = null, s = [], B._addNode = function(g) {
                            s.push(g), u.utils.domNodeDisposal.addDisposeCallback(g, function(g) {
                                u.utils.arrayRemoveItem(s, g), s.length || (B.dispose(), A._subscribable = B = l)
                            })
                        }))
                    }, u.bindingContext.prototype.createChildContext = function(g, I, e, n) {
                        return new u.bindingContext(g, this, I, function(g, I) {
                            g.$parentContext = I, g.$parent = I.$data, g.$parents = (I.$parents || []).slice(0), g.$parents.unshift(g.$parent), e && e(g)
                        }, n)
                    }, u.bindingContext.prototype.extend = function(g) {
                        return new u.bindingContext(this._subscribable || this.$data, this, null, function(I, e) {
                            I.$rawData = e.$rawData, u.utils.extend(I, "function" == typeof g ? g() : g)
                        })
                    }, u.bindingContext.prototype.createStaticChildContext = function(g, I) {
                        return this.createChildContext(g, I, null, {
                            exportDependencies: !0
                        })
                    };
                    var d = u.utils.domData.nextKey(),
                        b = u.utils.domData.nextKey();
                    u.storedBindingContextForNode = function(g, I) {
                        if (2 != arguments.length) return u.utils.domData.get(g, b);
                        u.utils.domData.set(g, b, I), I._subscribable && I._subscribable._addNode(g)
                    }, u.applyBindingAccessorsToNode = function(g, I, e) {
                        return 1 === g.nodeType && u.virtualElements.normaliseVirtualElementDomStructure(g), a(g, I, c(e), !0)
                    }, u.applyBindingsToNode = function(g, I, e) {
                        var t = c(e);
                        return u.applyBindingAccessorsToNode(g, n(I, t, g), t)
                    }, u.applyBindingsToDescendants = function(g, I) {
                        1 !== I.nodeType && 8 !== I.nodeType || s(c(g), I, !0)
                    }, u.applyBindings = function(g, I) {
                        if (!A && i.jQuery && (A = i.jQuery), I && 1 !== I.nodeType && 8 !== I.nodeType) throw new Error("ko.applyBindings: first parameter should be your view model; second parameter should be a DOM node");
                        I = I || i.document.body, B(c(g), I, !0)
                    }, u.contextFor = function(g) {
                        switch (g.nodeType) {
                            case 1:
                            case 8:
                                var I = u.storedBindingContextForNode(g);
                                if (I) return I;
                                if (g.parentNode) return u.contextFor(g.parentNode)
                        }
                        return l
                    }, u.dataFor = function(g) {
                        var I = u.contextFor(g);
                        return I ? I.$data : l
                    }, u.exportSymbol("bindingHandlers", u.bindingHandlers), u.exportSymbol("applyBindings", u.applyBindings), u.exportSymbol("applyBindingsToDescendants", u.applyBindingsToDescendants), u.exportSymbol("applyBindingAccessorsToNode", u.applyBindingAccessorsToNode), u.exportSymbol("applyBindingsToNode", u.applyBindingsToNode), u.exportSymbol("contextFor", u.contextFor), u.exportSymbol("dataFor", u.dataFor)
                }(),
                function(g) {
                    function I(I, e) {
                        return I.hasOwnProperty(e) ? I[e] : g
                    }

                    function e(g, e) {
                        var t, i = I(C, g);
                        i ? i.subscribe(e) : (i = C[g] = new u.subscribable, i.subscribe(e), n(g, function(I, e) {
                            var n = !(!e || !e.synchronous);
                            l[g] = {
                                definition: I,
                                isSynchronousComponent: n
                            }, delete C[g], t || n ? i.notifySubscribers(I) : u.tasks.schedule(function() {
                                i.notifySubscribers(I)
                            })
                        }), t = !0)
                    }

                    function n(g, I) {
                        t("getConfig", [g], function(e) {
                            e ? t("loadComponent", [g, e], function(g) {
                                I(g, e)
                            }) : I(null, null)
                        })
                    }

                    function t(I, e, n, C) {
                        C || (C = u.components.loaders.slice(0));
                        var l = C.shift();
                        if (l) {
                            var i = l[I];
                            if (i) {
                                var s = !1;
                                if (i.apply(l, e.concat(function(g) {
                                        s ? n(null) : null !== g ? n(g) : t(I, e, n, C)
                                    })) !== g && (s = !0, !l.suppressLoaderExceptions)) throw new Error("Component loaders must supply values by invoking the callback, not by returning values synchronously.")
                            } else t(I, e, n, C)
                        } else n(null)
                    }
                    var C = {},
                        l = {};
                    u.components = {
                        get: function(g, n) {
                            var t = I(l, g);
                            t ? t.isSynchronousComponent ? u.dependencyDetection.ignore(function() {
                                n(t.definition)
                            }) : u.tasks.schedule(function() {
                                n(t.definition)
                            }) : e(g, n)
                        },
                        clearCachedDefinition: function(g) {
                            delete l[g]
                        },
                        _getFirstResultFromLoaders: t
                    }, u.components.loaders = [], u.exportSymbol("components", u.components), u.exportSymbol("components.get", u.components.get), u.exportSymbol("components.clearCachedDefinition", u.components.clearCachedDefinition)
                }(),
                function(g) {
                    function e(g, I, e, n) {
                        var t = {},
                            C = 2,
                            l = function() {
                                0 == --C && n(t)
                            },
                            i = e.template,
                            s = e.viewModel;
                        i ? A(I, i, function(I) {
                            u.components._getFirstResultFromLoaders("loadTemplate", [g, I], function(g) {
                                t.template = g, l()
                            })
                        }) : l(), s ? A(I, s, function(I) {
                            u.components._getFirstResultFromLoaders("loadViewModel", [g, I], function(g) {
                                t[c] = g, l()
                            })
                        }) : l()
                    }

                    function n(g, I, e) {
                        if ("string" == typeof I) e(u.utils.parseHtmlFragment(I));
                        else if (I instanceof Array) e(I);
                        else if (B(I)) e(u.utils.makeArray(I.childNodes));
                        else if (I.element) {
                            var n = I.element;
                            if (l(n)) e(C(n));
                            else if ("string" == typeof n) {
                                var t = s.getElementById(n);
                                t ? e(C(t)) : g("Cannot find element with ID " + n)
                            } else g("Unknown element type: " + n)
                        } else g("Unknown template value: " + I)
                    }

                    function t(g, I, e) {
                        if ("function" == typeof I) e(function(g) {
                            return new I(g)
                        });
                        else if ("function" == typeof I[c]) e(I[c]);
                        else if ("instance" in I) {
                            var n = I.instance;
                            e(function(g, I) {
                                return n
                            })
                        } else "viewModel" in I ? t(g, I.viewModel, e) : g("Unknown viewModel value: " + I)
                    }

                    function C(g) {
                        switch (u.utils.tagNameLower(g)) {
                            case "script":
                                return u.utils.parseHtmlFragment(g.text);
                            case "textarea":
                                return u.utils.parseHtmlFragment(g.value);
                            case "template":
                                if (B(g.content)) return u.utils.cloneNodes(g.content.childNodes)
                        }
                        return u.utils.cloneNodes(g.childNodes)
                    }

                    function l(g) {
                        return i.HTMLElement ? g instanceof HTMLElement : g && g.tagName && 1 === g.nodeType
                    }

                    function B(g) {
                        return i.DocumentFragment ? g instanceof DocumentFragment : g && 11 === g.nodeType
                    }

                    function A(g, e, n) {
                        "string" == typeof e.require ? I || i.require ? (I || i.require)([e.require], n) : g("Uses require, but no AMD loader is present") : n(e)
                    }

                    function Q(g) {
                        return function(I) {
                            throw new Error("Component '" + g + "': " + I)
                        }
                    }
                    var a = {};
                    u.components.register = function(g, I) {
                        if (!I) throw new Error("Invalid configuration for " + g);
                        if (u.components.isRegistered(g)) throw new Error("Component " + g + " is already registered");
                        a[g] = I
                    }, u.components.isRegistered = function(g) {
                        return a.hasOwnProperty(g)
                    }, u.components.unregister = function(g) {
                        delete a[g], u.components.clearCachedDefinition(g)
                    }, u.components.defaultLoader = {
                        getConfig: function(g, I) {
                            I(a.hasOwnProperty(g) ? a[g] : null)
                        },
                        loadComponent: function(g, I, n) {
                            var t = Q(g);
                            A(t, I, function(I) {
                                e(g, t, I, n)
                            })
                        },
                        loadTemplate: function(g, I, e) {
                            n(Q(g), I, e)
                        },
                        loadViewModel: function(g, I, e) {
                            t(Q(g), I, e)
                        }
                    };
                    var c = "createViewModel";
                    u.exportSymbol("components.register", u.components.register), u.exportSymbol("components.isRegistered", u.components.isRegistered), u.exportSymbol("components.unregister", u.components.unregister), u.exportSymbol("components.defaultLoader", u.components.defaultLoader), u.components.loaders.push(u.components.defaultLoader), u.components._allRegisteredComponents = a
                }(),
                function(g) {
                    function I(g, I) {
                        var n = g.getAttribute("params");
                        if (n) {
                            var t = e.parseBindingsString(n, I, g, {
                                    valueAccessors: !0,
                                    bindingParams: !0
                                }),
                                C = u.utils.objectMap(t, function(I, e) {
                                    return u.computed(I, null, {
                                        disposeWhenNodeIsRemoved: g
                                    })
                                }),
                                l = u.utils.objectMap(C, function(I, e) {
                                    var n = I.peek();
                                    return I.isActive() ? u.computed({
                                        read: function() {
                                            return u.utils.unwrapObservable(I())
                                        },
                                        write: u.isWriteableObservable(n) && function(g) {
                                            I()(g)
                                        },
                                        disposeWhenNodeIsRemoved: g
                                    }) : n
                                });
                            return l.hasOwnProperty("$raw") || (l.$raw = C), l
                        }
                        return {
                            $raw: {}
                        }
                    }
                    u.components.getComponentNameForNode = function(g) {
                        var I = u.utils.tagNameLower(g);
                        if (u.components.isRegistered(I) && (-1 != I.indexOf("-") || "" + g == "[object HTMLUnknownElement]" || u.utils.ieVersion <= 8 && g.tagName === I)) return I
                    }, u.components.addBindingsForCustomElement = function(g, e, n, t) {
                        if (1 === e.nodeType) {
                            var C = u.components.getComponentNameForNode(e);
                            if (C) {
                                if (g = g || {}, g.component) throw new Error('Cannot use the "component" binding on a custom element matching a component');
                                var l = {
                                    name: C,
                                    params: I(e, n)
                                };
                                g.component = t ? function() {
                                    return l
                                } : l
                            }
                        }
                        return g
                    };
                    var e = new u.bindingProvider;
                    u.utils.ieVersion < 9 && (u.components.register = function(g) {
                        return function(I) {
                            return s.createElement(I), g.apply(this, arguments)
                        }
                    }(u.components.register), s.createDocumentFragment = function(g) {
                        return function() {
                            var I = g(),
                                e = u.components._allRegisteredComponents;
                            for (var n in e) e.hasOwnProperty(n) && I.createElement(n);
                            return I
                        }
                    }(s.createDocumentFragment))
                }(),
                function(g) {
                    function I(g, I, e) {
                        var n = I.template;
                        if (!n) throw new Error("Component '" + g + "' has no template");
                        var t = u.utils.cloneNodes(n);
                        u.virtualElements.setDomNodeChildren(e, t)
                    }

                    function e(g, I, e, n) {
                        var t = g.createViewModel;
                        return t ? t.call(g, n, {
                            element: I,
                            templateNodes: e
                        }) : n
                    }
                    var n = 0;
                    u.bindingHandlers.component = {
                        init: function(g, t, C, l, i) {
                            var s, B, A = function() {
                                    var g = s && s.dispose;
                                    "function" == typeof g && g.call(s), s = null, B = null
                                },
                                Q = u.utils.makeArray(u.virtualElements.childNodes(g));
                            return u.utils.domNodeDisposal.addDisposeCallback(g, A), u.computed(function() {
                                var C, l, a = u.utils.unwrapObservable(t());
                                if ("string" == typeof a ? C = a : (C = u.utils.unwrapObservable(a.name), l = u.utils.unwrapObservable(a.params)), !C) throw new Error("No component name specified");
                                var c = B = ++n;
                                u.components.get(C, function(n) {
                                    if (B === c) {
                                        if (A(), !n) throw new Error("Unknown component '" + C + "'");
                                        I(C, n, g);
                                        var t = e(n, g, Q, l),
                                            a = i.createChildContext(t, void 0, function(g) {
                                                g.$component = t, g.$componentTemplateNodes = Q
                                            });
                                        s = t, u.applyBindingsToDescendants(a, g)
                                    }
                                })
                            }, null, {
                                disposeWhenNodeIsRemoved: g
                            }), {
                                controlsDescendantBindings: !0
                            }
                        }
                    }, u.virtualElements.allowedBindings.component = !0
                }();
            var p = {
                class: "className",
                for: "htmlFor"
            };
            u.bindingHandlers.attr = {
                    update: function(g, I, e) {
                        var n = u.utils.unwrapObservable(I()) || {};
                        u.utils.objectForEach(n, function(I, e) {
                            e = u.utils.unwrapObservable(e);
                            var n = !1 === e || null === e || e === l;
                            n && g.removeAttribute(I), u.utils.ieVersion <= 8 && I in p ? (I = p[I], n ? g.removeAttribute(I) : g[I] = e) : n || g.setAttribute(I, e.toString()), "name" === I && u.utils.setElementName(g, n ? "" : e.toString())
                        })
                    }
                },
                function() {
                    u.bindingHandlers.checked = {
                        after: ["value", "attr"],
                        init: function(g, I, e) {
                            function n() {
                                var n = g.checked,
                                    t = c ? C() : n;
                                if (!u.computedContext.isInitial() && (!s || n)) {
                                    var l = u.dependencyDetection.ignore(I);
                                    if (A) {
                                        var i = Q ? l.peek() : l;
                                        a !== t ? (n && (u.utils.addOrRemoveItem(i, t, !0), u.utils.addOrRemoveItem(i, a, !1)), a = t) : u.utils.addOrRemoveItem(i, t, n), Q && u.isWriteableObservable(l) && l(i)
                                    } else u.expressionRewriting.writeValueToProperty(l, e, "checked", t, !0)
                                }
                            }

                            function t() {
                                var e = u.utils.unwrapObservable(I());
                                g.checked = A ? u.utils.arrayIndexOf(e, C()) >= 0 : i ? e : C() === e
                            }
                            var C = u.pureComputed(function() {
                                    return e.has("checkedValue") ? u.utils.unwrapObservable(e.get("checkedValue")) : e.has("value") ? u.utils.unwrapObservable(e.get("value")) : g.value
                                }),
                                i = "checkbox" == g.type,
                                s = "radio" == g.type;
                            if (i || s) {
                                var B = I(),
                                    A = i && u.utils.unwrapObservable(B) instanceof Array,
                                    Q = !(A && B.push && B.splice),
                                    a = A ? C() : l,
                                    c = s || A;
                                s && !g.name && u.bindingHandlers.uniqueName.init(g, function() {
                                    return !0
                                }), u.computed(n, null, {
                                    disposeWhenNodeIsRemoved: g
                                }), u.utils.registerEventHandler(g, "click", n), u.computed(t, null, {
                                    disposeWhenNodeIsRemoved: g
                                }), B = l
                            }
                        }
                    }, u.expressionRewriting.twoWayBindings.checked = !0, u.bindingHandlers.checkedValue = {
                        update: function(g, I) {
                            g.value = u.utils.unwrapObservable(I())
                        }
                    }
                }();
            u.bindingHandlers.css = {
                update: function(g, I) {
                    var e = u.utils.unwrapObservable(I());
                    null !== e && "object" == typeof e ? u.utils.objectForEach(e, function(I, e) {
                        e = u.utils.unwrapObservable(e), u.utils.toggleDomNodeCssClass(g, I, e)
                    }) : (e = u.utils.stringTrim(String(e || "")), u.utils.toggleDomNodeCssClass(g, g.__ko__cssValue, !1), g.__ko__cssValue = e, u.utils.toggleDomNodeCssClass(g, e, !0))
                }
            }, u.bindingHandlers.enable = {
                update: function(g, I) {
                    var e = u.utils.unwrapObservable(I());
                    e && g.disabled ? g.removeAttribute("disabled") : e || g.disabled || (g.disabled = !0)
                }
            }, u.bindingHandlers.disable = {
                update: function(g, I) {
                    u.bindingHandlers.enable.update(g, function() {
                        return !u.utils.unwrapObservable(I())
                    })
                }
            }, u.bindingHandlers.event = {
                init: function(g, I, e, n, t) {
                    var C = I() || {};
                    u.utils.objectForEach(C, function(C) {
                        "string" == typeof C && u.utils.registerEventHandler(g, C, function(g) {
                            var l, i = I()[C];
                            if (i) {
                                try {
                                    var s = u.utils.makeArray(arguments);
                                    n = t.$data, s.unshift(n), l = i.apply(n, s)
                                } finally {
                                    !0 !== l && (g.preventDefault ? g.preventDefault() : g.returnValue = !1)
                                }!1 !== e.get(C + "Bubble") || (g.cancelBubble = !0, g.stopPropagation && g.stopPropagation())
                            }
                        })
                    })
                }
            }, u.bindingHandlers.foreach = {
                makeTemplateValueAccessor: function(g) {
                    return function() {
                        var I = g(),
                            e = u.utils.peekObservable(I);
                        return e && "number" != typeof e.length ? (u.utils.unwrapObservable(I), {
                            foreach: e.data,
                            as: e.as,
                            includeDestroyed: e.includeDestroyed,
                            afterAdd: e.afterAdd,
                            beforeRemove: e.beforeRemove,
                            afterRender: e.afterRender,
                            beforeMove: e.beforeMove,
                            afterMove: e.afterMove,
                            templateEngine: u.nativeTemplateEngine.instance
                        }) : {
                            foreach: I,
                            templateEngine: u.nativeTemplateEngine.instance
                        }
                    }
                },
                init: function(g, I, e, n, t) {
                    return u.bindingHandlers.template.init(g, u.bindingHandlers.foreach.makeTemplateValueAccessor(I))
                },
                update: function(g, I, e, n, t) {
                    return u.bindingHandlers.template.update(g, u.bindingHandlers.foreach.makeTemplateValueAccessor(I), e, n, t)
                }
            }, u.expressionRewriting.bindingRewriteValidators.foreach = !1, u.virtualElements.allowedBindings.foreach = !0;
            u.bindingHandlers.hasfocus = {
                init: function(g, I, e) {
                    var n = function(n) {
                            g.__ko_hasfocusUpdating = !0;
                            var t = g.ownerDocument;
                            if ("activeElement" in t) {
                                var C;
                                try {
                                    C = t.activeElement
                                } catch (g) {
                                    C = t.body
                                }
                                n = C === g
                            }
                            var l = I();
                            u.expressionRewriting.writeValueToProperty(l, e, "hasfocus", n, !0), g.__ko_hasfocusLastValue = n, g.__ko_hasfocusUpdating = !1
                        },
                        t = n.bind(null, !0),
                        C = n.bind(null, !1);
                    u.utils.registerEventHandler(g, "focus", t), u.utils.registerEventHandler(g, "focusin", t), u.utils.registerEventHandler(g, "blur", C), u.utils.registerEventHandler(g, "focusout", C)
                },
                update: function(g, I) {
                    var e = !!u.utils.unwrapObservable(I());
                    g.__ko_hasfocusUpdating || g.__ko_hasfocusLastValue === e || (e ? g.focus() : g.blur(), !e && g.__ko_hasfocusLastValue && g.ownerDocument.body.focus(), u.dependencyDetection.ignore(u.utils.triggerEvent, null, [g, e ? "focusin" : "focusout"]))
                }
            }, u.expressionRewriting.twoWayBindings.hasfocus = !0, u.bindingHandlers.hasFocus = u.bindingHandlers.hasfocus, u.expressionRewriting.twoWayBindings.hasFocus = !0, u.bindingHandlers.html = {
                init: function() {
                    return {
                        controlsDescendantBindings: !0
                    }
                },
                update: function(g, I) {
                    u.utils.setHtml(g, I())
                }
            }, d("if"), d("ifnot", !1, !0), d("with", !0, !1, function(g, I) {
                return g.createStaticChildContext(I)
            });
            var R = {};
            u.bindingHandlers.options = {
                    init: function(g) {
                        if ("select" !== u.utils.tagNameLower(g)) throw new Error("options binding applies only to SELECT elements");
                        for (; g.length > 0;) g.remove(0);
                        return {
                            controlsDescendantBindings: !0
                        }
                    },
                    update: function(g, I, e) {
                        function n() {
                            return u.utils.arrayFilter(g.options, function(g) {
                                return g.selected
                            })
                        }

                        function t(g, I, e) {
                            var n = typeof I;
                            return "function" == n ? I(g) : "string" == n ? g[I] : e
                        }

                        function C(I, n, C) {
                            C.length && (o = !F && C[0].selected ? [u.selectExtensions.readValue(C[0])] : [], U = !0);
                            var i = g.ownerDocument.createElement("option");
                            if (I === R) u.utils.setTextContent(i, e.get("optionsCaption")), u.selectExtensions.writeValue(i, l);
                            else {
                                var s = t(I, e.get("optionsValue"), I);
                                u.selectExtensions.writeValue(i, u.utils.unwrapObservable(s));
                                var B = t(I, e.get("optionsText"), s);
                                u.utils.setTextContent(i, B)
                            }
                            return [i]
                        }

                        function i(I, n) {
                            if (U && F) u.selectExtensions.writeValue(g, u.utils.unwrapObservable(e.get("value")), !0);
                            else if (o.length) {
                                var t = u.utils.arrayIndexOf(o, u.selectExtensions.readValue(n[0])) >= 0;
                                u.utils.setOptionNodeSelectionState(n[0], t), U && !t && u.dependencyDetection.ignore(u.utils.triggerEvent, null, [g, "change"])
                            }
                        }
                        var s, B, A = 0 == g.length,
                            Q = g.multiple,
                            a = !A && Q ? g.scrollTop : null,
                            c = u.utils.unwrapObservable(I()),
                            F = e.get("valueAllowUnset") && e.has("value"),
                            d = e.get("optionsIncludeDestroyed"),
                            b = {},
                            o = [];
                        F || (Q ? o = u.utils.arrayMap(n(), u.selectExtensions.readValue) : g.selectedIndex >= 0 && o.push(u.selectExtensions.readValue(g.options[g.selectedIndex]))), c && (void 0 === c.length && (c = [c]), B = u.utils.arrayFilter(c, function(g) {
                            return d || g === l || null === g || !u.utils.unwrapObservable(g._destroy)
                        }), e.has("optionsCaption") && null !== (s = u.utils.unwrapObservable(e.get("optionsCaption"))) && s !== l && B.unshift(R));
                        var U = !1;
                        b.beforeRemove = function(I) {
                            g.removeChild(I)
                        };
                        var r = i;
                        e.has("optionsAfterRender") && "function" == typeof e.get("optionsAfterRender") && (r = function(g, I) {
                            i(g, I), u.dependencyDetection.ignore(e.get("optionsAfterRender"), null, [I[0], g !== R ? g : l])
                        }), u.utils.setDomNodeChildrenFromArrayMapping(g, B, C, b, r), u.dependencyDetection.ignore(function() {
                            if (F) u.selectExtensions.writeValue(g, u.utils.unwrapObservable(e.get("value")), !0);
                            else {
                                var I;
                                I = Q ? o.length && n().length < o.length : o.length && g.selectedIndex >= 0 ? u.selectExtensions.readValue(g.options[g.selectedIndex]) !== o[0] : o.length || g.selectedIndex >= 0, I && u.utils.triggerEvent(g, "change")
                            }
                        }), u.utils.ensureSelectElementIsRenderedCorrectly(g), a && Math.abs(a - g.scrollTop) > 20 && (g.scrollTop = a)
                    }
                }, u.bindingHandlers.options.optionValueDomDataKey = u.utils.domData.nextKey(), u.bindingHandlers.selectedOptions = {
                    after: ["options", "foreach"],
                    init: function(g, I, e) {
                        u.utils.registerEventHandler(g, "change", function() {
                            var n = I(),
                                t = [];
                            u.utils.arrayForEach(g.getElementsByTagName("option"), function(g) {
                                g.selected && t.push(u.selectExtensions.readValue(g))
                            }), u.expressionRewriting.writeValueToProperty(n, e, "selectedOptions", t)
                        })
                    },
                    update: function(g, I) {
                        if ("select" != u.utils.tagNameLower(g)) throw new Error("values binding applies only to SELECT elements");
                        var e = u.utils.unwrapObservable(I()),
                            n = g.scrollTop;
                        e && "number" == typeof e.length && u.utils.arrayForEach(g.getElementsByTagName("option"), function(g) {
                            var I = u.utils.arrayIndexOf(e, u.selectExtensions.readValue(g)) >= 0;
                            g.selected != I && u.utils.setOptionNodeSelectionState(g, I)
                        }), g.scrollTop = n
                    }
                }, u.expressionRewriting.twoWayBindings.selectedOptions = !0, u.bindingHandlers.style = {
                    update: function(g, I) {
                        var e = u.utils.unwrapObservable(I() || {});
                        u.utils.objectForEach(e, function(I, e) {
                            e = u.utils.unwrapObservable(e), null !== e && e !== l && !1 !== e || (e = ""), g.style[I] = e
                        })
                    }
                }, u.bindingHandlers.submit = {
                    init: function(g, I, e, n, t) {
                        if ("function" != typeof I()) throw new Error("The value for a submit binding must be a function");
                        u.utils.registerEventHandler(g, "submit", function(e) {
                            var n, C = I();
                            try {
                                n = C.call(t.$data, g)
                            } finally {
                                !0 !== n && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
                            }
                        })
                    }
                }, u.bindingHandlers.text = {
                    init: function() {
                        return {
                            controlsDescendantBindings: !0
                        }
                    },
                    update: function(g, I) {
                        u.utils.setTextContent(g, I())
                    }
                }, u.virtualElements.allowedBindings.text = !0,
                function() {
                    if (i && i.navigator) var g = function(g) {
                            if (g) return parseFloat(g[1])
                        },
                        I = i.opera && i.opera.version && parseInt(i.opera.version()),
                        e = i.navigator.userAgent,
                        n = g(e.match(/^(?:(?!chrome).)*version\/([^ ]*) safari/i)),
                        t = g(e.match(/Firefox\/([^ ]*)/));
                    if (u.utils.ieVersion < 10) var C = u.utils.domData.nextKey(),
                        s = u.utils.domData.nextKey(),
                        B = function(g) {
                            var I = this.activeElement,
                                e = I && u.utils.domData.get(I, s);
                            e && e(g)
                        },
                        A = function(g, I) {
                            var e = g.ownerDocument;
                            u.utils.domData.get(e, C) || (u.utils.domData.set(e, C, !0), u.utils.registerEventHandler(e, "selectionchange", B)), u.utils.domData.set(g, s, I)
                        };
                    u.bindingHandlers.textInput = {
                        init: function(g, e, C) {
                            var i, s, B = g.value,
                                Q = function(I) {
                                    clearTimeout(i), s = i = l;
                                    var n = g.value;
                                    B !== n && (I && (g._ko_textInputProcessedEvent = I.type), B = n, u.expressionRewriting.writeValueToProperty(e(), C, "textInput", n))
                                },
                                a = function(I) {
                                    if (!i) {
                                        s = g.value;
                                        var e = Q.bind(g, {
                                            type: I.type
                                        });
                                        i = u.utils.setTimeout(e, 4)
                                    }
                                },
                                c = 9 == u.utils.ieVersion ? a : Q,
                                F = function() {
                                    var I = u.utils.unwrapObservable(e());
                                    if (null !== I && I !== l || (I = ""), s !== l && I === s) return void u.utils.setTimeout(F, 4);
                                    g.value !== I && (B = I, g.value = I)
                                },
                                d = function(I, e) {
                                    u.utils.registerEventHandler(g, I, e)
                                };
                            u.bindingHandlers.textInput._forceUpdateOn ? u.utils.arrayForEach(u.bindingHandlers.textInput._forceUpdateOn, function(g) {
                                "after" == g.slice(0, 5) ? d(g.slice(5), a) : d(g, Q)
                            }) : u.utils.ieVersion < 10 ? (d("propertychange", function(g) {
                                "value" === g.propertyName && c(g)
                            }), 8 == u.utils.ieVersion && (d("keyup", Q), d("keydown", Q)), u.utils.ieVersion >= 8 && (A(g, c), d("dragend", a))) : (d("input", Q), n < 5 && "textarea" === u.utils.tagNameLower(g) ? (d("keydown", a), d("paste", a), d("cut", a)) : I < 11 ? d("keydown", a) : t < 4 && (d("DOMAutoComplete", Q), d("dragdrop", Q), d("drop", Q))), d("change", Q), u.computed(F, null, {
                                disposeWhenNodeIsRemoved: g
                            })
                        }
                    }, u.expressionRewriting.twoWayBindings.textInput = !0, u.bindingHandlers.textinput = {
                        preprocess: function(g, I, e) {
                            e("textInput", g)
                        }
                    }
                }(), u.bindingHandlers.uniqueName = {
                    init: function(g, I) {
                        if (I()) {
                            var e = "ko_unique_" + ++u.bindingHandlers.uniqueName.currentIndex;
                            u.utils.setElementName(g, e)
                        }
                    }
                }, u.bindingHandlers.uniqueName.currentIndex = 0, u.bindingHandlers.value = {
                    after: ["options", "foreach"],
                    init: function(g, I, e) {
                        if ("input" == g.tagName.toLowerCase() && ("checkbox" == g.type || "radio" == g.type)) return void u.applyBindingAccessorsToNode(g, {
                            checkedValue: I
                        });
                        var n = ["change"],
                            t = e.get("valueUpdate"),
                            C = !1,
                            l = null;
                        t && ("string" == typeof t && (t = [t]), u.utils.arrayPushAll(n, t), n = u.utils.arrayGetDistinctValues(n));
                        var i = function() {
                            l = null, C = !1;
                            var n = I(),
                                t = u.selectExtensions.readValue(g);
                            u.expressionRewriting.writeValueToProperty(n, e, "value", t)
                        };
                        u.utils.ieVersion && "input" == g.tagName.toLowerCase() && "text" == g.type && "off" != g.autocomplete && (!g.form || "off" != g.form.autocomplete) && -1 == u.utils.arrayIndexOf(n, "propertychange") && (u.utils.registerEventHandler(g, "propertychange", function() {
                            C = !0
                        }), u.utils.registerEventHandler(g, "focus", function() {
                            C = !1
                        }), u.utils.registerEventHandler(g, "blur", function() {
                            C && i()
                        })), u.utils.arrayForEach(n, function(I) {
                            var e = i;
                            u.utils.stringStartsWith(I, "after") && (e = function() {
                                l = u.selectExtensions.readValue(g), u.utils.setTimeout(i, 0)
                            }, I = I.substring("after".length)), u.utils.registerEventHandler(g, I, e)
                        });
                        var s = function() {
                            var n = u.utils.unwrapObservable(I()),
                                t = u.selectExtensions.readValue(g);
                            if (null !== l && n === l) return void u.utils.setTimeout(s, 0);
                            if (n !== t)
                                if ("select" === u.utils.tagNameLower(g)) {
                                    var C = e.get("valueAllowUnset"),
                                        i = function() {
                                            u.selectExtensions.writeValue(g, n, C)
                                        };
                                    i(), C || n === u.selectExtensions.readValue(g) ? u.utils.setTimeout(i, 0) : u.dependencyDetection.ignore(u.utils.triggerEvent, null, [g, "change"])
                                } else u.selectExtensions.writeValue(g, n)
                        };
                        u.computed(s, null, {
                            disposeWhenNodeIsRemoved: g
                        })
                    },
                    update: function() {}
                }, u.expressionRewriting.twoWayBindings.value = !0, u.bindingHandlers.visible = {
                    update: function(g, I) {
                        var e = u.utils.unwrapObservable(I()),
                            n = !("none" == g.style.display);
                        e && !n ? g.style.display = "" : !e && n && (g.style.display = "none")
                    }
                },
                function(g) {
                    u.bindingHandlers[g] = {
                        init: function(I, e, n, t, C) {
                            var l = function() {
                                var I = {};
                                return I[g] = e(), I
                            };
                            return u.bindingHandlers.event.init.call(this, I, l, n, t, C)
                        }
                    }
                }("click"), u.templateEngine = function() {}, u.templateEngine.prototype.renderTemplateSource = function(g, I, e, n) {
                    throw new Error("Override renderTemplateSource")
                }, u.templateEngine.prototype.createJavaScriptEvaluatorBlock = function(g) {
                    throw new Error("Override createJavaScriptEvaluatorBlock")
                }, u.templateEngine.prototype.makeTemplateSource = function(g, I) {
                    if ("string" == typeof g) {
                        I = I || s;
                        var e = I.getElementById(g);
                        if (!e) throw new Error("Cannot find template with ID " + g);
                        return new u.templateSources.domElement(e)
                    }
                    if (1 == g.nodeType || 8 == g.nodeType) return new u.templateSources.anonymousTemplate(g);
                    throw new Error("Unknown template type: " + g)
                }, u.templateEngine.prototype.renderTemplate = function(g, I, e, n) {
                    var t = this.makeTemplateSource(g, n);
                    return this.renderTemplateSource(t, I, e, n)
                }, u.templateEngine.prototype.isTemplateRewritten = function(g, I) {
                    return !1 === this.allowTemplateRewriting || this.makeTemplateSource(g, I).data("isRewritten")
                }, u.templateEngine.prototype.rewriteTemplate = function(g, I, e) {
                    var n = this.makeTemplateSource(g, e),
                        t = I(n.text());
                    n.text(t), n.data("isRewritten", !0)
                }, u.exportSymbol("templateEngine", u.templateEngine), u.templateRewriting = function() {
                    function g(g) {
                        for (var I = u.expressionRewriting.bindingRewriteValidators, e = 0; e < g.length; e++) {
                            var n = g[e].key;
                            if (I.hasOwnProperty(n)) {
                                var t = I[n];
                                if ("function" == typeof t) {
                                    var C = t(g[e].value);
                                    if (C) throw new Error(C)
                                } else if (!t) throw new Error("This template engine does not support the '" + n + "' binding within its templates")
                            }
                        }
                    }

                    function I(I, e, n, t) {
                        var C = u.expressionRewriting.parseObjectLiteral(I);
                        g(C);
                        var l = u.expressionRewriting.preProcessBindings(C, {
                                valueAccessors: !0
                            }),
                            i = "ko.__tr_ambtns(function($context,$element){return(function(){return{ " + l + " } })()},'" + n.toLowerCase() + "')";
                        return t.createJavaScriptEvaluatorBlock(i) + e
                    }
                    var e = /(<([a-z]+\d*)(?:\s+(?!data-bind\s*=\s*)[a-z0-9\-]+(?:=(?:\"[^\"]*\"|\'[^\']*\'|[^>]*))?)*\s+)data-bind\s*=\s*(["'])([\s\S]*?)\3/gi,
                        n = /<!--\s*ko\b\s*([\s\S]*?)\s*-->/g;
                    return {
                        ensureTemplateIsRewritten: function(g, I, e) {
                            I.isTemplateRewritten(g, e) || I.rewriteTemplate(g, function(g) {
                                return u.templateRewriting.memoizeBindingAttributeSyntax(g, I)
                            }, e)
                        },
                        memoizeBindingAttributeSyntax: function(g, t) {
                            return g.replace(e, function() {
                                return I(arguments[4], arguments[1], arguments[2], t)
                            }).replace(n, function() {
                                return I(arguments[1], "\x3c!-- ko --\x3e", "#comment", t)
                            })
                        },
                        applyMemoizedBindingsToNextSibling: function(g, I) {
                            return u.memoization.memoize(function(e, n) {
                                var t = e.nextSibling;
                                t && t.nodeName.toLowerCase() === I && u.applyBindingAccessorsToNode(t, g, n)
                            })
                        }
                    }
                }(), u.exportSymbol("__tr_ambtns", u.templateRewriting.applyMemoizedBindingsToNextSibling),
                function() {
                    function g(g) {
                        return u.utils.domData.get(g, n) || {}
                    }

                    function I(g, I) {
                        u.utils.domData.set(g, n, I)
                    }
                    u.templateSources = {};
                    u.templateSources.domElement = function(g) {
                        if (this.domElement = g, g) {
                            var I = u.utils.tagNameLower(g);
                            this.templateType = "script" === I ? 1 : "textarea" === I ? 2 : "template" == I && g.content && 11 === g.content.nodeType ? 3 : 4
                        }
                    }, u.templateSources.domElement.prototype.text = function() {
                        var g = 1 === this.templateType ? "text" : 2 === this.templateType ? "value" : "innerHTML";
                        if (0 == arguments.length) return this.domElement[g];
                        var I = arguments[0];
                        "innerHTML" === g ? u.utils.setHtml(this.domElement, I) : this.domElement[g] = I
                    };
                    var e = u.utils.domData.nextKey() + "_";
                    u.templateSources.domElement.prototype.data = function(g) {
                        if (1 === arguments.length) return u.utils.domData.get(this.domElement, e + g);
                        u.utils.domData.set(this.domElement, e + g, arguments[1])
                    };
                    var n = u.utils.domData.nextKey();
                    u.templateSources.domElement.prototype.nodes = function() {
                        var e = this.domElement;
                        if (0 == arguments.length) {
                            return g(e).containerData || (3 === this.templateType ? e.content : 4 === this.templateType ? e : l)
                        }
                        I(e, {
                            containerData: arguments[0]
                        })
                    }, u.templateSources.anonymousTemplate = function(g) {
                        this.domElement = g
                    }, u.templateSources.anonymousTemplate.prototype = new u.templateSources.domElement, u.templateSources.anonymousTemplate.prototype.constructor = u.templateSources.anonymousTemplate, u.templateSources.anonymousTemplate.prototype.text = function() {
                        if (0 == arguments.length) {
                            var e = g(this.domElement);
                            return e.textData === l && e.containerData && (e.textData = e.containerData.innerHTML), e.textData
                        }
                        var n = arguments[0];
                        I(this.domElement, {
                            textData: n
                        })
                    }, u.exportSymbol("templateSources", u.templateSources), u.exportSymbol("templateSources.domElement", u.templateSources.domElement), u.exportSymbol("templateSources.anonymousTemplate", u.templateSources.anonymousTemplate)
                }(),
                function() {
                    function g(g, I, e) {
                        for (var n, t = g, C = u.virtualElements.nextSibling(I); t && (n = t) !== C;) t = u.virtualElements.nextSibling(n), e(n, t)
                    }

                    function I(I, e) {
                        if (I.length) {
                            var n = I[0],
                                t = I[I.length - 1],
                                C = n.parentNode,
                                l = u.bindingProvider.instance,
                                i = l.preprocessNode;
                            if (i) {
                                if (g(n, t, function(g, I) {
                                        var e = g.previousSibling,
                                            C = i.call(l, g);
                                        C && (g === n && (n = C[0] || I), g === t && (t = C[C.length - 1] || e))
                                    }), I.length = 0, !n) return;
                                n === t ? I.push(n) : (I.push(n, t), u.utils.fixUpContinuousNodeArray(I, C))
                            }
                            g(n, t, function(g) {
                                1 !== g.nodeType && 8 !== g.nodeType || u.applyBindings(e, g)
                            }), g(n, t, function(g) {
                                1 !== g.nodeType && 8 !== g.nodeType || u.memoization.unmemoizeDomNodeAndDescendants(g, [e])
                            }), u.utils.fixUpContinuousNodeArray(I, C)
                        }
                    }

                    function e(g) {
                        return g.nodeType ? g : g.length > 0 ? g[0] : null
                    }

                    function n(g, n, t, C, l) {
                        l = l || {};
                        var s = g && e(g),
                            B = (s || t || {}).ownerDocument,
                            A = l.templateEngine || i;
                        u.templateRewriting.ensureTemplateIsRewritten(t, A, B);
                        var Q = A.renderTemplate(t, C, l, B);
                        if ("number" != typeof Q.length || Q.length > 0 && "number" != typeof Q[0].nodeType) throw new Error("Template engine must return an array of DOM nodes");
                        var a = !1;
                        switch (n) {
                            case "replaceChildren":
                                u.virtualElements.setDomNodeChildren(g, Q), a = !0;
                                break;
                            case "replaceNode":
                                u.utils.replaceDomNodes(g, Q), a = !0;
                                break;
                            case "ignoreTargetNode":
                                break;
                            default:
                                throw new Error("Unknown renderMode: " + n)
                        }
                        return a && (I(Q, C), l.afterRender && u.dependencyDetection.ignore(l.afterRender, null, [Q, C.$data])), Q
                    }

                    function t(g, I, e) {
                        return u.isObservable(g) ? g() : "function" == typeof g ? g(I, e) : g
                    }

                    function C(g, I) {
                        var e = u.utils.domData.get(g, s);
                        e && "function" == typeof e.dispose && e.dispose(), u.utils.domData.set(g, s, I && I.isActive() ? I : l)
                    }
                    var i;
                    u.setTemplateEngine = function(g) {
                        if (g != l && !(g instanceof u.templateEngine)) throw new Error("templateEngine must inherit from ko.templateEngine");
                        i = g
                    }, u.renderTemplate = function(g, I, C, s, B) {
                        if (C = C || {}, (C.templateEngine || i) == l) throw new Error("Set a template engine before calling renderTemplate");
                        if (B = B || "replaceChildren", s) {
                            var A = e(s),
                                Q = function() {
                                    return !A || !u.utils.domNodeIsAttachedToDocument(A)
                                },
                                a = A && "replaceNode" == B ? A.parentNode : A;
                            return u.dependentObservable(function() {
                                var l = I && I instanceof u.bindingContext ? I : new u.bindingContext(I, null, null, null, {
                                        exportDependencies: !0
                                    }),
                                    i = t(g, l.$data, l),
                                    Q = n(s, B, i, l, C);
                                "replaceNode" == B && (s = Q, A = e(s))
                            }, null, {
                                disposeWhen: Q,
                                disposeWhenNodeIsRemoved: a
                            })
                        }
                        return u.memoization.memoize(function(e) {
                            u.renderTemplate(g, I, C, e, "replaceNode")
                        })
                    }, u.renderTemplateForEach = function(g, e, C, i, s) {
                        var B, A = function(I, e) {
                                return B = s.createChildContext(I, C.as, function(g) {
                                    g.$index = e
                                }), n(null, "ignoreTargetNode", t(g, I, B), B, C)
                            },
                            Q = function(g, e, n) {
                                I(e, B), C.afterRender && C.afterRender(e, g), B = null
                            };
                        return u.dependentObservable(function() {
                            var g = u.utils.unwrapObservable(e) || [];
                            void 0 === g.length && (g = [g]);
                            var I = u.utils.arrayFilter(g, function(g) {
                                return C.includeDestroyed || g === l || null === g || !u.utils.unwrapObservable(g._destroy)
                            });
                            u.dependencyDetection.ignore(u.utils.setDomNodeChildrenFromArrayMapping, null, [i, I, A, C, Q])
                        }, null, {
                            disposeWhenNodeIsRemoved: i
                        })
                    };
                    var s = u.utils.domData.nextKey();
                    u.bindingHandlers.template = {
                        init: function(g, I) {
                            var e = u.utils.unwrapObservable(I());
                            if ("string" == typeof e || e.name) u.virtualElements.emptyNode(g);
                            else if ("nodes" in e) {
                                var n = e.nodes || [];
                                if (u.isObservable(n)) throw new Error('The "nodes" option must be a plain, non-observable array.');
                                var t = u.utils.moveCleanedNodesToContainerElement(n);
                                new u.templateSources.anonymousTemplate(g).nodes(t)
                            } else {
                                var C = u.virtualElements.childNodes(g),
                                    t = u.utils.moveCleanedNodesToContainerElement(C);
                                new u.templateSources.anonymousTemplate(g).nodes(t)
                            }
                            return {
                                controlsDescendantBindings: !0
                            }
                        },
                        update: function(g, I, e, n, t) {
                            var l, i = I(),
                                s = u.utils.unwrapObservable(i),
                                B = !0,
                                A = null;
                            if ("string" == typeof s ? (l = i, s = {}) : (l = s.name, "if" in s && (B = u.utils.unwrapObservable(s.if)), B && "ifnot" in s && (B = !u.utils.unwrapObservable(s.ifnot))), "foreach" in s) {
                                var Q = B && s.foreach || [];
                                A = u.renderTemplateForEach(l || g, Q, s, g, t)
                            } else if (B) {
                                var a = "data" in s ? t.createStaticChildContext(s.data, s.as) : t;
                                A = u.renderTemplate(l || g, a, s, g)
                            } else u.virtualElements.emptyNode(g);
                            C(g, A)
                        }
                    }, u.expressionRewriting.bindingRewriteValidators.template = function(g) {
                        var I = u.expressionRewriting.parseObjectLiteral(g);
                        return 1 == I.length && I[0].unknown ? null : u.expressionRewriting.keyValueArrayContainsKey(I, "name") ? null : "This template engine does not support anonymous templates nested within its templates"
                    }, u.virtualElements.allowedBindings.template = !0
                }(), u.exportSymbol("setTemplateEngine", u.setTemplateEngine), u.exportSymbol("renderTemplate", u.renderTemplate), u.utils.findMovesInArrayComparison = function(g, I, e) {
                    if (g.length && I.length) {
                        var n, t, C, l, i;
                        for (n = t = 0;
                            (!e || n < e) && (l = g[t]); ++t) {
                            for (C = 0; i = I[C]; ++C)
                                if (l.value === i.value) {
                                    l.moved = i.index, i.moved = l.index, I.splice(C, 1), n = C = 0;
                                    break
                                } n += C
                        }
                    }
                }, u.utils.compareArrays = function() {
                    function g(g, t, C) {
                        return C = "boolean" == typeof C ? {
                            dontLimitMoves: C
                        } : C || {}, g = g || [], t = t || [], g.length < t.length ? I(g, t, e, n, C) : I(t, g, n, e, C)
                    }

                    function I(g, I, e, n, t) {
                        var C, l, i, s, B, A, Q = Math.min,
                            a = Math.max,
                            c = [],
                            F = g.length,
                            d = I.length,
                            b = d - F || 1,
                            o = F + d + 1;
                        for (C = 0; C <= F; C++)
                            for (s = i, c.push(i = []), B = Q(d, C + b), A = a(0, C - 1), l = A; l <= B; l++)
                                if (l)
                                    if (C)
                                        if (g[C - 1] === I[l - 1]) i[l] = s[l - 1];
                                        else {
                                            var U = s[l] || o,
                                                r = i[l - 1] || o;
                                            i[l] = Q(U, r) + 1
                                        }
                        else i[l] = l + 1;
                        else i[l] = C + 1;
                        var G, m = [],
                            Z = [],
                            V = [];
                        for (C = F, l = d; C || l;) G = c[C][l] - 1, l && G === c[C][l - 1] ? Z.push(m[m.length] = {
                            status: e,
                            value: I[--l],
                            index: l
                        }) : C && G === c[C - 1][l] ? V.push(m[m.length] = {
                            status: n,
                            value: g[--C],
                            index: C
                        }) : (--l, --C, t.sparse || m.push({
                            status: "retained",
                            value: I[l]
                        }));
                        return u.utils.findMovesInArrayComparison(V, Z, !t.dontLimitMoves && 10 * F), m.reverse()
                    }
                    var e = "added",
                        n = "deleted";
                    return g
                }(), u.exportSymbol("utils.compareArrays", u.utils.compareArrays),
                function() {
                    function g(g, I, e, n, t) {
                        var C = [],
                            i = u.dependentObservable(function() {
                                var l = I(e, t, u.utils.fixUpContinuousNodeArray(C, g)) || [];
                                C.length > 0 && (u.utils.replaceDomNodes(C, l), n && u.dependencyDetection.ignore(n, null, [e, l, t])), C.length = 0, u.utils.arrayPushAll(C, l)
                            }, null, {
                                disposeWhenNodeIsRemoved: g,
                                disposeWhen: function() {
                                    return !u.utils.anyDomNodeIsAttachedToDocument(C)
                                }
                            });
                        return {
                            mappedNodes: C,
                            dependentObservable: i.isActive() ? i : l
                        }
                    }
                    var I = u.utils.domData.nextKey(),
                        e = u.utils.domData.nextKey();
                    u.utils.setDomNodeChildrenFromArrayMapping = function(n, t, C, i, s) {
                        function B(g, I) {
                            Q = d[I], G !== I && (W[g] = Q), Q.indexObservable(G++), u.utils.fixUpContinuousNodeArray(Q.mappedNodes, n), U.push(Q), Z.push(Q)
                        }

                        function A(g, I) {
                            if (g)
                                for (var e = 0, n = I.length; e < n; e++) I[e] && u.utils.arrayForEach(I[e].mappedNodes, function(n) {
                                    g(n, e, I[e].arrayEntry)
                                })
                        }
                        t = t || [], i = i || {};
                        for (var Q, a, c, F = u.utils.domData.get(n, I) === l, d = u.utils.domData.get(n, I) || [], b = u.utils.arrayMap(d, function(g) {
                                return g.arrayEntry
                            }), o = u.utils.compareArrays(b, t, i.dontLimitMoves), U = [], r = 0, G = 0, m = [], Z = [], V = [], W = [], h = [], x = 0; a = o[x]; x++) switch (c = a.moved, a.status) {
                            case "deleted":
                                c === l && (Q = d[r], Q.dependentObservable && (Q.dependentObservable.dispose(), Q.dependentObservable = l), u.utils.fixUpContinuousNodeArray(Q.mappedNodes, n).length && (i.beforeRemove && (U.push(Q), Z.push(Q), Q.arrayEntry === e ? Q = null : V[x] = Q), Q && m.push.apply(m, Q.mappedNodes))), r++;
                                break;
                            case "retained":
                                B(x, r++);
                                break;
                            case "added":
                                c !== l ? B(x, c) : (Q = {
                                    arrayEntry: a.value,
                                    indexObservable: u.observable(G++)
                                }, U.push(Q), Z.push(Q), F || (h[x] = Q))
                        }
                        u.utils.domData.set(n, I, U), A(i.beforeMove, W), u.utils.arrayForEach(m, i.beforeRemove ? u.cleanNode : u.removeNode);
                        for (var y, p, x = 0, R = u.virtualElements.firstChild(n); Q = Z[x]; x++) {
                            Q.mappedNodes || u.utils.extend(Q, g(n, C, Q.arrayEntry, s, Q.indexObservable));
                            for (var X = 0; p = Q.mappedNodes[X]; R = p.nextSibling, y = p, X++) p !== R && u.virtualElements.insertAfter(n, p, y);
                            !Q.initialized && s && (s(Q.arrayEntry, Q.mappedNodes, Q.indexObservable), Q.initialized = !0)
                        }
                        for (A(i.beforeRemove, V), x = 0; x < V.length; ++x) V[x] && (V[x].arrayEntry = e);
                        A(i.afterMove, W), A(i.afterAdd, h)
                    }
                }(), u.exportSymbol("utils.setDomNodeChildrenFromArrayMapping", u.utils.setDomNodeChildrenFromArrayMapping), u.nativeTemplateEngine = function() {
                    this.allowTemplateRewriting = !1
                }, u.nativeTemplateEngine.prototype = new u.templateEngine, u.nativeTemplateEngine.prototype.constructor = u.nativeTemplateEngine, u.nativeTemplateEngine.prototype.renderTemplateSource = function(g, I, e, n) {
                    var t = !(u.utils.ieVersion < 9),
                        C = t ? g.nodes : null,
                        l = C ? g.nodes() : null;
                    if (l) return u.utils.makeArray(l.cloneNode(!0).childNodes);
                    var i = g.text();
                    return u.utils.parseHtmlFragment(i, n)
                }, u.nativeTemplateEngine.instance = new u.nativeTemplateEngine, u.setTemplateEngine(u.nativeTemplateEngine.instance), u.exportSymbol("nativeTemplateEngine", u.nativeTemplateEngine),
                function() {
                    u.jqueryTmplTemplateEngine = function() {
                        function g() {
                            if (e < 2) throw new Error("Your version of jQuery.tmpl is too old. Please upgrade to jQuery.tmpl 1.0.0pre or later.")
                        }

                        function I(g, I, e) {
                            return A.tmpl(g, I, e)
                        }
                        var e = this.jQueryTmplVersion = function() {
                            if (!A || !A.tmpl) return 0;
                            try {
                                if (A.tmpl.tag.tmpl.open.toString().indexOf("__") >= 0) return 2
                            } catch (g) {}
                            return 1
                        }();
                        this.renderTemplateSource = function(e, n, t, C) {
                            C = C || s, t = t || {}, g();
                            var l = e.data("precompiled");
                            if (!l) {
                                var i = e.text() || "";
                                i = "{{ko_with $item.koBindingContext}}" + i + "{{/ko_with}}", l = A.template(null, i), e.data("precompiled", l)
                            }
                            var B = [n.$data],
                                Q = A.extend({
                                    koBindingContext: n
                                }, t.templateOptions),
                                a = I(l, B, Q);
                            return a.appendTo(C.createElement("div")), A.fragments = {}, a
                        }, this.createJavaScriptEvaluatorBlock = function(g) {
                            return "{{ko_code ((function() { return " + g + " })()) }}"
                        }, this.addTemplate = function(g, I) {
                            s.write("<script type='text/html' id='" + g + "'>" + I + "<\/script>")
                        }, e > 0 && (A.tmpl.tag.ko_code = {
                            open: "__.push($1 || '');"
                        }, A.tmpl.tag.ko_with = {
                            open: "with($1) {",
                            close: "} "
                        })
                    }, u.jqueryTmplTemplateEngine.prototype = new u.templateEngine, u.jqueryTmplTemplateEngine.prototype.constructor = u.jqueryTmplTemplateEngine;
                    var g = new u.jqueryTmplTemplateEngine;
                    g.jQueryTmplVersion > 0 && u.setTemplateEngine(g), u.exportSymbol("jqueryTmplTemplateEngine", u.jqueryTmplTemplateEngine)
                }()
        })
    }()
}()
}, 78: function(g, I, e) {
    (function(I) {
        g.exports = I.JsDiff = e(79)
    }).call(I, e(1))
}, 79: function(g, I, e) {
    "use strict";
    I.__esModule = !0, I.canonicalize = I.convertChangesToXML = I.convertChangesToDMP = I.parsePatch = I.applyPatches = I.applyPatch = I.createPatch = I.createTwoFilesPatch = I.structuredPatch = I.diffArrays = I.diffJson = I.diffCss = I.diffSentences = I.diffTrimmedLines = I.diffLines = I.diffWordsWithSpace = I.diffWords = I.diffChars = I.Diff = void 0;
    var n = e(62),
        t = function(g) {
            return g && g.__esModule ? g : {
                default: g
            }
        }(n),
        C = e(80),
        l = e(81),
        i = e(67),
        s = e(82),
        B = e(83),
        A = e(84),
        Q = e(85),
        a = e(86),
        c = e(70),
        F = e(88),
        d = e(89),
        u = e(90);
    I.Diff = t.default, I.diffChars = C.diffChars, I.diffWords = l.diffWords, I.diffWordsWithSpace = l.diffWordsWithSpace, I.diffLines = i.diffLines, I.diffTrimmedLines = i.diffTrimmedLines, I.diffSentences = s.diffSentences, I.diffCss = B.diffCss, I.diffJson = A.diffJson, I.diffArrays = Q.diffArrays, I.structuredPatch = F.structuredPatch, I.createTwoFilesPatch = F.createTwoFilesPatch, I.createPatch = F.createPatch, I.applyPatch = a.applyPatch, I.applyPatches = a.applyPatches, I.parsePatch = c.parsePatch, I.convertChangesToDMP = d.convertChangesToDMP, I.convertChangesToXML = u.convertChangesToXML, I.canonicalize = A.canonicalize
}, 80: function(g, I, e) {
    "use strict";

    function n(g, I, e) {
        return l.diff(g, I, e)
    }
    I.__esModule = !0, I.characterDiff = void 0, I.diffChars = n;
    var t = e(62),
        C = function(g) {
            return g && g.__esModule ? g : {
                default: g
            }
        }(t),
        l = I.characterDiff = new C.default
}, 81: function(g, I, e) {
    "use strict";

    function n(g, I, e) {
        var n = (0, i.generateOptions)(e, {
            ignoreWhitespace: !0
        });
        return A.diff(g, I, n)
    }

    function t(g, I, e) {
        return A.diff(g, I, e)
    }
    I.__esModule = !0, I.wordDiff = void 0, I.diffWords = n, I.diffWordsWithSpace = t;
    var C = e(62),
        l = function(g) {
            return g && g.__esModule ? g : {
                default: g
            }
        }(C),
        i = e(69),
        s = /^[A-Za-z\xC0-\u02C6\u02C8-\u02D7\u02DE-\u02FF\u1E00-\u1EFF]+$/,
        B = /\S/,
        A = I.wordDiff = new l.default;
    A.equals = function(g, I) {
        return g === I || this.options.ignoreWhitespace && !B.test(g) && !B.test(I)
    }, A.tokenize = function(g) {
        for (var I = g.split(/(\s+|\b)/), e = 0; e < I.length - 1; e++) !I[e + 1] && I[e + 2] && s.test(I[e]) && s.test(I[e + 2]) && (I[e] += I[e + 2], I.splice(e + 1, 2), e--);
        return I
    }
}, 82: function(g, I, e) {
    "use strict";

    function n(g, I, e) {
        return l.diff(g, I, e)
    }
    I.__esModule = !0, I.sentenceDiff = void 0, I.diffSentences = n;
    var t = e(62),
        C = function(g) {
            return g && g.__esModule ? g : {
                default: g
            }
        }(t),
        l = I.sentenceDiff = new C.default;
    l.tokenize = function(g) {
        return g.split(/(\S.+?[.!?])(?=\s+|$)/)
    }
}, 83: function(g, I, e) {
    "use strict";

    function n(g, I, e) {
        return l.diff(g, I, e)
    }
    I.__esModule = !0, I.cssDiff = void 0, I.diffCss = n;
    var t = e(62),
        C = function(g) {
            return g && g.__esModule ? g : {
                default: g
            }
        }(t),
        l = I.cssDiff = new C.default;
    l.tokenize = function(g) {
        return g.split(/([{}:;,]|\s+)/)
    }
}, 84: function(g, I, e) {
    "use strict";

    function n(g, I, e) {
        return A.diff(g, I, e)
    }

    function t(g, I, e) {
        I = I || [], e = e || [];
        var n = void 0;
        for (n = 0; n < I.length; n += 1)
            if (I[n] === g) return e[n];
        var l = void 0;
        if ("[object Array]" === B.call(g)) {
            for (I.push(g), l = new Array(g.length), e.push(l), n = 0; n < g.length; n += 1) l[n] = t(g[n], I, e);
            return I.pop(), e.pop(), l
        }
        if (g && g.toJSON && (g = g.toJSON()), "object" === (void 0 === g ? "undefined" : C(g)) && null !== g) {
            I.push(g), l = {}, e.push(l);
            var i = [],
                s = void 0;
            for (s in g) g.hasOwnProperty(s) && i.push(s);
            for (i.sort(), n = 0; n < i.length; n += 1) s = i[n], l[s] = t(g[s], I, e);
            I.pop(), e.pop()
        } else l = g;
        return l
    }
    I.__esModule = !0, I.jsonDiff = void 0;
    var C = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(g) {
        return typeof g
    } : function(g) {
        return g && "function" == typeof Symbol && g.constructor === Symbol ? "symbol" : typeof g
    };
    I.diffJson = n, I.canonicalize = t;
    var l = e(62),
        i = function(g) {
            return g && g.__esModule ? g : {
                default: g
            }
        }(l),
        s = e(67),
        B = Object.prototype.toString,
        A = I.jsonDiff = new i.default;
    A.useLongestToken = !0, A.tokenize = s.lineDiff.tokenize, A.castInput = function(g) {
        var I = this.options.undefinedReplacement;
        return "string" == typeof g ? g : JSON.stringify(t(g), function(g, e) {
            return void 0 === e ? I : e
        }, "  ")
    }, A.equals = function(g, I) {
        return i.default.prototype.equals(g.replace(/,([\r\n])/g, "$1"), I.replace(/,([\r\n])/g, "$1"))
    }
}, 85: function(g, I, e) {
    "use strict";

    function n(g, I, e) {
        return l.diff(g, I, e)
    }
    I.__esModule = !0, I.arrayDiff = void 0, I.diffArrays = n;
    var t = e(62),
        C = function(g) {
            return g && g.__esModule ? g : {
                default: g
            }
        }(t),
        l = I.arrayDiff = new C.default;
    l.tokenize = l.join = function(g) {
        return g.slice()
    }
}, 86: function(g, I, e) {
    "use strict";

    function n(g, I) {
        var e = arguments.length <= 2 || void 0 === arguments[2] ? {} : arguments[2];
        if ("string" == typeof I && (I = (0, C.parsePatch)(I)), Array.isArray(I)) {
            if (I.length > 1) throw new Error("applyPatch only works with a single input.");
            I = I[0]
        }
        for (var n = g.split(/\r\n|[\n\v\f\r\x85]/), t = g.match(/\r\n|[\n\v\f\r\x85]/g) || [], l = I.hunks, s = e.compareLine || function(g, I, e, n) {
                return I === n
            }, B = 0, A = e.fuzzFactor || 0, Q = 0, a = 0, c = void 0, F = void 0, d = 0; d < l.length; d++) {
            for (var u = l[d], b = n.length - u.oldLines, o = 0, U = a + u.oldStart - 1, r = (0, i.default)(U, Q, b); void 0 !== o; o = r())
                if (function(g, I) {
                        for (var e = 0; e < g.lines.length; e++) {
                            var t = g.lines[e],
                                C = t[0],
                                l = t.substr(1);
                            if (" " === C || "-" === C) {
                                if (!s(I + 1, n[I], C, l) && ++B > A) return !1;
                                I++
                            }
                        }
                        return !0
                    }(u, U + o)) {
                    u.offset = a += o;
                    break
                } if (void 0 === o) return !1;
            Q = u.offset + u.oldStart + u.oldLines
        }
        for (var G = 0; G < l.length; G++) {
            var m = l[G],
                Z = m.offset + m.newStart - 1;
            0 == m.newLines && Z++;
            for (var V = 0; V < m.lines.length; V++) {
                var W = m.lines[V],
                    h = W[0],
                    x = W.substr(1),
                    y = m.linedelimiters[V];
                if (" " === h) Z++;
                else if ("-" === h) n.splice(Z, 1), t.splice(Z, 1);
                else if ("+" === h) n.splice(Z, 0, x), t.splice(Z, 0, y), Z++;
                else if ("\\" === h) {
                    var p = m.lines[V - 1] ? m.lines[V - 1][0] : null;
                    "+" === p ? c = !0 : "-" === p && (F = !0)
                }
            }
        }
        if (c)
            for (; !n[n.length - 1];) n.pop(), t.pop();
        else F && (n.push(""), t.push("\n"));
        for (var R = 0; R < n.length - 1; R++) n[R] = n[R] + t[R];
        return n.join("")
    }

    function t(g, I) {
        function e() {
            var C = g[t++];
            if (!C) return I.complete();
            I.loadFile(C, function(g, t) {
                if (g) return I.complete(g);
                var l = n(t, C, I);
                I.patched(C, l, function(g) {
                    if (g) return I.complete(g);
                    e()
                })
            })
        }
        "string" == typeof g && (g = (0, C.parsePatch)(g));
        var t = 0;
        e()
    }
    I.__esModule = !0, I.applyPatch = n, I.applyPatches = t;
    var C = e(70),
        l = e(87),
        i = function(g) {
            return g && g.__esModule ? g : {
                default: g
            }
        }(l)
}, 87: function(g, I, e) {
    "use strict";
    I.__esModule = !0, I.default = function(g, I, e) {
        var n = !0,
            t = !1,
            C = !1,
            l = 1;
        return function i() {
            if (n && !C) {
                if (t ? l++ : n = !1, g + l <= e) return l;
                C = !0
            }
            if (!t) return C || (n = !0), I <= g - l ? -l++ : (t = !0, i())
        }
    }
}, 88: function(g, I, e) {
    "use strict";

    function n(g) {
        if (Array.isArray(g)) {
            for (var I = 0, e = Array(g.length); I < g.length; I++) e[I] = g[I];
            return e
        }
        return Array.from(g)
    }

    function t(g, I, e, t, C, l, s) {
        function B(g) {
            return g.map(function(g) {
                return " " + g
            })
        }
        s || (s = {}), void 0 === s.context && (s.context = 4);
        var A = (0, i.diffLines)(e, t, s);
        A.push({
            value: "",
            lines: []
        });
        for (var Q = [], a = 0, c = 0, F = [], d = 1, u = 1, b = 0; b < A.length; b++) ! function(g) {
            var I = A[g],
                C = I.lines || I.value.replace(/\n$/, "").split("\n");
            if (I.lines = C, I.added || I.removed) {
                var l;
                if (!a) {
                    var i = A[g - 1];
                    a = d, c = u, i && (F = s.context > 0 ? B(i.lines.slice(-s.context)) : [], a -= F.length, c -= F.length)
                }(l = F).push.apply(l, n(C.map(function(g) {
                    return (I.added ? "+" : "-") + g
                }))), I.added ? u += C.length : d += C.length
            } else {
                if (a)
                    if (C.length <= 2 * s.context && g < A.length - 2) {
                        var b;
                        (b = F).push.apply(b, n(B(C)))
                    } else {
                        var o, U = Math.min(C.length, s.context);
                        (o = F).push.apply(o, n(B(C.slice(0, U))));
                        var r = {
                            oldStart: a,
                            oldLines: d - a + U,
                            newStart: c,
                            newLines: u - c + U,
                            lines: F
                        };
                        if (g >= A.length - 2 && C.length <= s.context) {
                            var G = /\n$/.test(e),
                                m = /\n$/.test(t);
                            0 != C.length || G ? G && m || F.push("\\ No newline at end of file") : F.splice(r.oldLines, 0, "\\ No newline at end of file")
                        }
                        Q.push(r), a = 0, c = 0, F = []
                    } d += C.length, u += C.length
            }
        }(b);
        return {
            oldFileName: g,
            newFileName: I,
            oldHeader: C,
            newHeader: l,
            hunks: Q
        }
    }

    function C(g, I, e, n, C, l, i) {
        var s = t(g, I, e, n, C, l, i),
            B = [];
        g == I && B.push("Index: " + g), B.push("==================================================================="), B.push("--- " + s.oldFileName + (void 0 === s.oldHeader ? "" : "\t" + s.oldHeader)), B.push("+++ " + s.newFileName + (void 0 === s.newHeader ? "" : "\t" + s.newHeader));
        for (var A = 0; A < s.hunks.length; A++) {
            var Q = s.hunks[A];
            B.push("@@ -" + Q.oldStart + "," + Q.oldLines + " +" + Q.newStart + "," + Q.newLines + " @@"), B.push.apply(B, Q.lines)
        }
        return B.join("\n") + "\n"
    }

    function l(g, I, e, n, t, l) {
        return C(g, g, I, e, n, t, l)
    }
    I.__esModule = !0, I.structuredPatch = t, I.createTwoFilesPatch = C, I.createPatch = l;
    var i = e(67)
}, 89: function(g, I, e) {
    "use strict";

    function n(g) {
        for (var I = [], e = void 0, n = void 0, t = 0; t < g.length; t++) e = g[t], n = e.added ? 1 : e.removed ? -1 : 0, I.push([n, e.value]);
        return I
    }
    I.__esModule = !0, I.convertChangesToDMP = n
}, 90: function(g, I, e) {
    "use strict";

    function n(g) {
        for (var I = [], e = 0; e < g.length; e++) {
            var n = g[e];
            n.added ? I.push("<ins>") : n.removed && I.push("<del>"), I.push(t(n.value)), n.added ? I.push("</ins>") : n.removed && I.push("</del>")
        }
        return I.join("")
    }

    function t(g) {
        var I = g;
        return I = I.replace(/&/g, "&amp;"), I = I.replace(/</g, "&lt;"), I = I.replace(/>/g, "&gt;"), I = I.replace(/"/g, "&quot;")
    }
    I.__esModule = !0, I.convertChangesToXML = n
}, 91: function(g, I, e) {
    (function(I) {
        g.exports = I.kos = e(92)
    }).call(I, e(1))
}, 92: function(g, I, e) {
    ! function(g) {
        g(e(68))
    }(function(g) {
        function I(g, I) {
            var e = {};
            for (var n in g) e[n] = void 0 !== I[n] ? I[n] : g[n];
            return e
        }

        function e(g, I, e) {
            var I = Array.isArray(I) ? I : I.split(" ");
            return I.forEach(function(I) {
                g.classList[e](I)
            }), g
        }

        function n(g, I) {
            return e(g, I, "add")
        }

        function t(g, I) {
            return e(g, I, "remove")
        }

        function C(g, I) {
            return g.classList.contains(I)
        }
        var l = {
                customFileInputSystemOptions: {
                    wrapperClass: "custom-file-input-wrapper",
                    fileNameClass: "custom-file-input-file-name",
                    buttonGroupClass: "custom-file-input-button-group",
                    buttonClass: "custom-file-input-button",
                    clearButtonClass: "custom-file-input-clear-button",
                    buttonTextClass: "custom-file-input-button-text"
                },
                defaultOptions: {
                    wrapperClass: "input-group",
                    fileNameClass: "disabled form-control",
                    noFileText: "No file chosen",
                    buttonGroupClass: "input-group-btn",
                    buttonClass: "btn btn-primary",
                    clearButtonClass: "btn btn-default",
                    buttonText: "Choose File",
                    changeButtonText: "Change",
                    clearButtonText: "Clear",
                    fileName: !0,
                    clearButton: !0,
                    onClear: function(g, I) {
                        "function" == typeof g.clear && g.clear()
                    }
                }
            },
            i = window.URL || window.webkitURL;
        return g.bindingHandlers.fileInput = {
            init: function(I, e) {
                I.onchange = function() {
                    var n = g.utils.unwrapObservable(e()) || {};
                    n.dataUrl && (n.dataURL = n.dataUrl), n.objectUrl && (n.objectURL = n.objectUrl), n.file = n.file || g.observable(), n.fileArray = n.fileArray || g.observableArray([]);
                    var t = this.files[0];
                    if (n.fileArray([]), t) {
                        for (var C = [], l = 0; l < this.files.length; l++) C.push(this.files[l]);
                        n.fileArray(C), n.file(t)
                    }
                    n.clear || (n.clear = function() {
                        ["objectURL", "base64String", "binaryString", "text", "dataURL", "arrayBuffer"].forEach(function(I, e) {
                            if (n[I + "Array"] && g.isObservable(n[I + "Array"]))
                                for (var t = n[I + "Array"]; t().length;) {
                                    var C = t.splice(0, 1);
                                    "objectURL" == I && i.revokeObjectURL(C)
                                }
                            n[I] && g.isObservable(n[I]) && n[I](null)
                        }), I.value = "", n.fileArray([]), n.file(null)
                    }), g.isObservable(e()) && e()(n)
                }, I.onchange(), g.utils.domNodeDisposal.addDisposeCallback(I, function() {
                    (g.utils.unwrapObservable(e()) || {}).clear = void 0
                })
            },
            update: function(I, e, n) {
                function t(I, e) {
                    if (C.objectURL && g.isObservable(C.objectURL)) {
                        var n = I && i.createObjectURL(I);
                        if (n) {
                            var t = C.objectURL();
                            t && i.revokeObjectURL(t), C.objectURL(n)
                        }
                    }
                    C.base64String && g.isObservable(C.base64String) && (C.dataURL && g.isObservable(C.dataURL) || (C.dataURL = g.observable())), C.base64StringArray && g.isObservable(C.base64StringArray) && (C.dataURLArray && g.isObservable(C.dataURLArray) || (C.dataURLArray = g.observableArray())), ["binaryString", "text", "dataURL", "arrayBuffer"].forEach(function(n) {
                        var t = "readAs" + (n.substr(0, 1).toUpperCase() + n.substr(1));
                        if (!("dataURL" == n || C[n] && g.isObservable(C[n]))) return !0;
                        if (!I) return !0;
                        var l = new FileReader;
                        l.onload = function(I) {
                            function l(I, n) {
                                0 == e && C[n] && g.isObservable(C[n]) && C[n](I), C[n + "Array"] && g.isObservable(C[n + "Array"]) && (0 == e && C[n + "Array"]([]), C[n + "Array"].push(I))
                            }
                            if (l(I.target.result, n), "readAsDataURL" == t && (C.base64String || C.base64StringArray)) {
                                var i = I.target.result.split(",");
                                2 === i.length && l(i[1], "base64String")
                            }
                        }, l[t](I)
                    })
                }
                var C = g.utils.unwrapObservable(e());
                C.fileArray().forEach(function(g, I) {
                    t(g, I)
                })
            }
        }, g.bindingHandlers.fileDrag = {
            update: function(I, e, C) {
                var l = g.utils.unwrapObservable(e()) || {};
                I.getAttribute("file-drag-injected") || (n(I, "filedrag"), I.ondragover = I.ondragleave = I.ondrop = function(C) {
                    if (C.stopPropagation(), C.preventDefault(), "dragover" == C.type ? n(I, "hover") : t(I, "hover"), "drop" == C.type && C.dataTransfer) {
                        var i = C.dataTransfer.files,
                            s = i[0];
                        if (l.fileArray([]), s) {
                            for (var B = [], A = 0; A < i.length; A++) B.push(i[A]);
                            l.fileArray(B), l.file(s), g.isObservable(e()) && e()(l)
                        }
                    }
                }, I.setAttribute("file-drag-injected", 1))
            }
        }, g.bindingHandlers.customFileInput = {
            init: function(e, i, s) {
                var B = g.utils.unwrapObservable(i());
                if (!1 !== B) {
                    "object" != typeof B && (B = {});
                    var A = l.customFileInputSystemOptions;
                    B = I(l.defaultOptions, B);
                    var Q = n(document.createElement("span"), [A.wrapperClass, B.wrapperClass]),
                        a = n(document.createElement("span"), [A.buttonGroupClass, B.buttonGroupClass]),
                        c = n(document.createElement("span"), A.buttonClass);
                    if (a.appendChild(c), Q.appendChild(a), e.parentNode.insertBefore(Q, e), c.appendChild(e), B.fileName) {
                        var F = document.createElement("input");
                        F.setAttribute("type", "text"), F.setAttribute("disabled", "disabled"), a.parentNode.insertBefore(n(F, A.fileNameClass), a), C(a, "btn-group") && n(t(a, "btn-group"), "input-group-btn")
                    } else C(a, "input-group-btn") && n(t(a, "input-group-btn"), "btn-group");
                    e.parentNode.insertBefore(n(document.createElement("span"), A.buttonTextClass), e)
                }
            },
            update: function(e, t, C) {
                var i = g.utils.unwrapObservable(t());
                if (!1 !== i) {
                    "object" != typeof i && (i = {});
                    var s = l.customFileInputSystemOptions;
                    i = I(l.defaultOptions, i);
                    var B = C();
                    if (B.fileInput) {
                        var A = g.utils.unwrapObservable(B.fileInput) || {},
                            Q = g.utils.unwrapObservable(A.file),
                            a = e.parentNode,
                            c = a.parentNode,
                            F = c.parentNode;
                        n(a, g.utils.unwrapObservable(i.buttonClass));
                        if (a.querySelector("." + s.buttonTextClass).innerText = g.utils.unwrapObservable(Q ? i.changeButtonText : i.buttonText), i.fileName) {
                            var d = F.querySelector("." + s.fileNameClass);
                            n(d, g.utils.unwrapObservable(i.fileNameClass)), Q && Q.name ? A.fileArray().length > 2 ? d.value = A.fileArray().length + " files" : d.value = A.fileArray().map(function(g) {
                                return g.name
                            }).join(", ") : d.value = g.utils.unwrapObservable(i.noFileText)
                        }
                        var u = c.querySelector("." + s.clearButtonClass);
                        u || (u = n(document.createElement("span"), s.clearButtonClass), u.onclick = function(g) {
                            i.onClear(A, i)
                        }, c.appendChild(u)), u.innerText = g.utils.unwrapObservable(i.clearButtonText), n(u, g.utils.unwrapObservable(i.clearButtonClass)), Q && i.clearButton && Q.name || u.parentNode.removeChild(u)
                    }
                }
            }
        }, g.fileBindings = l, l
    })
}, 93: function(g, I, e) {
    (function(I) {
        g.exports = I.anumeric = e(94)
    }).call(I, e(1))
}, 94: function(module, exports, __webpack_require__) {
    ! function(g, I) {
        module.exports = I()
    }(0, function() {
        return function(g) {
            function I(n) {
                if (e[n]) return e[n].exports;
                var t = e[n] = {
                    exports: {},
                    id: n,
                    loaded: !1
                };
                return g[n].call(t.exports, t, t.exports, I), t.loaded = !0, t.exports
            }
            var e = {};
            return I.m = g, I.c = e, I.p = "", I(0)
        }([function(g, I, e) {
            e(8), g.exports = e(1)
        }, function(module, exports, __webpack_require__) {
        }, function(module, exports) {
            eval("/*** IMPORTS FROM imports-loader ***/\n(function() {\n\n'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n/**\n * Enumerations for autoNumeric.js\n * @author Alexandre Bonneau <alexandre.bonneau@linuxfr.eu>\n * @copyright © 2016 Alexandre Bonneau\n *\n * The MIT License (http://www.opensource.org/licenses/mit-license.php)\n *\n * Permission is hereby granted, free of charge, to any person\n * obtaining a copy of this software and associated documentation\n * files (the \"Software\"), to deal in the Software without\n * restriction, including without limitation the rights to use,\n * copy, modify, merge, publish, distribute, sub license, and/or sell\n * copies of the Software, and to permit persons to whom the\n * Software is furnished to do so, subject to the following\n * conditions:\n *\n * The above copyright notice and this permission notice shall be\n * included in all copies or substantial portions of the Software.\n *\n * THE SOFTWARE IS PROVIDED \"AS IS\", WITHOUT WARRANTY OF ANY KIND,\n * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES\n * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND\n * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT\n * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,\n * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING\n * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR\n * OTHER DEALINGS IN THE SOFTWARE.\n */\n\n/**\n * Object that store the helper enumerations\n * @type {{ allowedTagList: [string], keyCode: {}, fromCharCodeKeyCode: [string], keyName: {} }}\n */\nvar AutoNumericEnum = {\n    /**\n     * List of allowed tag on which autoNumeric can be used.\n     */\n    get allowedTagList() {\n        return ['b', 'caption', 'cite', 'code', 'const', 'dd', 'del', 'div', 'dfn', 'dt', 'em', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'input', 'ins', 'kdb', 'label', 'li', 'option', 'output', 'p', 'q', 's', 'sample', 'span', 'strong', 'td', 'th', 'u'];\n    },\n\n    /**\n     * Wrapper variable that hold named keyboard keys with their respective keyCode as seen in DOM events.\n     * cf. https://developer.mozilla.org/en-US/docs/Web/API/KeyboardEvent/keyCode\n     *\n     * This deprecated information is used for obsolete browsers.\n     * @deprecated\n     */\n    get keyCode() {\n        return {\n            Backspace: 8,\n            Tab: 9,\n            // No 10, 11\n            // 12 === NumpadEqual on Windows\n            // 12 === NumLock on Mac\n            Enter: 13,\n            // 14 reserved, but not used\n            // 15 does not exists\n            Shift: 16,\n            Ctrl: 17,\n            Alt: 18,\n            Pause: 19,\n            CapsLock: 20,\n            // 21, 22, 23, 24, 25 : Asiatic key codes\n            // 26 does not exists\n            Esc: 27,\n            // 28, 29, 30, 31 : Convert, NonConvert, Accept and ModeChange keys\n            Space: 32,\n            PageUp: 33,\n            PageDown: 34,\n            End: 35,\n            Home: 36,\n            LeftArrow: 37,\n            UpArrow: 38,\n            RightArrow: 39,\n            DownArrow: 40,\n            Insert: 45,\n            Delete: 46,\n            num0: 48,\n            num1: 49,\n            num2: 50,\n            num3: 51,\n            num4: 52,\n            num5: 53,\n            num6: 54,\n            num7: 55,\n            num8: 56,\n            num9: 57,\n            a: 65,\n            b: 66,\n            c: 67,\n            d: 68,\n            e: 69,\n            f: 70,\n            g: 71,\n            h: 72,\n            i: 73,\n            j: 74,\n            k: 75,\n            l: 76,\n            m: 77,\n            n: 78,\n            o: 79,\n            p: 80,\n            q: 81,\n            r: 82,\n            s: 83,\n            t: 84,\n            u: 85,\n            v: 86,\n            w: 87,\n            x: 88,\n            y: 89,\n            z: 90,\n            OSLeft: 91,\n            OSRight: 92,\n            ContextMenu: 93,\n            numpad0: 96,\n            numpad1: 97,\n            numpad2: 98,\n            numpad3: 99,\n            numpad4: 100,\n            numpad5: 101,\n            numpad6: 102,\n            numpad7: 103,\n            numpad8: 104,\n            numpad9: 105,\n            MultiplyNumpad: 106,\n            PlusNumpad: 107,\n            MinusNumpad: 109,\n            DotNumpad: 110,\n            SlashNumpad: 111,\n            F1: 112,\n            F2: 113,\n            F3: 114,\n            F4: 115,\n            F5: 116,\n            F6: 117,\n            F7: 118,\n            F8: 119,\n            F9: 120,\n            F10: 121,\n            F11: 122,\n            F12: 123,\n            NumLock: 144,\n            ScrollLock: 145,\n            MyComputer: 182,\n            MyCalculator: 183,\n            Semicolon: 186,\n            Equal: 187,\n            Comma: 188,\n            Hyphen: 189,\n            Dot: 190,\n            Slash: 191,\n            Backquote: 192,\n            LeftBracket: 219,\n            Backslash: 220,\n            RightBracket: 221,\n            Quote: 222,\n            Command: 224,\n            AltGraph: 225,\n            AndroidDefault: 229 // Android Chrome returns the same keycode number 229 for all keys pressed\n        };\n    },\n\n    /**\n     * This object is the reverse of `keyCode`, and is used to translate the key code to named keys when no valid characters can be obtained by `String.fromCharCode`.\n     * This object keys correspond to the `event.keyCode` number, and returns the corresponding key name (à la event.key)\n     */\n    get fromCharCodeKeyCode() {\n        return {\n            0: 'LaunchCalculator',\n            8: 'Backspace',\n            9: 'Tab',\n            13: 'Enter',\n            16: 'Shift',\n            17: 'Ctrl',\n            18: 'Alt',\n            19: 'Pause',\n            20: 'CapsLock',\n            27: 'Escape',\n            32: ' ',\n            33: 'PageUp',\n            34: 'PageDown',\n            35: 'End',\n            36: 'Home',\n            37: 'ArrowLeft',\n            38: 'ArrowUp',\n            39: 'ArrowRight',\n            40: 'ArrowDown',\n            45: 'Insert',\n            46: 'Delete',\n            48: '0',\n            49: '1',\n            50: '2',\n            51: '3',\n            52: '4',\n            53: '5',\n            54: '6',\n            55: '7',\n            56: '8',\n            57: '9',\n            // 65: 'a',\n            // 66: 'b',\n            // 67: 'c',\n            // 68: 'd',\n            // 69: 'e',\n            // 70: 'f',\n            // 71: 'g',\n            // 72: 'h',\n            // 73: 'i',\n            // 74: 'j',\n            // 75: 'k',\n            // 76: 'l',\n            // 77: 'm',\n            // 78: 'n',\n            // 79: 'o',\n            // 80: 'p',\n            // 81: 'q',\n            // 82: 'r',\n            // 83: 's',\n            // 84: 't',\n            // 85: 'u',\n            // 86: 'v',\n            // 87: 'w',\n            // 88: 'x',\n            // 89: 'y',\n            // 90: 'z',\n            91: 'OS', // Note: Firefox and Chrome reports 'OS' instead of 'OSLeft'\n            92: 'OSRight',\n            93: 'ContextMenu',\n            96: '0',\n            97: '1',\n            98: '2',\n            99: '3',\n            100: '4',\n            101: '5',\n            102: '6',\n            103: '7',\n            104: '8',\n            105: '9',\n            106: '*',\n            107: '+',\n            109: '-',\n            110: '.',\n            111: '/',\n            112: 'F1',\n            113: 'F2',\n            114: 'F3',\n            115: 'F4',\n            116: 'F5',\n            117: 'F6',\n            118: 'F7',\n            119: 'F8',\n            120: 'F9',\n            121: 'F10',\n            122: 'F11',\n            123: 'F12',\n            144: 'NumLock',\n            145: 'ScrollLock',\n            182: 'MyComputer',\n            183: 'MyCalculator',\n            186: ';',\n            187: '=',\n            188: ',',\n            189: '-',\n            190: '.',\n            191: '/',\n            192: '`',\n            219: '[',\n            220: '\\\\',\n            221: ']',\n            222: '\\'',\n            224: 'Meta',\n            225: 'AltGraph'\n        };\n    },\n\n    /**\n     * Wrapper variable that hold named keyboard keys with their respective key name (as set in KeyboardEvent.key).\n     * Those names are listed here :\n     * @link https://developer.mozilla.org/en-US/docs/Web/API/KeyboardEvent/key/Key_Values\n     */\n    get keyName() {\n        return {\n            // Special values\n            Unidentified: 'Unidentified',\n            AndroidDefault: 'AndroidDefault',\n\n            // Modifier keys\n            Alt: 'Alt',\n            AltGr: 'AltGraph',\n            CapsLock: 'CapsLock', // Under Chrome, e.key is empty for CapsLock\n            Ctrl: 'Control',\n            Fn: 'Fn',\n            FnLock: 'FnLock',\n            Hyper: 'Hyper', // 'OS' under Firefox\n            Meta: 'Meta',\n            OSLeft: 'OS',\n            OSRight: 'OS',\n            Command: 'OS',\n            NumLock: 'NumLock',\n            ScrollLock: 'ScrollLock',\n            Shift: 'Shift',\n            Super: 'Super', // 'OS' under Firefox\n            Symbol: 'Symbol',\n            SymbolLock: 'SymbolLock',\n\n            // Whitespace keys\n            Enter: 'Enter',\n            Tab: 'Tab',\n            Space: ' ', // 'Spacebar' for Firefox <37, and IE9\n\n            // Navigation keys\n            LeftArrow: 'ArrowLeft', // 'Left' for Firefox <=36, and IE9\n            UpArrow: 'ArrowUp', // 'Up' for Firefox <=36, and IE9\n            RightArrow: 'ArrowRight', // 'Right' for Firefox <=36, and IE9\n            DownArrow: 'ArrowDown', // 'Down' for Firefox <=36, and IE9\n            End: 'End',\n            Home: 'Home',\n            PageUp: 'PageUp',\n            PageDown: 'PageDown',\n\n            // Editing keys\n            Backspace: 'Backspace',\n            Clear: 'Clear',\n            Copy: 'Copy',\n            CrSel: 'CrSel', // 'Crsel' for Firefox <=36, and IE9\n            Cut: 'Cut',\n            Delete: 'Delete', // 'Del' for Firefox <=36, and IE9\n            EraseEof: 'EraseEof',\n            ExSel: 'ExSel', // 'Exsel' for Firefox <=36, and IE9\n            Insert: 'Insert',\n            Paste: 'Paste',\n            Redo: 'Redo',\n            Undo: 'Undo',\n\n            // UI keys\n            Accept: 'Accept',\n            Again: 'Again',\n            Attn: 'Attn', // 'Unidentified' for Firefox, Chrome, and IE9 ('KanaMode' when using the Japanese keyboard layout)\n            Cancel: 'Cancel',\n            ContextMenu: 'ContextMenu', // 'Apps' for Firefox <=36, and IE9\n            Esc: 'Escape', // 'Esc' for Firefox <=36, and IE9\n            Execute: 'Execute',\n            Find: 'Find',\n            Finish: 'Finish', // 'Unidentified' for Firefox, Chrome, and IE9 ('Katakana' when using the Japanese keyboard layout)\n            Help: 'Help',\n            Pause: 'Pause',\n            Play: 'Play',\n            Props: 'Props',\n            Select: 'Select',\n            ZoomIn: 'ZoomIn',\n            ZoomOut: 'ZoomOut',\n\n            // Device keys\n            BrightnessDown: 'BrightnessDown',\n            BrightnessUp: 'BrightnessUp',\n            Eject: 'Eject',\n            LogOff: 'LogOff',\n            Power: 'Power',\n            PowerOff: 'PowerOff',\n            PrintScreen: 'PrintScreen',\n            Hibernate: 'Hibernate', // 'Unidentified' for Firefox <=37\n            Standby: 'Standby', // 'Unidentified' for Firefox <=36, and IE9\n            WakeUp: 'WakeUp',\n\n            // IME and composition keys\n            Compose: 'Compose',\n            Dead: 'Dead',\n\n            // Function keys\n            F1: 'F1',\n            F2: 'F2',\n            F3: 'F3',\n            F4: 'F4',\n            F5: 'F5',\n            F6: 'F6',\n            F7: 'F7',\n            F8: 'F8',\n            F9: 'F9',\n            F10: 'F10',\n            F11: 'F11',\n            F12: 'F12',\n\n            // Document keys\n            Print: 'Print',\n\n            // 'Normal' keys\n            num0: '0',\n            num1: '1',\n            num2: '2',\n            num3: '3',\n            num4: '4',\n            num5: '5',\n            num6: '6',\n            num7: '7',\n            num8: '8',\n            num9: '9',\n            a: 'a',\n            b: 'b',\n            c: 'c',\n            d: 'd',\n            e: 'e',\n            f: 'f',\n            g: 'g',\n            h: 'h',\n            i: 'i',\n            j: 'j',\n            k: 'k',\n            l: 'l',\n            m: 'm',\n            n: 'n',\n            o: 'o',\n            p: 'p',\n            q: 'q',\n            r: 'r',\n            s: 's',\n            t: 't',\n            u: 'u',\n            v: 'v',\n            w: 'w',\n            x: 'x',\n            y: 'y',\n            z: 'z',\n            A: 'A',\n            B: 'B',\n            C: 'C',\n            D: 'D',\n            E: 'E',\n            F: 'F',\n            G: 'G',\n            H: 'H',\n            I: 'I',\n            J: 'J',\n            K: 'K',\n            L: 'L',\n            M: 'M',\n            N: 'N',\n            O: 'O',\n            P: 'P',\n            Q: 'Q',\n            R: 'R',\n            S: 'S',\n            T: 'T',\n            U: 'U',\n            V: 'V',\n            W: 'W',\n            X: 'X',\n            Y: 'Y',\n            Z: 'Z',\n            Semicolon: ';',\n            Equal: '=',\n            Comma: ',',\n            Hyphen: '-',\n            Minus: '-',\n            Plus: '+',\n            Dot: '.',\n            Slash: '/',\n            Backquote: '`',\n            LeftBracket: '[',\n            RightBracket: ']',\n            Backslash: '\\\\',\n            Quote: \"'\",\n\n            // Numeric keypad keys\n            numpad0: '0',\n            numpad1: '1',\n            numpad2: '2',\n            numpad3: '3',\n            numpad4: '4',\n            numpad5: '5',\n            numpad6: '6',\n            numpad7: '7',\n            numpad8: '8',\n            numpad9: '9',\n            NumpadDot: '.',\n            NumpadDotAlt: ',', // Modern browsers automatically adapt the character sent by this key to the decimal character of the current language\n            NumpadMultiply: '*',\n            NumpadPlus: '+',\n            NumpadMinus: '-',\n            NumpadSlash: '/',\n            NumpadDotObsoleteBrowsers: 'Decimal',\n            NumpadMultiplyObsoleteBrowsers: 'Multiply',\n            NumpadPlusObsoleteBrowsers: 'Add',\n            NumpadMinusObsoleteBrowsers: 'Subtract',\n            NumpadSlashObsoleteBrowsers: 'Divide',\n\n            // Special arrays for quicker tests\n            _allFnKeys: ['F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8', 'F9', 'F10', 'F11', 'F12'],\n            _someNonPrintableKeys: ['Tab', 'Enter', 'Shift', 'ShiftLeft', 'ShiftRight', 'Control', 'ControlLeft', 'ControlRight', 'Alt', 'AltLeft', 'AltRight', 'Pause', 'CapsLock', 'Escape'],\n            _directionKeys: ['PageUp', 'PageDown', 'End', 'Home', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowUp']\n        };\n    }\n};\n\nexports.default = AutoNumericEnum;\n}.call(window));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvQXV0b051bWVyaWNFbnVtLmpzP2M1N2MiXSwibmFtZXMiOlsiQXV0b051bWVyaWNFbnVtIiwiYWxsb3dlZFRhZ0xpc3QiLCJrZXlDb2RlIiwiQmFja3NwYWNlIiwiVGFiIiwiRW50ZXIiLCJTaGlmdCIsIkN0cmwiLCJBbHQiLCJQYXVzZSIsIkNhcHNMb2NrIiwiRXNjIiwiU3BhY2UiLCJQYWdlVXAiLCJQYWdlRG93biIsIkVuZCIsIkhvbWUiLCJMZWZ0QXJyb3ciLCJVcEFycm93IiwiUmlnaHRBcnJvdyIsIkRvd25BcnJvdyIsIkluc2VydCIsIkRlbGV0ZSIsIm51bTAiLCJudW0xIiwibnVtMiIsIm51bTMiLCJudW00IiwibnVtNSIsIm51bTYiLCJudW03IiwibnVtOCIsIm51bTkiLCJhIiwiYiIsImMiLCJkIiwiZSIsImYiLCJnIiwiaCIsImkiLCJqIiwiayIsImwiLCJtIiwibiIsIm8iLCJwIiwicSIsInIiLCJzIiwidCIsInUiLCJ2IiwidyIsIngiLCJ5IiwieiIsIk9TTGVmdCIsIk9TUmlnaHQiLCJDb250ZXh0TWVudSIsIm51bXBhZDAiLCJudW1wYWQxIiwibnVtcGFkMiIsIm51bXBhZDMiLCJudW1wYWQ0IiwibnVtcGFkNSIsIm51bXBhZDYiLCJudW1wYWQ3IiwibnVtcGFkOCIsIm51bXBhZDkiLCJNdWx0aXBseU51bXBhZCIsIlBsdXNOdW1wYWQiLCJNaW51c051bXBhZCIsIkRvdE51bXBhZCIsIlNsYXNoTnVtcGFkIiwiRjEiLCJGMiIsIkYzIiwiRjQiLCJGNSIsIkY2IiwiRjciLCJGOCIsIkY5IiwiRjEwIiwiRjExIiwiRjEyIiwiTnVtTG9jayIsIlNjcm9sbExvY2siLCJNeUNvbXB1dGVyIiwiTXlDYWxjdWxhdG9yIiwiU2VtaWNvbG9uIiwiRXF1YWwiLCJDb21tYSIsIkh5cGhlbiIsIkRvdCIsIlNsYXNoIiwiQmFja3F1b3RlIiwiTGVmdEJyYWNrZXQiLCJCYWNrc2xhc2giLCJSaWdodEJyYWNrZXQiLCJRdW90ZSIsIkNvbW1hbmQiLCJBbHRHcmFwaCIsIkFuZHJvaWREZWZhdWx0IiwiZnJvbUNoYXJDb2RlS2V5Q29kZSIsImtleU5hbWUiLCJVbmlkZW50aWZpZWQiLCJBbHRHciIsIkZuIiwiRm5Mb2NrIiwiSHlwZXIiLCJNZXRhIiwiU3VwZXIiLCJTeW1ib2wiLCJTeW1ib2xMb2NrIiwiQ2xlYXIiLCJDb3B5IiwiQ3JTZWwiLCJDdXQiLCJFcmFzZUVvZiIsIkV4U2VsIiwiUGFzdGUiLCJSZWRvIiwiVW5kbyIsIkFjY2VwdCIsIkFnYWluIiwiQXR0biIsIkNhbmNlbCIsIkV4ZWN1dGUiLCJGaW5kIiwiRmluaXNoIiwiSGVscCIsIlBsYXkiLCJQcm9wcyIsIlNlbGVjdCIsIlpvb21JbiIsIlpvb21PdXQiLCJCcmlnaHRuZXNzRG93biIsIkJyaWdodG5lc3NVcCIsIkVqZWN0IiwiTG9nT2ZmIiwiUG93ZXIiLCJQb3dlck9mZiIsIlByaW50U2NyZWVuIiwiSGliZXJuYXRlIiwiU3RhbmRieSIsIldha2VVcCIsIkNvbXBvc2UiLCJEZWFkIiwiUHJpbnQiLCJBIiwiQiIsIkMiLCJEIiwiRSIsIkYiLCJHIiwiSCIsIkkiLCJKIiwiSyIsIkwiLCJNIiwiTiIsIk8iLCJQIiwiUSIsIlIiLCJTIiwiVCIsIlUiLCJWIiwiVyIsIlgiLCJZIiwiWiIsIk1pbnVzIiwiUGx1cyIsIk51bXBhZERvdCIsIk51bXBhZERvdEFsdCIsIk51bXBhZE11bHRpcGx5IiwiTnVtcGFkUGx1cyIsIk51bXBhZE1pbnVzIiwiTnVtcGFkU2xhc2giLCJOdW1wYWREb3RPYnNvbGV0ZUJyb3dzZXJzIiwiTnVtcGFkTXVsdGlwbHlPYnNvbGV0ZUJyb3dzZXJzIiwiTnVtcGFkUGx1c09ic29sZXRlQnJvd3NlcnMiLCJOdW1wYWRNaW51c09ic29sZXRlQnJvd3NlcnMiLCJOdW1wYWRTbGFzaE9ic29sZXRlQnJvd3NlcnMiLCJfYWxsRm5LZXlzIiwiX3NvbWVOb25QcmludGFibGVLZXlzIiwiX2RpcmVjdGlvbktleXMiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7O0FBQUE7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBNkJBOzs7O0FBSUEsSUFBTUEsa0JBQWtCO0FBQ3BCOzs7QUFHQSxRQUFJQyxjQUFKLEdBQXFCO0FBQ2pCLGVBQU8sQ0FDSCxHQURHLEVBRUgsU0FGRyxFQUdILE1BSEcsRUFJSCxNQUpHLEVBS0gsT0FMRyxFQU1ILElBTkcsRUFPSCxLQVBHLEVBUUgsS0FSRyxFQVNILEtBVEcsRUFVSCxJQVZHLEVBV0gsSUFYRyxFQVlILElBWkcsRUFhSCxJQWJHLEVBY0gsSUFkRyxFQWVILElBZkcsRUFnQkgsSUFoQkcsRUFpQkgsSUFqQkcsRUFrQkgsT0FsQkcsRUFtQkgsS0FuQkcsRUFvQkgsS0FwQkcsRUFxQkgsT0FyQkcsRUFzQkgsSUF0QkcsRUF1QkgsUUF2QkcsRUF3QkgsUUF4QkcsRUF5QkgsR0F6QkcsRUEwQkgsR0ExQkcsRUEyQkgsR0EzQkcsRUE0QkgsUUE1QkcsRUE2QkgsTUE3QkcsRUE4QkgsUUE5QkcsRUErQkgsSUEvQkcsRUFnQ0gsSUFoQ0csRUFpQ0gsR0FqQ0csQ0FBUDtBQW1DSCxLQXhDbUI7O0FBMENwQjs7Ozs7OztBQU9BLFFBQUlDLE9BQUosR0FBYztBQUNWLGVBQU87QUFDSEMsdUJBQWdCLENBRGI7QUFFSEMsaUJBQWdCLENBRmI7QUFHSDtBQUNBO0FBQ0E7QUFDQUMsbUJBQWdCLEVBTmI7QUFPSDtBQUNBO0FBQ0FDLG1CQUFnQixFQVRiO0FBVUhDLGtCQUFnQixFQVZiO0FBV0hDLGlCQUFnQixFQVhiO0FBWUhDLG1CQUFnQixFQVpiO0FBYUhDLHNCQUFnQixFQWJiO0FBY0g7QUFDQTtBQUNBQyxpQkFBZ0IsRUFoQmI7QUFpQkg7QUFDQUMsbUJBQWdCLEVBbEJiO0FBbUJIQyxvQkFBZ0IsRUFuQmI7QUFvQkhDLHNCQUFnQixFQXBCYjtBQXFCSEMsaUJBQWdCLEVBckJiO0FBc0JIQyxrQkFBZ0IsRUF0QmI7QUF1QkhDLHVCQUFnQixFQXZCYjtBQXdCSEMscUJBQWdCLEVBeEJiO0FBeUJIQyx3QkFBZ0IsRUF6QmI7QUEwQkhDLHVCQUFnQixFQTFCYjtBQTJCSEMsb0JBQWdCLEVBM0JiO0FBNEJIQyxvQkFBZ0IsRUE1QmI7QUE2QkhDLGtCQUFnQixFQTdCYjtBQThCSEMsa0JBQWdCLEVBOUJiO0FBK0JIQyxrQkFBZ0IsRUEvQmI7QUFnQ0hDLGtCQUFnQixFQWhDYjtBQWlDSEMsa0JBQWdCLEVBakNiO0FBa0NIQyxrQkFBZ0IsRUFsQ2I7QUFtQ0hDLGtCQUFnQixFQW5DYjtBQW9DSEMsa0JBQWdCLEVBcENiO0FBcUNIQyxrQkFBZ0IsRUFyQ2I7QUFzQ0hDLGtCQUFnQixFQXRDYjtBQXVDSEMsZUFBZ0IsRUF2Q2I7QUF3Q0hDLGVBQWdCLEVBeENiO0FBeUNIQyxlQUFnQixFQXpDYjtBQTBDSEMsZUFBZ0IsRUExQ2I7QUEyQ0hDLGVBQWdCLEVBM0NiO0FBNENIQyxlQUFnQixFQTVDYjtBQTZDSEMsZUFBZ0IsRUE3Q2I7QUE4Q0hDLGVBQWdCLEVBOUNiO0FBK0NIQyxlQUFnQixFQS9DYjtBQWdESEMsZUFBZ0IsRUFoRGI7QUFpREhDLGVBQWdCLEVBakRiO0FBa0RIQyxlQUFnQixFQWxEYjtBQW1ESEMsZUFBZ0IsRUFuRGI7QUFvREhDLGVBQWdCLEVBcERiO0FBcURIQyxlQUFnQixFQXJEYjtBQXNESEMsZUFBZ0IsRUF0RGI7QUF1REhDLGVBQWdCLEVBdkRiO0FBd0RIQyxlQUFnQixFQXhEYjtBQXlESEMsZUFBZ0IsRUF6RGI7QUEwREhDLGVBQWdCLEVBMURiO0FBMkRIQyxlQUFnQixFQTNEYjtBQTRESEMsZUFBZ0IsRUE1RGI7QUE2REhDLGVBQWdCLEVBN0RiO0FBOERIQyxlQUFnQixFQTlEYjtBQStESEMsZUFBZ0IsRUEvRGI7QUFnRUhDLGVBQWdCLEVBaEViO0FBaUVIQyxvQkFBZ0IsRUFqRWI7QUFrRUhDLHFCQUFnQixFQWxFYjtBQW1FSEMseUJBQWdCLEVBbkViO0FBb0VIQyxxQkFBZ0IsRUFwRWI7QUFxRUhDLHFCQUFnQixFQXJFYjtBQXNFSEMscUJBQWdCLEVBdEViO0FBdUVIQyxxQkFBZ0IsRUF2RWI7QUF3RUhDLHFCQUFnQixHQXhFYjtBQXlFSEMscUJBQWdCLEdBekViO0FBMEVIQyxxQkFBZ0IsR0ExRWI7QUEyRUhDLHFCQUFnQixHQTNFYjtBQTRFSEMscUJBQWdCLEdBNUViO0FBNkVIQyxxQkFBZ0IsR0E3RWI7QUE4RUhDLDRCQUFnQixHQTlFYjtBQStFSEMsd0JBQWdCLEdBL0ViO0FBZ0ZIQyx5QkFBZ0IsR0FoRmI7QUFpRkhDLHVCQUFnQixHQWpGYjtBQWtGSEMseUJBQWdCLEdBbEZiO0FBbUZIQyxnQkFBZ0IsR0FuRmI7QUFvRkhDLGdCQUFnQixHQXBGYjtBQXFGSEMsZ0JBQWdCLEdBckZiO0FBc0ZIQyxnQkFBZ0IsR0F0RmI7QUF1RkhDLGdCQUFnQixHQXZGYjtBQXdGSEMsZ0JBQWdCLEdBeEZiO0FBeUZIQyxnQkFBZ0IsR0F6RmI7QUEwRkhDLGdCQUFnQixHQTFGYjtBQTJGSEMsZ0JBQWdCLEdBM0ZiO0FBNEZIQyxpQkFBZ0IsR0E1RmI7QUE2RkhDLGlCQUFnQixHQTdGYjtBQThGSEMsaUJBQWdCLEdBOUZiO0FBK0ZIQyxxQkFBZ0IsR0EvRmI7QUFnR0hDLHdCQUFnQixHQWhHYjtBQWlHSEMsd0JBQWdCLEdBakdiO0FBa0dIQywwQkFBZ0IsR0FsR2I7QUFtR0hDLHVCQUFnQixHQW5HYjtBQW9HSEMsbUJBQWdCLEdBcEdiO0FBcUdIQyxtQkFBZ0IsR0FyR2I7QUFzR0hDLG9CQUFnQixHQXRHYjtBQXVHSEMsaUJBQWdCLEdBdkdiO0FBd0dIQyxtQkFBZ0IsR0F4R2I7QUF5R0hDLHVCQUFnQixHQXpHYjtBQTBHSEMseUJBQWdCLEdBMUdiO0FBMkdIQyx1QkFBZ0IsR0EzR2I7QUE0R0hDLDBCQUFnQixHQTVHYjtBQTZHSEMsbUJBQWdCLEdBN0diO0FBOEdIQyxxQkFBZ0IsR0E5R2I7QUErR0hDLHNCQUFnQixHQS9HYjtBQWdISEMsNEJBQWdCLEdBaEhiLENBZ0hrQjtBQWhIbEIsU0FBUDtBQWtISCxLQXBLbUI7O0FBc0twQjs7OztBQUlBLFFBQUlDLG1CQUFKLEdBQTBCO0FBQ3RCLGVBQU87QUFDSCxlQUFLLGtCQURGO0FBRUgsZUFBSyxXQUZGO0FBR0gsZUFBSyxLQUhGO0FBSUgsZ0JBQUssT0FKRjtBQUtILGdCQUFLLE9BTEY7QUFNSCxnQkFBSyxNQU5GO0FBT0gsZ0JBQUssS0FQRjtBQVFILGdCQUFLLE9BUkY7QUFTSCxnQkFBSyxVQVRGO0FBVUgsZ0JBQUssUUFWRjtBQVdILGdCQUFLLEdBWEY7QUFZSCxnQkFBSyxRQVpGO0FBYUgsZ0JBQUssVUFiRjtBQWNILGdCQUFLLEtBZEY7QUFlSCxnQkFBSyxNQWZGO0FBZ0JILGdCQUFLLFdBaEJGO0FBaUJILGdCQUFLLFNBakJGO0FBa0JILGdCQUFLLFlBbEJGO0FBbUJILGdCQUFLLFdBbkJGO0FBb0JILGdCQUFLLFFBcEJGO0FBcUJILGdCQUFLLFFBckJGO0FBc0JILGdCQUFLLEdBdEJGO0FBdUJILGdCQUFLLEdBdkJGO0FBd0JILGdCQUFLLEdBeEJGO0FBeUJILGdCQUFLLEdBekJGO0FBMEJILGdCQUFLLEdBMUJGO0FBMkJILGdCQUFLLEdBM0JGO0FBNEJILGdCQUFLLEdBNUJGO0FBNkJILGdCQUFLLEdBN0JGO0FBOEJILGdCQUFLLEdBOUJGO0FBK0JILGdCQUFLLEdBL0JGO0FBZ0NIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxnQkFBSyxJQTFERixFQTBEUTtBQUNYLGdCQUFLLFNBM0RGO0FBNERILGdCQUFLLGFBNURGO0FBNkRILGdCQUFLLEdBN0RGO0FBOERILGdCQUFLLEdBOURGO0FBK0RILGdCQUFLLEdBL0RGO0FBZ0VILGdCQUFLLEdBaEVGO0FBaUVILGlCQUFLLEdBakVGO0FBa0VILGlCQUFLLEdBbEVGO0FBbUVILGlCQUFLLEdBbkVGO0FBb0VILGlCQUFLLEdBcEVGO0FBcUVILGlCQUFLLEdBckVGO0FBc0VILGlCQUFLLEdBdEVGO0FBdUVILGlCQUFLLEdBdkVGO0FBd0VILGlCQUFLLEdBeEVGO0FBeUVILGlCQUFLLEdBekVGO0FBMEVILGlCQUFLLEdBMUVGO0FBMkVILGlCQUFLLEdBM0VGO0FBNEVILGlCQUFLLElBNUVGO0FBNkVILGlCQUFLLElBN0VGO0FBOEVILGlCQUFLLElBOUVGO0FBK0VILGlCQUFLLElBL0VGO0FBZ0ZILGlCQUFLLElBaEZGO0FBaUZILGlCQUFLLElBakZGO0FBa0ZILGlCQUFLLElBbEZGO0FBbUZILGlCQUFLLElBbkZGO0FBb0ZILGlCQUFLLElBcEZGO0FBcUZILGlCQUFLLEtBckZGO0FBc0ZILGlCQUFLLEtBdEZGO0FBdUZILGlCQUFLLEtBdkZGO0FBd0ZILGlCQUFLLFNBeEZGO0FBeUZILGlCQUFLLFlBekZGO0FBMEZILGlCQUFLLFlBMUZGO0FBMkZILGlCQUFLLGNBM0ZGO0FBNEZILGlCQUFLLEdBNUZGO0FBNkZILGlCQUFLLEdBN0ZGO0FBOEZILGlCQUFLLEdBOUZGO0FBK0ZILGlCQUFLLEdBL0ZGO0FBZ0dILGlCQUFLLEdBaEdGO0FBaUdILGlCQUFLLEdBakdGO0FBa0dILGlCQUFLLEdBbEdGO0FBbUdILGlCQUFLLEdBbkdGO0FBb0dILGlCQUFLLElBcEdGO0FBcUdILGlCQUFLLEdBckdGO0FBc0dILGlCQUFLLElBdEdGO0FBdUdILGlCQUFLLE1BdkdGO0FBd0dILGlCQUFLO0FBeEdGLFNBQVA7QUEwR0gsS0FyUm1COztBQXVScEI7Ozs7O0FBS0EsUUFBSUMsT0FBSixHQUFjO0FBQ1YsZUFBTztBQUNIO0FBQ0FDLDBCQUFnQixjQUZiO0FBR0hILDRCQUFnQixnQkFIYjs7QUFLSDtBQUNBbEcsaUJBQVksS0FOVDtBQU9Ic0csbUJBQVksVUFQVDtBQVFIcEcsc0JBQVksVUFSVCxFQVFxQjtBQUN4Qkgsa0JBQVksU0FUVDtBQVVId0csZ0JBQVksSUFWVDtBQVdIQyxvQkFBWSxRQVhUO0FBWUhDLG1CQUFZLE9BWlQsRUFZa0I7QUFDckJDLGtCQUFZLE1BYlQ7QUFjSHZELG9CQUFZLElBZFQ7QUFlSEMscUJBQVksSUFmVDtBQWdCSDRDLHFCQUFZLElBaEJUO0FBaUJIZixxQkFBWSxTQWpCVDtBQWtCSEMsd0JBQVksWUFsQlQ7QUFtQkhwRixtQkFBWSxPQW5CVDtBQW9CSDZHLG1CQUFZLE9BcEJULEVBb0JrQjtBQUNyQkMsb0JBQVksUUFyQlQ7QUFzQkhDLHdCQUFZLFlBdEJUOztBQXdCSDtBQUNBaEgsbUJBQU8sT0F6Qko7QUEwQkhELGlCQUFPLEtBMUJKO0FBMkJIUSxtQkFBTyxHQTNCSixFQTJCUzs7QUFFWjtBQUNBSyx1QkFBWSxXQTlCVCxFQThCc0I7QUFDekJDLHFCQUFZLFNBL0JULEVBK0JvQjtBQUN2QkMsd0JBQVksWUFoQ1QsRUFnQ3VCO0FBQzFCQyx1QkFBWSxXQWpDVCxFQWlDc0I7QUFDekJMLGlCQUFZLEtBbENUO0FBbUNIQyxrQkFBWSxNQW5DVDtBQW9DSEgsb0JBQVksUUFwQ1Q7QUFxQ0hDLHNCQUFZLFVBckNUOztBQXVDSDtBQUNBWCx1QkFBVyxXQXhDUjtBQXlDSG1ILG1CQUFXLE9BekNSO0FBMENIQyxrQkFBVyxNQTFDUjtBQTJDSEMsbUJBQVcsT0EzQ1IsRUEyQ2lCO0FBQ3BCQyxpQkFBVyxLQTVDUjtBQTZDSG5HLG9CQUFXLFFBN0NSLEVBNkNrQjtBQUNyQm9HLHNCQUFXLFVBOUNSO0FBK0NIQyxtQkFBVyxPQS9DUixFQStDaUI7QUFDcEJ0RyxvQkFBVyxRQWhEUjtBQWlESHVHLG1CQUFXLE9BakRSO0FBa0RIQyxrQkFBVyxNQWxEUjtBQW1ESEMsa0JBQVcsTUFuRFI7O0FBcURIO0FBQ0FDLG9CQUFhLFFBdERWO0FBdURIQyxtQkFBYSxPQXZEVjtBQXdESEMsa0JBQWEsTUF4RFYsRUF3RGtCO0FBQ3JCQyxvQkFBYSxRQXpEVjtBQTBESHJFLHlCQUFhLGFBMURWLEVBMER5QjtBQUM1QmxELGlCQUFhLFFBM0RWLEVBMkRvQjtBQUN2QndILHFCQUFhLFNBNURWO0FBNkRIQyxrQkFBYSxNQTdEVjtBQThESEMsb0JBQWEsUUE5RFYsRUE4RG9CO0FBQ3ZCQyxrQkFBYSxNQS9EVjtBQWdFSDdILG1CQUFhLE9BaEVWO0FBaUVIOEgsa0JBQWEsTUFqRVY7QUFrRUhDLG1CQUFhLE9BbEVWO0FBbUVIQyxvQkFBYSxRQW5FVjtBQW9FSEMsb0JBQWEsUUFwRVY7QUFxRUhDLHFCQUFhLFNBckVWOztBQXVFSDtBQUNBQyw0QkFBZ0IsZ0JBeEViO0FBeUVIQywwQkFBZ0IsY0F6RWI7QUEwRUhDLG1CQUFnQixPQTFFYjtBQTJFSEMsb0JBQWdCLFFBM0ViO0FBNEVIQyxtQkFBZ0IsT0E1RWI7QUE2RUhDLHNCQUFnQixVQTdFYjtBQThFSEMseUJBQWdCLGFBOUViO0FBK0VIQyx1QkFBZ0IsV0EvRWIsRUErRTBCO0FBQzdCQyxxQkFBZ0IsU0FoRmIsRUFnRndCO0FBQzNCQyxvQkFBZ0IsUUFqRmI7O0FBbUZIO0FBQ0FDLHFCQUFTLFNBcEZOO0FBcUZIQyxrQkFBUyxNQXJGTjs7QUF1Rkg7QUFDQTFFLGdCQUFLLElBeEZGO0FBeUZIQyxnQkFBSyxJQXpGRjtBQTBGSEMsZ0JBQUssSUExRkY7QUEyRkhDLGdCQUFLLElBM0ZGO0FBNEZIQyxnQkFBSyxJQTVGRjtBQTZGSEMsZ0JBQUssSUE3RkY7QUE4RkhDLGdCQUFLLElBOUZGO0FBK0ZIQyxnQkFBSyxJQS9GRjtBQWdHSEMsZ0JBQUssSUFoR0Y7QUFpR0hDLGlCQUFLLEtBakdGO0FBa0dIQyxpQkFBSyxLQWxHRjtBQW1HSEMsaUJBQUssS0FuR0Y7O0FBcUdIO0FBQ0FnRSxtQkFBTyxPQXRHSjs7QUF3R0g7QUFDQWpJLGtCQUFjLEdBekdYO0FBMEdIQyxrQkFBYyxHQTFHWDtBQTJHSEMsa0JBQWMsR0EzR1g7QUE0R0hDLGtCQUFjLEdBNUdYO0FBNkdIQyxrQkFBYyxHQTdHWDtBQThHSEMsa0JBQWMsR0E5R1g7QUErR0hDLGtCQUFjLEdBL0dYO0FBZ0hIQyxrQkFBYyxHQWhIWDtBQWlISEMsa0JBQWMsR0FqSFg7QUFrSEhDLGtCQUFjLEdBbEhYO0FBbUhIQyxlQUFjLEdBbkhYO0FBb0hIQyxlQUFjLEdBcEhYO0FBcUhIQyxlQUFjLEdBckhYO0FBc0hIQyxlQUFjLEdBdEhYO0FBdUhIQyxlQUFjLEdBdkhYO0FBd0hIQyxlQUFjLEdBeEhYO0FBeUhIQyxlQUFjLEdBekhYO0FBMEhIQyxlQUFjLEdBMUhYO0FBMkhIQyxlQUFjLEdBM0hYO0FBNEhIQyxlQUFjLEdBNUhYO0FBNkhIQyxlQUFjLEdBN0hYO0FBOEhIQyxlQUFjLEdBOUhYO0FBK0hIQyxlQUFjLEdBL0hYO0FBZ0lIQyxlQUFjLEdBaElYO0FBaUlIQyxlQUFjLEdBaklYO0FBa0lIQyxlQUFjLEdBbElYO0FBbUlIQyxlQUFjLEdBbklYO0FBb0lIQyxlQUFjLEdBcElYO0FBcUlIQyxlQUFjLEdBcklYO0FBc0lIQyxlQUFjLEdBdElYO0FBdUlIQyxlQUFjLEdBdklYO0FBd0lIQyxlQUFjLEdBeElYO0FBeUlIQyxlQUFjLEdBeklYO0FBMElIQyxlQUFjLEdBMUlYO0FBMklIQyxlQUFjLEdBM0lYO0FBNElIQyxlQUFjLEdBNUlYO0FBNklIK0YsZUFBYyxHQTdJWDtBQThJSEMsZUFBYyxHQTlJWDtBQStJSEMsZUFBYyxHQS9JWDtBQWdKSEMsZUFBYyxHQWhKWDtBQWlKSEMsZUFBYyxHQWpKWDtBQWtKSEMsZUFBYyxHQWxKWDtBQW1KSEMsZUFBYyxHQW5KWDtBQW9KSEMsZUFBYyxHQXBKWDtBQXFKSEMsZUFBYyxHQXJKWDtBQXNKSEMsZUFBYyxHQXRKWDtBQXVKSEMsZUFBYyxHQXZKWDtBQXdKSEMsZUFBYyxHQXhKWDtBQXlKSEMsZUFBYyxHQXpKWDtBQTBKSEMsZUFBYyxHQTFKWDtBQTJKSEMsZUFBYyxHQTNKWDtBQTRKSEMsZUFBYyxHQTVKWDtBQTZKSEMsZUFBYyxHQTdKWDtBQThKSEMsZUFBYyxHQTlKWDtBQStKSEMsZUFBYyxHQS9KWDtBQWdLSEMsZUFBYyxHQWhLWDtBQWlLSEMsZUFBYyxHQWpLWDtBQWtLSEMsZUFBYyxHQWxLWDtBQW1LSEMsZUFBYyxHQW5LWDtBQW9LSEMsZUFBYyxHQXBLWDtBQXFLSEMsZUFBYyxHQXJLWDtBQXNLSEMsZUFBYyxHQXRLWDtBQXVLSHJGLHVCQUFjLEdBdktYO0FBd0tIQyxtQkFBYyxHQXhLWDtBQXlLSEMsbUJBQWMsR0F6S1g7QUEwS0hDLG9CQUFjLEdBMUtYO0FBMktIbUYsbUJBQWMsR0EzS1g7QUE0S0hDLGtCQUFjLEdBNUtYO0FBNktIbkYsaUJBQWMsR0E3S1g7QUE4S0hDLG1CQUFjLEdBOUtYO0FBK0tIQyx1QkFBYyxHQS9LWDtBQWdMSEMseUJBQWMsR0FoTFg7QUFpTEhFLDBCQUFjLEdBakxYO0FBa0xIRCx1QkFBYyxJQWxMWDtBQW1MSEUsbUJBQWMsR0FuTFg7O0FBcUxIO0FBQ0F6QyxxQkFBZ0MsR0F0TDdCO0FBdUxIQyxxQkFBZ0MsR0F2TDdCO0FBd0xIQyxxQkFBZ0MsR0F4TDdCO0FBeUxIQyxxQkFBZ0MsR0F6TDdCO0FBMExIQyxxQkFBZ0MsR0ExTDdCO0FBMkxIQyxxQkFBZ0MsR0EzTDdCO0FBNExIQyxxQkFBZ0MsR0E1TDdCO0FBNkxIQyxxQkFBZ0MsR0E3TDdCO0FBOExIQyxxQkFBZ0MsR0E5TDdCO0FBK0xIQyxxQkFBZ0MsR0EvTDdCO0FBZ01IOEcsdUJBQWdDLEdBaE03QjtBQWlNSEMsMEJBQWdDLEdBak03QixFQWlNa0M7QUFDckNDLDRCQUFnQyxHQWxNN0I7QUFtTUhDLHdCQUFnQyxHQW5NN0I7QUFvTUhDLHlCQUFnQyxHQXBNN0I7QUFxTUhDLHlCQUFnQyxHQXJNN0I7QUFzTUhDLHVDQUFnQyxTQXRNN0I7QUF1TUhDLDRDQUFnQyxVQXZNN0I7QUF3TUhDLHdDQUFnQyxLQXhNN0I7QUF5TUhDLHlDQUFnQyxVQXpNN0I7QUEwTUhDLHlDQUFnQyxRQTFNN0I7O0FBNE1IO0FBQ0FDLHdCQUF1QixDQUFDLElBQUQsRUFBTyxJQUFQLEVBQWEsSUFBYixFQUFtQixJQUFuQixFQUF5QixJQUF6QixFQUErQixJQUEvQixFQUFxQyxJQUFyQyxFQUEyQyxJQUEzQyxFQUFpRCxJQUFqRCxFQUF1RCxLQUF2RCxFQUE4RCxLQUE5RCxFQUFxRSxLQUFyRSxDQTdNcEI7QUE4TUhDLG1DQUF1QixDQUFDLEtBQUQsRUFBUSxPQUFSLEVBQWlCLE9BQWpCLEVBQTBCLFdBQTFCLEVBQXVDLFlBQXZDLEVBQXFELFNBQXJELEVBQWdFLGFBQWhFLEVBQStFLGNBQS9FLEVBQStGLEtBQS9GLEVBQXNHLFNBQXRHLEVBQWlILFVBQWpILEVBQTZILE9BQTdILEVBQXNJLFVBQXRJLEVBQWtKLFFBQWxKLENBOU1wQjtBQStNSEMsNEJBQXVCLENBQUMsUUFBRCxFQUFXLFVBQVgsRUFBdUIsS0FBdkIsRUFBOEIsTUFBOUIsRUFBc0MsV0FBdEMsRUFBbUQsV0FBbkQsRUFBZ0UsWUFBaEUsRUFBOEUsU0FBOUU7QUEvTXBCLFNBQVA7QUFpTkg7QUE5ZW1CLENBQXhCOztrQkFpZmVsTSxlIiwiZmlsZSI6IjIuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIEVudW1lcmF0aW9ucyBmb3IgYXV0b051bWVyaWMuanNcbiAqIEBhdXRob3IgQWxleGFuZHJlIEJvbm5lYXUgPGFsZXhhbmRyZS5ib25uZWF1QGxpbnV4ZnIuZXU+XG4gKiBAY29weXJpZ2h0IMKpIDIwMTYgQWxleGFuZHJlIEJvbm5lYXVcbiAqXG4gKiBUaGUgTUlUIExpY2Vuc2UgKGh0dHA6Ly93d3cub3BlbnNvdXJjZS5vcmcvbGljZW5zZXMvbWl0LWxpY2Vuc2UucGhwKVxuICpcbiAqIFBlcm1pc3Npb24gaXMgaGVyZWJ5IGdyYW50ZWQsIGZyZWUgb2YgY2hhcmdlLCB0byBhbnkgcGVyc29uXG4gKiBvYnRhaW5pbmcgYSBjb3B5IG9mIHRoaXMgc29mdHdhcmUgYW5kIGFzc29jaWF0ZWQgZG9jdW1lbnRhdGlvblxuICogZmlsZXMgKHRoZSBcIlNvZnR3YXJlXCIpLCB0byBkZWFsIGluIHRoZSBTb2Z0d2FyZSB3aXRob3V0XG4gKiByZXN0cmljdGlvbiwgaW5jbHVkaW5nIHdpdGhvdXQgbGltaXRhdGlvbiB0aGUgcmlnaHRzIHRvIHVzZSxcbiAqIGNvcHksIG1vZGlmeSwgbWVyZ2UsIHB1Ymxpc2gsIGRpc3RyaWJ1dGUsIHN1YiBsaWNlbnNlLCBhbmQvb3Igc2VsbFxuICogY29waWVzIG9mIHRoZSBTb2Z0d2FyZSwgYW5kIHRvIHBlcm1pdCBwZXJzb25zIHRvIHdob20gdGhlXG4gKiBTb2Z0d2FyZSBpcyBmdXJuaXNoZWQgdG8gZG8gc28sIHN1YmplY3QgdG8gdGhlIGZvbGxvd2luZ1xuICogY29uZGl0aW9uczpcbiAqXG4gKiBUaGUgYWJvdmUgY29weXJpZ2h0IG5vdGljZSBhbmQgdGhpcyBwZXJtaXNzaW9uIG5vdGljZSBzaGFsbCBiZVxuICogaW5jbHVkZWQgaW4gYWxsIGNvcGllcyBvciBzdWJzdGFudGlhbCBwb3J0aW9ucyBvZiB0aGUgU29mdHdhcmUuXG4gKlxuICogVEhFIFNPRlRXQVJFIElTIFBST1ZJREVEIFwiQVMgSVNcIiwgV0lUSE9VVCBXQVJSQU5UWSBPRiBBTlkgS0lORCxcbiAqIEVYUFJFU1MgT1IgSU1QTElFRCwgSU5DTFVESU5HIEJVVCBOT1QgTElNSVRFRCBUTyBUSEUgV0FSUkFOVElFU1xuICogT0YgTUVSQ0hBTlRBQklMSVRZLCBGSVRORVNTIEZPUiBBIFBBUlRJQ1VMQVIgUFVSUE9TRSBBTkRcbiAqIE5PTklORlJJTkdFTUVOVC4gSU4gTk8gRVZFTlQgU0hBTEwgVEhFIEFVVEhPUlMgT1IgQ09QWVJJR0hUXG4gKiBIT0xERVJTIEJFIExJQUJMRSBGT1IgQU5ZIENMQUlNLCBEQU1BR0VTIE9SIE9USEVSIExJQUJJTElUWSxcbiAqIFdIRVRIRVIgSU4gQU4gQUNUSU9OIE9GIENPTlRSQUNULCBUT1JUIE9SIE9USEVSV0lTRSwgQVJJU0lOR1xuICogRlJPTSwgT1VUIE9GIE9SIElOIENPTk5FQ1RJT04gV0lUSCBUSEUgU09GVFdBUkUgT1IgVEhFIFVTRSBPUlxuICogT1RIRVIgREVBTElOR1MgSU4gVEhFIFNPRlRXQVJFLlxuICovXG5cbi8qKlxuICogT2JqZWN0IHRoYXQgc3RvcmUgdGhlIGhlbHBlciBlbnVtZXJhdGlvbnNcbiAqIEB0eXBlIHt7IGFsbG93ZWRUYWdMaXN0OiBbc3RyaW5nXSwga2V5Q29kZToge30sIGZyb21DaGFyQ29kZUtleUNvZGU6IFtzdHJpbmddLCBrZXlOYW1lOiB7fSB9fVxuICovXG5jb25zdCBBdXRvTnVtZXJpY0VudW0gPSB7XG4gICAgLyoqXG4gICAgICogTGlzdCBvZiBhbGxvd2VkIHRhZyBvbiB3aGljaCBhdXRvTnVtZXJpYyBjYW4gYmUgdXNlZC5cbiAgICAgKi9cbiAgICBnZXQgYWxsb3dlZFRhZ0xpc3QoKSB7XG4gICAgICAgIHJldHVybiBbXG4gICAgICAgICAgICAnYicsXG4gICAgICAgICAgICAnY2FwdGlvbicsXG4gICAgICAgICAgICAnY2l0ZScsXG4gICAgICAgICAgICAnY29kZScsXG4gICAgICAgICAgICAnY29uc3QnLFxuICAgICAgICAgICAgJ2RkJyxcbiAgICAgICAgICAgICdkZWwnLFxuICAgICAgICAgICAgJ2RpdicsXG4gICAgICAgICAgICAnZGZuJyxcbiAgICAgICAgICAgICdkdCcsXG4gICAgICAgICAgICAnZW0nLFxuICAgICAgICAgICAgJ2gxJyxcbiAgICAgICAgICAgICdoMicsXG4gICAgICAgICAgICAnaDMnLFxuICAgICAgICAgICAgJ2g0JyxcbiAgICAgICAgICAgICdoNScsXG4gICAgICAgICAgICAnaDYnLFxuICAgICAgICAgICAgJ2lucHV0JyxcbiAgICAgICAgICAgICdpbnMnLFxuICAgICAgICAgICAgJ2tkYicsXG4gICAgICAgICAgICAnbGFiZWwnLFxuICAgICAgICAgICAgJ2xpJyxcbiAgICAgICAgICAgICdvcHRpb24nLFxuICAgICAgICAgICAgJ291dHB1dCcsXG4gICAgICAgICAgICAncCcsXG4gICAgICAgICAgICAncScsXG4gICAgICAgICAgICAncycsXG4gICAgICAgICAgICAnc2FtcGxlJyxcbiAgICAgICAgICAgICdzcGFuJyxcbiAgICAgICAgICAgICdzdHJvbmcnLFxuICAgICAgICAgICAgJ3RkJyxcbiAgICAgICAgICAgICd0aCcsXG4gICAgICAgICAgICAndScsXG4gICAgICAgIF07XG4gICAgfSxcblxuICAgIC8qKlxuICAgICAqIFdyYXBwZXIgdmFyaWFibGUgdGhhdCBob2xkIG5hbWVkIGtleWJvYXJkIGtleXMgd2l0aCB0aGVpciByZXNwZWN0aXZlIGtleUNvZGUgYXMgc2VlbiBpbiBET00gZXZlbnRzLlxuICAgICAqIGNmLiBodHRwczovL2RldmVsb3Blci5tb3ppbGxhLm9yZy9lbi1VUy9kb2NzL1dlYi9BUEkvS2V5Ym9hcmRFdmVudC9rZXlDb2RlXG4gICAgICpcbiAgICAgKiBUaGlzIGRlcHJlY2F0ZWQgaW5mb3JtYXRpb24gaXMgdXNlZCBmb3Igb2Jzb2xldGUgYnJvd3NlcnMuXG4gICAgICogQGRlcHJlY2F0ZWRcbiAgICAgKi9cbiAgICBnZXQga2V5Q29kZSgpIHtcbiAgICAgICAgcmV0dXJuIHtcbiAgICAgICAgICAgIEJhY2tzcGFjZSAgICAgOiA4LFxuICAgICAgICAgICAgVGFiICAgICAgICAgICA6IDksXG4gICAgICAgICAgICAvLyBObyAxMCwgMTFcbiAgICAgICAgICAgIC8vIDEyID09PSBOdW1wYWRFcXVhbCBvbiBXaW5kb3dzXG4gICAgICAgICAgICAvLyAxMiA9PT0gTnVtTG9jayBvbiBNYWNcbiAgICAgICAgICAgIEVudGVyICAgICAgICAgOiAxMyxcbiAgICAgICAgICAgIC8vIDE0IHJlc2VydmVkLCBidXQgbm90IHVzZWRcbiAgICAgICAgICAgIC8vIDE1IGRvZXMgbm90IGV4aXN0c1xuICAgICAgICAgICAgU2hpZnQgICAgICAgICA6IDE2LFxuICAgICAgICAgICAgQ3RybCAgICAgICAgICA6IDE3LFxuICAgICAgICAgICAgQWx0ICAgICAgICAgICA6IDE4LFxuICAgICAgICAgICAgUGF1c2UgICAgICAgICA6IDE5LFxuICAgICAgICAgICAgQ2Fwc0xvY2sgICAgICA6IDIwLFxuICAgICAgICAgICAgLy8gMjEsIDIyLCAyMywgMjQsIDI1IDogQXNpYXRpYyBrZXkgY29kZXNcbiAgICAgICAgICAgIC8vIDI2IGRvZXMgbm90IGV4aXN0c1xuICAgICAgICAgICAgRXNjICAgICAgICAgICA6IDI3LFxuICAgICAgICAgICAgLy8gMjgsIDI5LCAzMCwgMzEgOiBDb252ZXJ0LCBOb25Db252ZXJ0LCBBY2NlcHQgYW5kIE1vZGVDaGFuZ2Uga2V5c1xuICAgICAgICAgICAgU3BhY2UgICAgICAgICA6IDMyLFxuICAgICAgICAgICAgUGFnZVVwICAgICAgICA6IDMzLFxuICAgICAgICAgICAgUGFnZURvd24gICAgICA6IDM0LFxuICAgICAgICAgICAgRW5kICAgICAgICAgICA6IDM1LFxuICAgICAgICAgICAgSG9tZSAgICAgICAgICA6IDM2LFxuICAgICAgICAgICAgTGVmdEFycm93ICAgICA6IDM3LFxuICAgICAgICAgICAgVXBBcnJvdyAgICAgICA6IDM4LFxuICAgICAgICAgICAgUmlnaHRBcnJvdyAgICA6IDM5LFxuICAgICAgICAgICAgRG93bkFycm93ICAgICA6IDQwLFxuICAgICAgICAgICAgSW5zZXJ0ICAgICAgICA6IDQ1LFxuICAgICAgICAgICAgRGVsZXRlICAgICAgICA6IDQ2LFxuICAgICAgICAgICAgbnVtMCAgICAgICAgICA6IDQ4LFxuICAgICAgICAgICAgbnVtMSAgICAgICAgICA6IDQ5LFxuICAgICAgICAgICAgbnVtMiAgICAgICAgICA6IDUwLFxuICAgICAgICAgICAgbnVtMyAgICAgICAgICA6IDUxLFxuICAgICAgICAgICAgbnVtNCAgICAgICAgICA6IDUyLFxuICAgICAgICAgICAgbnVtNSAgICAgICAgICA6IDUzLFxuICAgICAgICAgICAgbnVtNiAgICAgICAgICA6IDU0LFxuICAgICAgICAgICAgbnVtNyAgICAgICAgICA6IDU1LFxuICAgICAgICAgICAgbnVtOCAgICAgICAgICA6IDU2LFxuICAgICAgICAgICAgbnVtOSAgICAgICAgICA6IDU3LFxuICAgICAgICAgICAgYSAgICAgICAgICAgICA6IDY1LFxuICAgICAgICAgICAgYiAgICAgICAgICAgICA6IDY2LFxuICAgICAgICAgICAgYyAgICAgICAgICAgICA6IDY3LFxuICAgICAgICAgICAgZCAgICAgICAgICAgICA6IDY4LFxuICAgICAgICAgICAgZSAgICAgICAgICAgICA6IDY5LFxuICAgICAgICAgICAgZiAgICAgICAgICAgICA6IDcwLFxuICAgICAgICAgICAgZyAgICAgICAgICAgICA6IDcxLFxuICAgICAgICAgICAgaCAgICAgICAgICAgICA6IDcyLFxuICAgICAgICAgICAgaSAgICAgICAgICAgICA6IDczLFxuICAgICAgICAgICAgaiAgICAgICAgICAgICA6IDc0LFxuICAgICAgICAgICAgayAgICAgICAgICAgICA6IDc1LFxuICAgICAgICAgICAgbCAgICAgICAgICAgICA6IDc2LFxuICAgICAgICAgICAgbSAgICAgICAgICAgICA6IDc3LFxuICAgICAgICAgICAgbiAgICAgICAgICAgICA6IDc4LFxuICAgICAgICAgICAgbyAgICAgICAgICAgICA6IDc5LFxuICAgICAgICAgICAgcCAgICAgICAgICAgICA6IDgwLFxuICAgICAgICAgICAgcSAgICAgICAgICAgICA6IDgxLFxuICAgICAgICAgICAgciAgICAgICAgICAgICA6IDgyLFxuICAgICAgICAgICAgcyAgICAgICAgICAgICA6IDgzLFxuICAgICAgICAgICAgdCAgICAgICAgICAgICA6IDg0LFxuICAgICAgICAgICAgdSAgICAgICAgICAgICA6IDg1LFxuICAgICAgICAgICAgdiAgICAgICAgICAgICA6IDg2LFxuICAgICAgICAgICAgdyAgICAgICAgICAgICA6IDg3LFxuICAgICAgICAgICAgeCAgICAgICAgICAgICA6IDg4LFxuICAgICAgICAgICAgeSAgICAgICAgICAgICA6IDg5LFxuICAgICAgICAgICAgeiAgICAgICAgICAgICA6IDkwLFxuICAgICAgICAgICAgT1NMZWZ0ICAgICAgICA6IDkxLFxuICAgICAgICAgICAgT1NSaWdodCAgICAgICA6IDkyLFxuICAgICAgICAgICAgQ29udGV4dE1lbnUgICA6IDkzLFxuICAgICAgICAgICAgbnVtcGFkMCAgICAgICA6IDk2LFxuICAgICAgICAgICAgbnVtcGFkMSAgICAgICA6IDk3LFxuICAgICAgICAgICAgbnVtcGFkMiAgICAgICA6IDk4LFxuICAgICAgICAgICAgbnVtcGFkMyAgICAgICA6IDk5LFxuICAgICAgICAgICAgbnVtcGFkNCAgICAgICA6IDEwMCxcbiAgICAgICAgICAgIG51bXBhZDUgICAgICAgOiAxMDEsXG4gICAgICAgICAgICBudW1wYWQ2ICAgICAgIDogMTAyLFxuICAgICAgICAgICAgbnVtcGFkNyAgICAgICA6IDEwMyxcbiAgICAgICAgICAgIG51bXBhZDggICAgICAgOiAxMDQsXG4gICAgICAgICAgICBudW1wYWQ5ICAgICAgIDogMTA1LFxuICAgICAgICAgICAgTXVsdGlwbHlOdW1wYWQ6IDEwNixcbiAgICAgICAgICAgIFBsdXNOdW1wYWQgICAgOiAxMDcsXG4gICAgICAgICAgICBNaW51c051bXBhZCAgIDogMTA5LFxuICAgICAgICAgICAgRG90TnVtcGFkICAgICA6IDExMCxcbiAgICAgICAgICAgIFNsYXNoTnVtcGFkICAgOiAxMTEsXG4gICAgICAgICAgICBGMSAgICAgICAgICAgIDogMTEyLFxuICAgICAgICAgICAgRjIgICAgICAgICAgICA6IDExMyxcbiAgICAgICAgICAgIEYzICAgICAgICAgICAgOiAxMTQsXG4gICAgICAgICAgICBGNCAgICAgICAgICAgIDogMTE1LFxuICAgICAgICAgICAgRjUgICAgICAgICAgICA6IDExNixcbiAgICAgICAgICAgIEY2ICAgICAgICAgICAgOiAxMTcsXG4gICAgICAgICAgICBGNyAgICAgICAgICAgIDogMTE4LFxuICAgICAgICAgICAgRjggICAgICAgICAgICA6IDExOSxcbiAgICAgICAgICAgIEY5ICAgICAgICAgICAgOiAxMjAsXG4gICAgICAgICAgICBGMTAgICAgICAgICAgIDogMTIxLFxuICAgICAgICAgICAgRjExICAgICAgICAgICA6IDEyMixcbiAgICAgICAgICAgIEYxMiAgICAgICAgICAgOiAxMjMsXG4gICAgICAgICAgICBOdW1Mb2NrICAgICAgIDogMTQ0LFxuICAgICAgICAgICAgU2Nyb2xsTG9jayAgICA6IDE0NSxcbiAgICAgICAgICAgIE15Q29tcHV0ZXIgICAgOiAxODIsXG4gICAgICAgICAgICBNeUNhbGN1bGF0b3IgIDogMTgzLFxuICAgICAgICAgICAgU2VtaWNvbG9uICAgICA6IDE4NixcbiAgICAgICAgICAgIEVxdWFsICAgICAgICAgOiAxODcsXG4gICAgICAgICAgICBDb21tYSAgICAgICAgIDogMTg4LFxuICAgICAgICAgICAgSHlwaGVuICAgICAgICA6IDE4OSxcbiAgICAgICAgICAgIERvdCAgICAgICAgICAgOiAxOTAsXG4gICAgICAgICAgICBTbGFzaCAgICAgICAgIDogMTkxLFxuICAgICAgICAgICAgQmFja3F1b3RlICAgICA6IDE5MixcbiAgICAgICAgICAgIExlZnRCcmFja2V0ICAgOiAyMTksXG4gICAgICAgICAgICBCYWNrc2xhc2ggICAgIDogMjIwLFxuICAgICAgICAgICAgUmlnaHRCcmFja2V0ICA6IDIyMSxcbiAgICAgICAgICAgIFF1b3RlICAgICAgICAgOiAyMjIsXG4gICAgICAgICAgICBDb21tYW5kICAgICAgIDogMjI0LFxuICAgICAgICAgICAgQWx0R3JhcGggICAgICA6IDIyNSxcbiAgICAgICAgICAgIEFuZHJvaWREZWZhdWx0OiAyMjksIC8vIEFuZHJvaWQgQ2hyb21lIHJldHVybnMgdGhlIHNhbWUga2V5Y29kZSBudW1iZXIgMjI5IGZvciBhbGwga2V5cyBwcmVzc2VkXG4gICAgICAgIH07XG4gICAgfSxcblxuICAgIC8qKlxuICAgICAqIFRoaXMgb2JqZWN0IGlzIHRoZSByZXZlcnNlIG9mIGBrZXlDb2RlYCwgYW5kIGlzIHVzZWQgdG8gdHJhbnNsYXRlIHRoZSBrZXkgY29kZSB0byBuYW1lZCBrZXlzIHdoZW4gbm8gdmFsaWQgY2hhcmFjdGVycyBjYW4gYmUgb2J0YWluZWQgYnkgYFN0cmluZy5mcm9tQ2hhckNvZGVgLlxuICAgICAqIFRoaXMgb2JqZWN0IGtleXMgY29ycmVzcG9uZCB0byB0aGUgYGV2ZW50LmtleUNvZGVgIG51bWJlciwgYW5kIHJldHVybnMgdGhlIGNvcnJlc3BvbmRpbmcga2V5IG5hbWUgKMOgIGxhIGV2ZW50LmtleSlcbiAgICAgKi9cbiAgICBnZXQgZnJvbUNoYXJDb2RlS2V5Q29kZSgpIHtcbiAgICAgICAgcmV0dXJuIHtcbiAgICAgICAgICAgIDAgIDogJ0xhdW5jaENhbGN1bGF0b3InLFxuICAgICAgICAgICAgOCAgOiAnQmFja3NwYWNlJyxcbiAgICAgICAgICAgIDkgIDogJ1RhYicsXG4gICAgICAgICAgICAxMyA6ICdFbnRlcicsXG4gICAgICAgICAgICAxNiA6ICdTaGlmdCcsXG4gICAgICAgICAgICAxNyA6ICdDdHJsJyxcbiAgICAgICAgICAgIDE4IDogJ0FsdCcsXG4gICAgICAgICAgICAxOSA6ICdQYXVzZScsXG4gICAgICAgICAgICAyMCA6ICdDYXBzTG9jaycsXG4gICAgICAgICAgICAyNyA6ICdFc2NhcGUnLFxuICAgICAgICAgICAgMzIgOiAnICcsXG4gICAgICAgICAgICAzMyA6ICdQYWdlVXAnLFxuICAgICAgICAgICAgMzQgOiAnUGFnZURvd24nLFxuICAgICAgICAgICAgMzUgOiAnRW5kJyxcbiAgICAgICAgICAgIDM2IDogJ0hvbWUnLFxuICAgICAgICAgICAgMzcgOiAnQXJyb3dMZWZ0JyxcbiAgICAgICAgICAgIDM4IDogJ0Fycm93VXAnLFxuICAgICAgICAgICAgMzkgOiAnQXJyb3dSaWdodCcsXG4gICAgICAgICAgICA0MCA6ICdBcnJvd0Rvd24nLFxuICAgICAgICAgICAgNDUgOiAnSW5zZXJ0JyxcbiAgICAgICAgICAgIDQ2IDogJ0RlbGV0ZScsXG4gICAgICAgICAgICA0OCA6ICcwJyxcbiAgICAgICAgICAgIDQ5IDogJzEnLFxuICAgICAgICAgICAgNTAgOiAnMicsXG4gICAgICAgICAgICA1MSA6ICczJyxcbiAgICAgICAgICAgIDUyIDogJzQnLFxuICAgICAgICAgICAgNTMgOiAnNScsXG4gICAgICAgICAgICA1NCA6ICc2JyxcbiAgICAgICAgICAgIDU1IDogJzcnLFxuICAgICAgICAgICAgNTYgOiAnOCcsXG4gICAgICAgICAgICA1NyA6ICc5JyxcbiAgICAgICAgICAgIC8vIDY1OiAnYScsXG4gICAgICAgICAgICAvLyA2NjogJ2InLFxuICAgICAgICAgICAgLy8gNjc6ICdjJyxcbiAgICAgICAgICAgIC8vIDY4OiAnZCcsXG4gICAgICAgICAgICAvLyA2OTogJ2UnLFxuICAgICAgICAgICAgLy8gNzA6ICdmJyxcbiAgICAgICAgICAgIC8vIDcxOiAnZycsXG4gICAgICAgICAgICAvLyA3MjogJ2gnLFxuICAgICAgICAgICAgLy8gNzM6ICdpJyxcbiAgICAgICAgICAgIC8vIDc0OiAnaicsXG4gICAgICAgICAgICAvLyA3NTogJ2snLFxuICAgICAgICAgICAgLy8gNzY6ICdsJyxcbiAgICAgICAgICAgIC8vIDc3OiAnbScsXG4gICAgICAgICAgICAvLyA3ODogJ24nLFxuICAgICAgICAgICAgLy8gNzk6ICdvJyxcbiAgICAgICAgICAgIC8vIDgwOiAncCcsXG4gICAgICAgICAgICAvLyA4MTogJ3EnLFxuICAgICAgICAgICAgLy8gODI6ICdyJyxcbiAgICAgICAgICAgIC8vIDgzOiAncycsXG4gICAgICAgICAgICAvLyA4NDogJ3QnLFxuICAgICAgICAgICAgLy8gODU6ICd1JyxcbiAgICAgICAgICAgIC8vIDg2OiAndicsXG4gICAgICAgICAgICAvLyA4NzogJ3cnLFxuICAgICAgICAgICAgLy8gODg6ICd4JyxcbiAgICAgICAgICAgIC8vIDg5OiAneScsXG4gICAgICAgICAgICAvLyA5MDogJ3onLFxuICAgICAgICAgICAgOTEgOiAnT1MnLCAvLyBOb3RlOiBGaXJlZm94IGFuZCBDaHJvbWUgcmVwb3J0cyAnT1MnIGluc3RlYWQgb2YgJ09TTGVmdCdcbiAgICAgICAgICAgIDkyIDogJ09TUmlnaHQnLFxuICAgICAgICAgICAgOTMgOiAnQ29udGV4dE1lbnUnLFxuICAgICAgICAgICAgOTYgOiAnMCcsXG4gICAgICAgICAgICA5NyA6ICcxJyxcbiAgICAgICAgICAgIDk4IDogJzInLFxuICAgICAgICAgICAgOTkgOiAnMycsXG4gICAgICAgICAgICAxMDA6ICc0JyxcbiAgICAgICAgICAgIDEwMTogJzUnLFxuICAgICAgICAgICAgMTAyOiAnNicsXG4gICAgICAgICAgICAxMDM6ICc3JyxcbiAgICAgICAgICAgIDEwNDogJzgnLFxuICAgICAgICAgICAgMTA1OiAnOScsXG4gICAgICAgICAgICAxMDY6ICcqJyxcbiAgICAgICAgICAgIDEwNzogJysnLFxuICAgICAgICAgICAgMTA5OiAnLScsXG4gICAgICAgICAgICAxMTA6ICcuJyxcbiAgICAgICAgICAgIDExMTogJy8nLFxuICAgICAgICAgICAgMTEyOiAnRjEnLFxuICAgICAgICAgICAgMTEzOiAnRjInLFxuICAgICAgICAgICAgMTE0OiAnRjMnLFxuICAgICAgICAgICAgMTE1OiAnRjQnLFxuICAgICAgICAgICAgMTE2OiAnRjUnLFxuICAgICAgICAgICAgMTE3OiAnRjYnLFxuICAgICAgICAgICAgMTE4OiAnRjcnLFxuICAgICAgICAgICAgMTE5OiAnRjgnLFxuICAgICAgICAgICAgMTIwOiAnRjknLFxuICAgICAgICAgICAgMTIxOiAnRjEwJyxcbiAgICAgICAgICAgIDEyMjogJ0YxMScsXG4gICAgICAgICAgICAxMjM6ICdGMTInLFxuICAgICAgICAgICAgMTQ0OiAnTnVtTG9jaycsXG4gICAgICAgICAgICAxNDU6ICdTY3JvbGxMb2NrJyxcbiAgICAgICAgICAgIDE4MjogJ015Q29tcHV0ZXInLFxuICAgICAgICAgICAgMTgzOiAnTXlDYWxjdWxhdG9yJyxcbiAgICAgICAgICAgIDE4NjogJzsnLFxuICAgICAgICAgICAgMTg3OiAnPScsXG4gICAgICAgICAgICAxODg6ICcsJyxcbiAgICAgICAgICAgIDE4OTogJy0nLFxuICAgICAgICAgICAgMTkwOiAnLicsXG4gICAgICAgICAgICAxOTE6ICcvJyxcbiAgICAgICAgICAgIDE5MjogJ2AnLFxuICAgICAgICAgICAgMjE5OiAnWycsXG4gICAgICAgICAgICAyMjA6ICdcXFxcJyxcbiAgICAgICAgICAgIDIyMTogJ10nLFxuICAgICAgICAgICAgMjIyOiAnXFwnJyxcbiAgICAgICAgICAgIDIyNDogJ01ldGEnLFxuICAgICAgICAgICAgMjI1OiAnQWx0R3JhcGgnLFxuICAgICAgICB9O1xuICAgIH0sXG5cbiAgICAvKipcbiAgICAgKiBXcmFwcGVyIHZhcmlhYmxlIHRoYXQgaG9sZCBuYW1lZCBrZXlib2FyZCBrZXlzIHdpdGggdGhlaXIgcmVzcGVjdGl2ZSBrZXkgbmFtZSAoYXMgc2V0IGluIEtleWJvYXJkRXZlbnQua2V5KS5cbiAgICAgKiBUaG9zZSBuYW1lcyBhcmUgbGlzdGVkIGhlcmUgOlxuICAgICAqIEBsaW5rIGh0dHBzOi8vZGV2ZWxvcGVyLm1vemlsbGEub3JnL2VuLVVTL2RvY3MvV2ViL0FQSS9LZXlib2FyZEV2ZW50L2tleS9LZXlfVmFsdWVzXG4gICAgICovXG4gICAgZ2V0IGtleU5hbWUoKSB7XG4gICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICAvLyBTcGVjaWFsIHZhbHVlc1xuICAgICAgICAgICAgVW5pZGVudGlmaWVkICA6ICdVbmlkZW50aWZpZWQnLFxuICAgICAgICAgICAgQW5kcm9pZERlZmF1bHQ6ICdBbmRyb2lkRGVmYXVsdCcsXG5cbiAgICAgICAgICAgIC8vIE1vZGlmaWVyIGtleXNcbiAgICAgICAgICAgIEFsdCAgICAgICA6ICdBbHQnLFxuICAgICAgICAgICAgQWx0R3IgICAgIDogJ0FsdEdyYXBoJyxcbiAgICAgICAgICAgIENhcHNMb2NrICA6ICdDYXBzTG9jaycsIC8vIFVuZGVyIENocm9tZSwgZS5rZXkgaXMgZW1wdHkgZm9yIENhcHNMb2NrXG4gICAgICAgICAgICBDdHJsICAgICAgOiAnQ29udHJvbCcsXG4gICAgICAgICAgICBGbiAgICAgICAgOiAnRm4nLFxuICAgICAgICAgICAgRm5Mb2NrICAgIDogJ0ZuTG9jaycsXG4gICAgICAgICAgICBIeXBlciAgICAgOiAnSHlwZXInLCAvLyAnT1MnIHVuZGVyIEZpcmVmb3hcbiAgICAgICAgICAgIE1ldGEgICAgICA6ICdNZXRhJyxcbiAgICAgICAgICAgIE9TTGVmdCAgICA6ICdPUycsXG4gICAgICAgICAgICBPU1JpZ2h0ICAgOiAnT1MnLFxuICAgICAgICAgICAgQ29tbWFuZCAgIDogJ09TJyxcbiAgICAgICAgICAgIE51bUxvY2sgICA6ICdOdW1Mb2NrJyxcbiAgICAgICAgICAgIFNjcm9sbExvY2s6ICdTY3JvbGxMb2NrJyxcbiAgICAgICAgICAgIFNoaWZ0ICAgICA6ICdTaGlmdCcsXG4gICAgICAgICAgICBTdXBlciAgICAgOiAnU3VwZXInLCAvLyAnT1MnIHVuZGVyIEZpcmVmb3hcbiAgICAgICAgICAgIFN5bWJvbCAgICA6ICdTeW1ib2wnLFxuICAgICAgICAgICAgU3ltYm9sTG9jazogJ1N5bWJvbExvY2snLFxuXG4gICAgICAgICAgICAvLyBXaGl0ZXNwYWNlIGtleXNcbiAgICAgICAgICAgIEVudGVyOiAnRW50ZXInLFxuICAgICAgICAgICAgVGFiICA6ICdUYWInLFxuICAgICAgICAgICAgU3BhY2U6ICcgJywgLy8gJ1NwYWNlYmFyJyBmb3IgRmlyZWZveCA8MzcsIGFuZCBJRTlcblxuICAgICAgICAgICAgLy8gTmF2aWdhdGlvbiBrZXlzXG4gICAgICAgICAgICBMZWZ0QXJyb3cgOiAnQXJyb3dMZWZ0JywgLy8gJ0xlZnQnIGZvciBGaXJlZm94IDw9MzYsIGFuZCBJRTlcbiAgICAgICAgICAgIFVwQXJyb3cgICA6ICdBcnJvd1VwJywgLy8gJ1VwJyBmb3IgRmlyZWZveCA8PTM2LCBhbmQgSUU5XG4gICAgICAgICAgICBSaWdodEFycm93OiAnQXJyb3dSaWdodCcsIC8vICdSaWdodCcgZm9yIEZpcmVmb3ggPD0zNiwgYW5kIElFOVxuICAgICAgICAgICAgRG93bkFycm93IDogJ0Fycm93RG93bicsIC8vICdEb3duJyBmb3IgRmlyZWZveCA8PTM2LCBhbmQgSUU5XG4gICAgICAgICAgICBFbmQgICAgICAgOiAnRW5kJyxcbiAgICAgICAgICAgIEhvbWUgICAgICA6ICdIb21lJyxcbiAgICAgICAgICAgIFBhZ2VVcCAgICA6ICdQYWdlVXAnLFxuICAgICAgICAgICAgUGFnZURvd24gIDogJ1BhZ2VEb3duJyxcblxuICAgICAgICAgICAgLy8gRWRpdGluZyBrZXlzXG4gICAgICAgICAgICBCYWNrc3BhY2U6ICdCYWNrc3BhY2UnLFxuICAgICAgICAgICAgQ2xlYXIgICAgOiAnQ2xlYXInLFxuICAgICAgICAgICAgQ29weSAgICAgOiAnQ29weScsXG4gICAgICAgICAgICBDclNlbCAgICA6ICdDclNlbCcsIC8vICdDcnNlbCcgZm9yIEZpcmVmb3ggPD0zNiwgYW5kIElFOVxuICAgICAgICAgICAgQ3V0ICAgICAgOiAnQ3V0JyxcbiAgICAgICAgICAgIERlbGV0ZSAgIDogJ0RlbGV0ZScsIC8vICdEZWwnIGZvciBGaXJlZm94IDw9MzYsIGFuZCBJRTlcbiAgICAgICAgICAgIEVyYXNlRW9mIDogJ0VyYXNlRW9mJyxcbiAgICAgICAgICAgIEV4U2VsICAgIDogJ0V4U2VsJywgLy8gJ0V4c2VsJyBmb3IgRmlyZWZveCA8PTM2LCBhbmQgSUU5XG4gICAgICAgICAgICBJbnNlcnQgICA6ICdJbnNlcnQnLFxuICAgICAgICAgICAgUGFzdGUgICAgOiAnUGFzdGUnLFxuICAgICAgICAgICAgUmVkbyAgICAgOiAnUmVkbycsXG4gICAgICAgICAgICBVbmRvICAgICA6ICdVbmRvJyxcblxuICAgICAgICAgICAgLy8gVUkga2V5c1xuICAgICAgICAgICAgQWNjZXB0ICAgICA6ICdBY2NlcHQnLFxuICAgICAgICAgICAgQWdhaW4gICAgICA6ICdBZ2FpbicsXG4gICAgICAgICAgICBBdHRuICAgICAgIDogJ0F0dG4nLCAvLyAnVW5pZGVudGlmaWVkJyBmb3IgRmlyZWZveCwgQ2hyb21lLCBhbmQgSUU5ICgnS2FuYU1vZGUnIHdoZW4gdXNpbmcgdGhlIEphcGFuZXNlIGtleWJvYXJkIGxheW91dClcbiAgICAgICAgICAgIENhbmNlbCAgICAgOiAnQ2FuY2VsJyxcbiAgICAgICAgICAgIENvbnRleHRNZW51OiAnQ29udGV4dE1lbnUnLCAvLyAnQXBwcycgZm9yIEZpcmVmb3ggPD0zNiwgYW5kIElFOVxuICAgICAgICAgICAgRXNjICAgICAgICA6ICdFc2NhcGUnLCAvLyAnRXNjJyBmb3IgRmlyZWZveCA8PTM2LCBhbmQgSUU5XG4gICAgICAgICAgICBFeGVjdXRlICAgIDogJ0V4ZWN1dGUnLFxuICAgICAgICAgICAgRmluZCAgICAgICA6ICdGaW5kJyxcbiAgICAgICAgICAgIEZpbmlzaCAgICAgOiAnRmluaXNoJywgLy8gJ1VuaWRlbnRpZmllZCcgZm9yIEZpcmVmb3gsIENocm9tZSwgYW5kIElFOSAoJ0thdGFrYW5hJyB3aGVuIHVzaW5nIHRoZSBKYXBhbmVzZSBrZXlib2FyZCBsYXlvdXQpXG4gICAgICAgICAgICBIZWxwICAgICAgIDogJ0hlbHAnLFxuICAgICAgICAgICAgUGF1c2UgICAgICA6ICdQYXVzZScsXG4gICAgICAgICAgICBQbGF5ICAgICAgIDogJ1BsYXknLFxuICAgICAgICAgICAgUHJvcHMgICAgICA6ICdQcm9wcycsXG4gICAgICAgICAgICBTZWxlY3QgICAgIDogJ1NlbGVjdCcsXG4gICAgICAgICAgICBab29tSW4gICAgIDogJ1pvb21JbicsXG4gICAgICAgICAgICBab29tT3V0ICAgIDogJ1pvb21PdXQnLFxuXG4gICAgICAgICAgICAvLyBEZXZpY2Uga2V5c1xuICAgICAgICAgICAgQnJpZ2h0bmVzc0Rvd246ICdCcmlnaHRuZXNzRG93bicsXG4gICAgICAgICAgICBCcmlnaHRuZXNzVXAgIDogJ0JyaWdodG5lc3NVcCcsXG4gICAgICAgICAgICBFamVjdCAgICAgICAgIDogJ0VqZWN0JyxcbiAgICAgICAgICAgIExvZ09mZiAgICAgICAgOiAnTG9nT2ZmJyxcbiAgICAgICAgICAgIFBvd2VyICAgICAgICAgOiAnUG93ZXInLFxuICAgICAgICAgICAgUG93ZXJPZmYgICAgICA6ICdQb3dlck9mZicsXG4gICAgICAgICAgICBQcmludFNjcmVlbiAgIDogJ1ByaW50U2NyZWVuJyxcbiAgICAgICAgICAgIEhpYmVybmF0ZSAgICAgOiAnSGliZXJuYXRlJywgLy8gJ1VuaWRlbnRpZmllZCcgZm9yIEZpcmVmb3ggPD0zN1xuICAgICAgICAgICAgU3RhbmRieSAgICAgICA6ICdTdGFuZGJ5JywgLy8gJ1VuaWRlbnRpZmllZCcgZm9yIEZpcmVmb3ggPD0zNiwgYW5kIElFOVxuICAgICAgICAgICAgV2FrZVVwICAgICAgICA6ICdXYWtlVXAnLFxuXG4gICAgICAgICAgICAvLyBJTUUgYW5kIGNvbXBvc2l0aW9uIGtleXNcbiAgICAgICAgICAgIENvbXBvc2U6ICdDb21wb3NlJyxcbiAgICAgICAgICAgIERlYWQgICA6ICdEZWFkJyxcblxuICAgICAgICAgICAgLy8gRnVuY3Rpb24ga2V5c1xuICAgICAgICAgICAgRjEgOiAnRjEnLFxuICAgICAgICAgICAgRjIgOiAnRjInLFxuICAgICAgICAgICAgRjMgOiAnRjMnLFxuICAgICAgICAgICAgRjQgOiAnRjQnLFxuICAgICAgICAgICAgRjUgOiAnRjUnLFxuICAgICAgICAgICAgRjYgOiAnRjYnLFxuICAgICAgICAgICAgRjcgOiAnRjcnLFxuICAgICAgICAgICAgRjggOiAnRjgnLFxuICAgICAgICAgICAgRjkgOiAnRjknLFxuICAgICAgICAgICAgRjEwOiAnRjEwJyxcbiAgICAgICAgICAgIEYxMTogJ0YxMScsXG4gICAgICAgICAgICBGMTI6ICdGMTInLFxuXG4gICAgICAgICAgICAvLyBEb2N1bWVudCBrZXlzXG4gICAgICAgICAgICBQcmludDogJ1ByaW50JyxcblxuICAgICAgICAgICAgLy8gJ05vcm1hbCcga2V5c1xuICAgICAgICAgICAgbnVtMCAgICAgICAgOiAnMCcsXG4gICAgICAgICAgICBudW0xICAgICAgICA6ICcxJyxcbiAgICAgICAgICAgIG51bTIgICAgICAgIDogJzInLFxuICAgICAgICAgICAgbnVtMyAgICAgICAgOiAnMycsXG4gICAgICAgICAgICBudW00ICAgICAgICA6ICc0JyxcbiAgICAgICAgICAgIG51bTUgICAgICAgIDogJzUnLFxuICAgICAgICAgICAgbnVtNiAgICAgICAgOiAnNicsXG4gICAgICAgICAgICBudW03ICAgICAgICA6ICc3JyxcbiAgICAgICAgICAgIG51bTggICAgICAgIDogJzgnLFxuICAgICAgICAgICAgbnVtOSAgICAgICAgOiAnOScsXG4gICAgICAgICAgICBhICAgICAgICAgICA6ICdhJyxcbiAgICAgICAgICAgIGIgICAgICAgICAgIDogJ2InLFxuICAgICAgICAgICAgYyAgICAgICAgICAgOiAnYycsXG4gICAgICAgICAgICBkICAgICAgICAgICA6ICdkJyxcbiAgICAgICAgICAgIGUgICAgICAgICAgIDogJ2UnLFxuICAgICAgICAgICAgZiAgICAgICAgICAgOiAnZicsXG4gICAgICAgICAgICBnICAgICAgICAgICA6ICdnJyxcbiAgICAgICAgICAgIGggICAgICAgICAgIDogJ2gnLFxuICAgICAgICAgICAgaSAgICAgICAgICAgOiAnaScsXG4gICAgICAgICAgICBqICAgICAgICAgICA6ICdqJyxcbiAgICAgICAgICAgIGsgICAgICAgICAgIDogJ2snLFxuICAgICAgICAgICAgbCAgICAgICAgICAgOiAnbCcsXG4gICAgICAgICAgICBtICAgICAgICAgICA6ICdtJyxcbiAgICAgICAgICAgIG4gICAgICAgICAgIDogJ24nLFxuICAgICAgICAgICAgbyAgICAgICAgICAgOiAnbycsXG4gICAgICAgICAgICBwICAgICAgICAgICA6ICdwJyxcbiAgICAgICAgICAgIHEgICAgICAgICAgIDogJ3EnLFxuICAgICAgICAgICAgciAgICAgICAgICAgOiAncicsXG4gICAgICAgICAgICBzICAgICAgICAgICA6ICdzJyxcbiAgICAgICAgICAgIHQgICAgICAgICAgIDogJ3QnLFxuICAgICAgICAgICAgdSAgICAgICAgICAgOiAndScsXG4gICAgICAgICAgICB2ICAgICAgICAgICA6ICd2JyxcbiAgICAgICAgICAgIHcgICAgICAgICAgIDogJ3cnLFxuICAgICAgICAgICAgeCAgICAgICAgICAgOiAneCcsXG4gICAgICAgICAgICB5ICAgICAgICAgICA6ICd5JyxcbiAgICAgICAgICAgIHogICAgICAgICAgIDogJ3onLFxuICAgICAgICAgICAgQSAgICAgICAgICAgOiAnQScsXG4gICAgICAgICAgICBCICAgICAgICAgICA6ICdCJyxcbiAgICAgICAgICAgIEMgICAgICAgICAgIDogJ0MnLFxuICAgICAgICAgICAgRCAgICAgICAgICAgOiAnRCcsXG4gICAgICAgICAgICBFICAgICAgICAgICA6ICdFJyxcbiAgICAgICAgICAgIEYgICAgICAgICAgIDogJ0YnLFxuICAgICAgICAgICAgRyAgICAgICAgICAgOiAnRycsXG4gICAgICAgICAgICBIICAgICAgICAgICA6ICdIJyxcbiAgICAgICAgICAgIEkgICAgICAgICAgIDogJ0knLFxuICAgICAgICAgICAgSiAgICAgICAgICAgOiAnSicsXG4gICAgICAgICAgICBLICAgICAgICAgICA6ICdLJyxcbiAgICAgICAgICAgIEwgICAgICAgICAgIDogJ0wnLFxuICAgICAgICAgICAgTSAgICAgICAgICAgOiAnTScsXG4gICAgICAgICAgICBOICAgICAgICAgICA6ICdOJyxcbiAgICAgICAgICAgIE8gICAgICAgICAgIDogJ08nLFxuICAgICAgICAgICAgUCAgICAgICAgICAgOiAnUCcsXG4gICAgICAgICAgICBRICAgICAgICAgICA6ICdRJyxcbiAgICAgICAgICAgIFIgICAgICAgICAgIDogJ1InLFxuICAgICAgICAgICAgUyAgICAgICAgICAgOiAnUycsXG4gICAgICAgICAgICBUICAgICAgICAgICA6ICdUJyxcbiAgICAgICAgICAgIFUgICAgICAgICAgIDogJ1UnLFxuICAgICAgICAgICAgViAgICAgICAgICAgOiAnVicsXG4gICAgICAgICAgICBXICAgICAgICAgICA6ICdXJyxcbiAgICAgICAgICAgIFggICAgICAgICAgIDogJ1gnLFxuICAgICAgICAgICAgWSAgICAgICAgICAgOiAnWScsXG4gICAgICAgICAgICBaICAgICAgICAgICA6ICdaJyxcbiAgICAgICAgICAgIFNlbWljb2xvbiAgIDogJzsnLFxuICAgICAgICAgICAgRXF1YWwgICAgICAgOiAnPScsXG4gICAgICAgICAgICBDb21tYSAgICAgICA6ICcsJyxcbiAgICAgICAgICAgIEh5cGhlbiAgICAgIDogJy0nLFxuICAgICAgICAgICAgTWludXMgICAgICAgOiAnLScsXG4gICAgICAgICAgICBQbHVzICAgICAgICA6ICcrJyxcbiAgICAgICAgICAgIERvdCAgICAgICAgIDogJy4nLFxuICAgICAgICAgICAgU2xhc2ggICAgICAgOiAnLycsXG4gICAgICAgICAgICBCYWNrcXVvdGUgICA6ICdgJyxcbiAgICAgICAgICAgIExlZnRCcmFja2V0IDogJ1snLFxuICAgICAgICAgICAgUmlnaHRCcmFja2V0OiAnXScsXG4gICAgICAgICAgICBCYWNrc2xhc2ggICA6ICdcXFxcJyxcbiAgICAgICAgICAgIFF1b3RlICAgICAgIDogXCInXCIsXG5cbiAgICAgICAgICAgIC8vIE51bWVyaWMga2V5cGFkIGtleXNcbiAgICAgICAgICAgIG51bXBhZDAgICAgICAgICAgICAgICAgICAgICAgIDogJzAnLFxuICAgICAgICAgICAgbnVtcGFkMSAgICAgICAgICAgICAgICAgICAgICAgOiAnMScsXG4gICAgICAgICAgICBudW1wYWQyICAgICAgICAgICAgICAgICAgICAgICA6ICcyJyxcbiAgICAgICAgICAgIG51bXBhZDMgICAgICAgICAgICAgICAgICAgICAgIDogJzMnLFxuICAgICAgICAgICAgbnVtcGFkNCAgICAgICAgICAgICAgICAgICAgICAgOiAnNCcsXG4gICAgICAgICAgICBudW1wYWQ1ICAgICAgICAgICAgICAgICAgICAgICA6ICc1JyxcbiAgICAgICAgICAgIG51bXBhZDYgICAgICAgICAgICAgICAgICAgICAgIDogJzYnLFxuICAgICAgICAgICAgbnVtcGFkNyAgICAgICAgICAgICAgICAgICAgICAgOiAnNycsXG4gICAgICAgICAgICBudW1wYWQ4ICAgICAgICAgICAgICAgICAgICAgICA6ICc4JyxcbiAgICAgICAgICAgIG51bXBhZDkgICAgICAgICAgICAgICAgICAgICAgIDogJzknLFxuICAgICAgICAgICAgTnVtcGFkRG90ICAgICAgICAgICAgICAgICAgICAgOiAnLicsXG4gICAgICAgICAgICBOdW1wYWREb3RBbHQgICAgICAgICAgICAgICAgICA6ICcsJywgLy8gTW9kZXJuIGJyb3dzZXJzIGF1dG9tYXRpY2FsbHkgYWRhcHQgdGhlIGNoYXJhY3RlciBzZW50IGJ5IHRoaXMga2V5IHRvIHRoZSBkZWNpbWFsIGNoYXJhY3RlciBvZiB0aGUgY3VycmVudCBsYW5ndWFnZVxuICAgICAgICAgICAgTnVtcGFkTXVsdGlwbHkgICAgICAgICAgICAgICAgOiAnKicsXG4gICAgICAgICAgICBOdW1wYWRQbHVzICAgICAgICAgICAgICAgICAgICA6ICcrJyxcbiAgICAgICAgICAgIE51bXBhZE1pbnVzICAgICAgICAgICAgICAgICAgIDogJy0nLFxuICAgICAgICAgICAgTnVtcGFkU2xhc2ggICAgICAgICAgICAgICAgICAgOiAnLycsXG4gICAgICAgICAgICBOdW1wYWREb3RPYnNvbGV0ZUJyb3dzZXJzICAgICA6ICdEZWNpbWFsJyxcbiAgICAgICAgICAgIE51bXBhZE11bHRpcGx5T2Jzb2xldGVCcm93c2VyczogJ011bHRpcGx5JyxcbiAgICAgICAgICAgIE51bXBhZFBsdXNPYnNvbGV0ZUJyb3dzZXJzICAgIDogJ0FkZCcsXG4gICAgICAgICAgICBOdW1wYWRNaW51c09ic29sZXRlQnJvd3NlcnMgICA6ICdTdWJ0cmFjdCcsXG4gICAgICAgICAgICBOdW1wYWRTbGFzaE9ic29sZXRlQnJvd3NlcnMgICA6ICdEaXZpZGUnLFxuXG4gICAgICAgICAgICAvLyBTcGVjaWFsIGFycmF5cyBmb3IgcXVpY2tlciB0ZXN0c1xuICAgICAgICAgICAgX2FsbEZuS2V5cyAgICAgICAgICAgOiBbJ0YxJywgJ0YyJywgJ0YzJywgJ0Y0JywgJ0Y1JywgJ0Y2JywgJ0Y3JywgJ0Y4JywgJ0Y5JywgJ0YxMCcsICdGMTEnLCAnRjEyJ10sXG4gICAgICAgICAgICBfc29tZU5vblByaW50YWJsZUtleXM6IFsnVGFiJywgJ0VudGVyJywgJ1NoaWZ0JywgJ1NoaWZ0TGVmdCcsICdTaGlmdFJpZ2h0JywgJ0NvbnRyb2wnLCAnQ29udHJvbExlZnQnLCAnQ29udHJvbFJpZ2h0JywgJ0FsdCcsICdBbHRMZWZ0JywgJ0FsdFJpZ2h0JywgJ1BhdXNlJywgJ0NhcHNMb2NrJywgJ0VzY2FwZSddLFxuICAgICAgICAgICAgX2RpcmVjdGlvbktleXMgICAgICAgOiBbJ1BhZ2VVcCcsICdQYWdlRG93bicsICdFbmQnLCAnSG9tZScsICdBcnJvd0Rvd24nLCAnQXJyb3dMZWZ0JywgJ0Fycm93UmlnaHQnLCAnQXJyb3dVcCddLFxuICAgICAgICB9O1xuICAgIH0sXG59O1xuXG5leHBvcnQgZGVmYXVsdCBBdXRvTnVtZXJpY0VudW07XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvQXV0b051bWVyaWNFbnVtLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==")
        }, function(module, exports, __webpack_require__) {
        }, function(module, exports, __webpack_require__) {
            eval("/*** IMPORTS FROM imports-loader ***/\n(function() {\n\n'use strict';\n\nvar _AutoNumeric = __webpack_require__(1);\n\nvar _AutoNumeric2 = _interopRequireDefault(_AutoNumeric);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\n/**\n * Options values enumeration\n */\nObject.defineProperty(_AutoNumeric2.default, 'options', {\n    get: function get() {\n        return {\n            /* Defines if the decimal places should be padded with zeroes\n             * `true`     : always pad decimals with zeros (ie. '12.3400')\n             * `false`    : never pad with zeros (ie. '12.34')\n             * `'floats'` : pad with zeroes only when there are decimals (ie. '12' and '12.3400')\n             * Note: setting allowDecimalPadding to 'false' will override the 'decimalPlaces' setting.\n             */\n            allowDecimalPadding: {\n                always: true,\n                never: false,\n                floats: 'floats'\n            },\n\n            /* Defines where should be positioned the caret on focus\n             * null : Do not enforce any caret positioning on focus (this is needed when using `selectOnFocus`)\n             * `'start'` : put the caret of the far left side of the value (excluding the positive/negative sign and currency symbol, if any)\n             * `'end'` : put the caret of the far right side of the value (excluding the positive/negative sign and currency symbol, if any)\n             * `'decimalLeft'` : put the caret of the left of the decimal character if any\n             * `'decimalRight'` : put the caret of the right of the decimal character if any\n             */\n            caretPositionOnFocus: {\n                start: 'start',\n                end: 'end',\n                decimalLeft: 'decimalLeft',\n                decimalRight: 'decimalRight',\n                doNoForceCaretPosition: null\n            },\n\n            /* Defines if a local list of AutoNumeric objects should be kept when initializing this object.\n             * This list is used by the `global.*` functions.\n             */\n            createLocalList: {\n                createList: true,\n                doNotCreateList: false\n            },\n\n            /* Defines the currency symbol string.\n             * It can be a string of more than one character (allowing for instance to use a space on either side of it, example: '$ ' or ' $')\n             * cf. https://en.wikipedia.org/wiki/Currency_symbol\n             */\n            currencySymbol: {\n                none: '',\n                currencySign: '¤',\n                austral: '₳', // ARA\n                australCentavo: '¢',\n                baht: '฿', // THB\n                cedi: '₵', // GHS\n                cent: '¢',\n                colon: '₡', // CRC\n                cruzeiro: '₢', // BRB - Not used anymore since 1993\n                dollar: '$',\n                dong: '₫', // VND\n                drachma: '₯', // GRD (or 'Δρχ.' or 'Δρ.')\n                dram: '​֏', // AMD\n                european: '₠', // XEU (old currency before the Euro)\n                euro: '€', // EUR\n                florin: 'ƒ',\n                franc: '₣', // FRF\n                guarani: '₲', // PYG\n                hryvnia: '₴', // грн\n                kip: '₭', // LAK\n                att: 'ອັດ', // cents of the Kip\n                lepton: 'Λ.', // cents of the Drachma\n                lira: '₺', // TRY\n                liraOld: '₤',\n                lari: '₾', // GEL\n                mark: 'ℳ',\n                mill: '₥',\n                naira: '₦', // NGN\n                peseta: '₧',\n                peso: '₱', // PHP\n                pfennig: '₰', // cents of the Mark\n                pound: '£',\n                real: 'R$', // Brazilian real\n                riel: '៛', // KHR\n                ruble: '₽', // RUB\n                rupee: '₹', // INR\n                rupeeOld: '₨',\n                shekel: '₪',\n                shekelAlt: 'ש״ח‎‎',\n                taka: '৳', // BDT\n                tenge: '₸', // KZT\n                togrog: '₮', // MNT\n                won: '₩',\n                yen: '¥'\n            },\n\n            /* Defines where the currency symbol should be placed (before of after the numbers)\n             * for prefix currencySymbolPlacement: \"p\" (default)\n             * for suffix currencySymbolPlacement: \"s\"\n             */\n            currencySymbolPlacement: {\n                prefix: 'p',\n                suffix: 's'\n            },\n\n            /* Defines what decimal separator character is used\n             */\n            decimalCharacter: {\n                comma: ',',\n                dot: '.',\n                middleDot: '·',\n                arabicDecimalSeparator: '٫',\n                decimalSeparatorKeySymbol: '⎖'\n            },\n\n            /* Allow to declare an alternative decimal separator which is automatically replaced by `decimalCharacter` when typed.\n             * This is used by countries that use a comma \",\" as the decimal character and have keyboards\\numeric pads that have\n             * a period 'full stop' as the decimal character (France or Spain for instance).\n             */\n            decimalCharacterAlternative: {\n                none: null,\n                comma: ',',\n                dot: '.'\n            },\n\n            /* Defines the default number of decimal places to show on the formatted value, and keep for the precision.\n             * Incidentally, since we need to be able to show that many decimal places, this also defines the raw value precision by default.\n             */\n            decimalPlaces: {\n                none: 0,\n                one: 1,\n                two: 2,\n                three: 3,\n                four: 4,\n                five: 5,\n                six: 6\n            },\n\n            /* Defines how many decimal places should be kept for the raw value (ie. This is the precision for float values).\n             *\n             * If this option is set to `null` (which is the default), then the value of `decimalPlaces` is used for `decimalPlacesRawValue` as well.\n             * Note: Setting this to a lower number of decimal places than the one to be shown will lead to confusion for the users.\n             */\n            decimalPlacesRawValue: {\n                useDefault: null,\n                none: 0,\n                one: 1,\n                two: 2,\n                three: 3,\n                four: 4,\n                five: 5,\n                six: 6\n            },\n\n            /* Defines how many decimal places should be visible when the element is unfocused.\n             * If this is set to `null`, then this option is ignored, and the `decimalPlaces` option value will be used instead.\n             * This means this is optional ; if omitted the decimal places will be the same when the input has the focus.\n             *\n             * This option can be used in conjonction with the two other `scale*` options, which allows to display a different formatted value when the element is unfocused, while another formatted value is shown when focused.\n             * For those `scale*` option to have any effect, `divisorWhenUnfocused` must not be `null`.\n             */\n            decimalPlacesShownOnBlur: {\n                useDefault: null,\n                none: 0,\n                one: 1,\n                two: 2,\n                three: 3,\n                four: 4,\n                five: 5,\n                six: 6\n            },\n\n            /* Defines how many decimal places should be visible when the element has the focus.\n             * If this is set to `null`, then this option is ignored, and the `decimalPlaces` option value will be used instead.\n             *\n             * Example:\n             * Fon instance if `decimalPlacesShownOnFocus` is set to `5` and the default number of decimal places is `2`, then on focus `1,000.12345` will be shown, while without focus `1,000.12` will be set back.\n             * Note 1: the results depends on the rounding method used.\n             * Note 2: the `getNumericString()` method returns the extended decimal places\n             */\n            decimalPlacesShownOnFocus: {\n                useDefault: null,\n                none: 0,\n                one: 1,\n                two: 2,\n                three: 3,\n                four: 4,\n                five: 5,\n                six: 6\n            },\n\n            /* Helper option for ASP.NET postback\n             * This should be set as the value of the unformatted default value\n             * examples:\n             * no default value=\"\" {defaultValueOverride: \"\"}\n             * value=1234.56 {defaultValueOverride: '1234.56'}\n             */\n            defaultValueOverride: {\n                doNotOverride: null\n            },\n\n            /* Defines how many numbers should be grouped together (usually for the thousand separator)\n             * - \"2\",  results in 99,99,99,999 India's lakhs\n             * - \"2s\", results in 99,999,99,99,999 India's lakhs scaled\n             * - \"3\",  results in 999,999,999 (default)\n             * - \"4\",  results in 9999,9999,9999 used in some Asian countries\n             */\n            digitalGroupSpacing: {\n                two: '2',\n                twoScaled: '2s',\n                three: '3',\n                four: '4'\n            },\n\n            /* Defines the thousand grouping separator character\n             * Example : If `'.'` is set, then you'll get `'1.234.567'`\n             */\n            digitGroupSeparator: {\n                comma: ',',\n                dot: '.',\n                normalSpace: ' ',\n                thinSpace: '\\u2009',\n                narrowNoBreakSpace: '\\u202F',\n                noBreakSpace: '\\xA0',\n                noSeparator: '',\n                apostrophe: '\\'',\n                arabicThousandsSeparator: '٬',\n                dotAbove: '˙'\n            },\n\n            /* The `divisorWhenUnfocused` divide the element value on focus.\n             * On blur, the element value is multiplied back.\n             *\n             * Example : Given the option { divisorWhenUnfocused: 1000 } (or directly in the html `<input data-divisor-when-unfocused=\"1000\">`)\n             * The divisor value does not need to be an integer, but please understand that Javascript has limited accuracy in math ; use with caution.\n             * Note: The `getNumericString` method returns the full value, including the 'hidden' decimals.\n             */\n            divisorWhenUnfocused: {\n                none: null,\n                percentage: 100,\n                permille: 1000,\n                basisPoint: 10000\n            },\n\n            /* Defines what should be displayed in the element if the raw value is an empty string ('').\n             * - 'focus'  : The currency sign is displayed when the input receives focus (default)\n             * - 'press'  : The currency sign is displayed whenever a key is being pressed\n             * - 'always' : The currency sign is always displayed\n             * - 'zero'   : A zero is displayed ('rounded' with or without a currency sign) if the input has no value on focus out\n             * - 'null'   : When the element is empty, the `rawValue` and the element value/text is set to `null`. This also allows to set the value to `null` using `anElement.set(null)`.\n             */\n            emptyInputBehavior: {\n                null: 'null',\n                focus: 'focus',\n                press: 'press',\n                always: 'always',\n                zero: 'zero'\n            },\n\n            /* This option is the 'strict mode' (aka 'debug' mode), which allows autoNumeric to strictly analyse the options passed, and fails if an unknown options is used in the settings object.\n             * You should set that to `true` if you want to make sure you are only using 'pure' autoNumeric settings objects in your code.\n             * If you see uncaught errors in the console and your code starts to fail, this means somehow those options gets polluted by another program (which usually happens when using frameworks).\n             */\n            failOnUnknownOption: {\n                fail: true,\n                ignore: false\n            },\n\n            /* Determine if the default value will be formatted on initialization.\n             */\n            formatOnPageLoad: {\n                format: true, // automatically formats the default value on initialization\n                doNotFormat: false // will not format the default value on initialization\n            },\n\n            /* Set the undo/redo history table size.\n             * Each record keeps the raw value as well and the last known caret/selection positions.\n             */\n            historySize: {\n                verySmall: 5,\n                small: 10,\n                medium: 20,\n                large: 50,\n                veryLarge: 100,\n                insane: Number.MAX_SAFE_INTEGER\n            },\n\n            /* Allow the user to 'cancel' and undo the changes he made to the given autonumeric-managed element, by pressing the 'Escape' key.\n             * Whenever the user 'validate' the input (either by hitting 'Enter', or blurring the element), the new value is saved for subsequent 'cancellation'.\n             *\n             * The process :\n             *   - save the input value on focus\n             *   - if the user change the input value, and hit `Escape`, then the initial value saved on focus is set back\n             *   - on the other hand if the user either have used `Enter` to validate (`Enter` throws a change event) his entries, or if the input value has been changed by another script in the mean time, then we save the new input value\n             *   - on a successful 'cancel', select the whole value (while respecting the `selectNumberOnly` option)\n             *   - bonus; if the value has not changed, hitting 'Esc' just select all the input value (while respecting the `selectNumberOnly` option)\n             */\n            isCancellable: {\n                cancellable: true,\n                notCancellable: false\n            },\n\n            /* Controls the leading zero behavior\n             * - 'allow' : allows leading zeros to be entered. Zeros will be truncated when entering additional digits. On focusout zeros will be deleted\n             * - 'deny'  : allows only one leading zero on values that are between 1 and -1\n             * - 'keep'  : allows leading zeros to be entered. on focusout zeros will be retained\n             */\n            leadingZero: {\n                allow: 'allow',\n                deny: 'deny',\n                keep: 'keep'\n            },\n\n            /* Defines the maximum possible value a user can enter.\n             * Notes:\n             * - this value must a string and use the period for the decimal point\n             * - this value needs to be larger than `minimumValue`\n             */\n            maximumValue: {\n                tenTrillions: '9999999999999.99', // 9.999.999.999.999,99 ~= 10000 billions\n                tenTrillionsNoDecimals: '9999999999999', //FIXME Update all those limits to the 'real' numbers\n                oneBillion: '999999999.99',\n                zero: '0'\n            },\n\n            /* Defines the minimum possible value a user can enter.\n             * Notes:\n             * - this value must a string and use the period for the decimal point\n             * - this value needs to be smaller than `maximumValue`\n             * - if this is superior to 0, then you'll effectively prevent your user to entirely delete the content of your element\n             */\n            minimumValue: {\n                tenTrillions: '-9999999999999.99', // -9.999.999.999.999,99 ~= 10000 billions\n                tenTrillionsNoDecimals: '-9999999999999',\n                oneBillion: '-999999999.99',\n                zero: '0'\n            },\n\n            /* Allow the user to increment or decrement the element value with the mouse wheel.\n             * The wheel behavior can by modified by the `wheelStep` option.\n             * This `wheelStep` options can be used in two ways, either by setting :\n             * - a 'fixed' step value (`wheelStep : 1000`), or\n             * - the 'progressive' string (`wheelStep : 'progressive'`), which will then activate a special mode where the step is automatically calculated based on the element value size.\n             *\n             * Note :\n             * A special behavior is applied in order to avoid preventing the user to scroll the page if the inputs are covering the whole available space.\n             * You can use the 'Shift' modifier key while using the mouse wheel in order to temporarily disable the increment/decrement feature (useful on small screen where some badly configured inputs could use all the available space).\n             */\n            modifyValueOnWheel: {\n                modifyValue: true,\n                doNothing: false\n            },\n\n            /* Adds brackets on negative values (ie. transforms '-$ 999.99' to '(999.99)')\n             * Those brackets are visible only when the field does NOT have the focus.\n             * The left and right symbols should be enclosed in quotes and separated by a comma.\n             */\n            negativeBracketsTypeOnBlur: {\n                parentheses: '(,)',\n                brackets: '[,]',\n                chevrons: '<,>',\n                curlyBraces: '{,}',\n                angleBrackets: '〈,〉',\n                japaneseQuotationMarks: '｢,｣',\n                halfBrackets: '⸤,⸥',\n                whiteSquareBrackets: '⟦,⟧',\n                quotationMarks: '‹,›',\n                guillemets: '«,»',\n                none: null // This is the default value, which deactivate this feature\n            },\n\n            /* Placement of the negative/positive sign relative to the `currencySymbol` option.\n             *\n             * Example:\n             * -1,234.56  => default no options required\n             * -$1,234.56 => {currencySymbol: \"$\"} or {currencySymbol: \"$\", negativePositiveSignPlacement: \"l\"}\n             * $-1,234.56 => {currencySymbol: \"$\", negativePositiveSignPlacement: \"r\"} // Default if negativePositiveSignPlacement is 'null' and currencySymbol is not empty\n             * -1,234.56$ => {currencySymbol: \"$\", currencySymbolPlacement: \"s\", negativePositiveSignPlacement: \"p\"} // Default if negativePositiveSignPlacement is 'null' and currencySymbol is not empty\n             * 1,234.56-  => {negativePositiveSignPlacement: \"s\"}\n             * $1,234.56- => {currencySymbol: \"$\", negativePositiveSignPlacement: \"s\"}\n             * 1,234.56-$ => {currencySymbol: \"$\", currencySymbolPlacement: \"s\"}\n             * 1,234.56$- => {currencySymbol: \"$\", currencySymbolPlacement: \"s\", negativePositiveSignPlacement: \"r\"}\n             */\n            negativePositiveSignPlacement: {\n                prefix: 'p',\n                suffix: 's',\n                left: 'l',\n                right: 'r',\n                none: null\n            },\n\n            /* Defines if the element should have event listeners activated on it.\n             * By default, those event listeners are only added to <input> elements and html element with the `contenteditable` attribute set to `true`, but not on the other html tags.\n             * This allows to initialize elements without any event listeners.\n             * Warning: Since AutoNumeric will not check the input content after its initialization, using some autoNumeric methods afterwards *will* probably leads to formatting problems.\n             */\n            noEventListeners: {\n                noEvents: true,\n                addEvents: false\n            },\n\n            /* Manage how autoNumeric react when the user tries to paste an invalid number.\n             * - 'error'    : (This is the default behavior) The input value is not changed and an error is output in the console.\n             * - 'ignore'   : idem than 'error', but fail silently without outputting any error/warning in the console.\n             * - 'clamp'    : if the pasted value is either too small or too big regarding the minimumValue and maximumValue range, then the result is clamped to those limits.\n             * - 'truncate' : autoNumeric will insert as many pasted numbers it can at the initial caret/selection, until everything is pasted, or the range limit is hit.\n             *                The non-pasted numbers are dropped and therefore not used at all.\n             * - 'replace'  : autoNumeric will first insert as many pasted numbers it can at the initial caret/selection, then if the range limit is hit, it will try\n             *                to replace one by one the remaining initial numbers (on the right side of the caret) with the rest of the pasted numbers.\n             *\n             * Note 1 : A paste content starting with a negative sign '-' will be accepted anywhere in the input, and will set the resulting value as a negative number\n             * Note 2 : A paste content starting with a number will be accepted, even if the rest is gibberish (ie. '123foobar456').\n             *          Only the first number will be used (here '123').\n             * Note 3 : The paste event works with the `decimalPlacesShownOnFocus` option too.\n             */\n            onInvalidPaste: {\n                error: 'error',\n                ignore: 'ignore',\n                clamp: 'clamp',\n                truncate: 'truncate',\n                replace: 'replace'\n            },\n\n            /* Defines how the value should be formatted when wanting a 'localized' version of it.\n             * - null or 'string' => 'nnnn.nn' or '-nnnn.nn' as text type. This is the default behavior.\n             * - 'number'         => nnnn.nn or -nnnn.nn as a Number (Warning: this works only for integers inferior to Number.MAX_SAFE_INTEGER)\n             * - ',' or '-,'      => 'nnnn,nn' or '-nnnn,nn'\n             * - '.-'             => 'nnnn.nn' or 'nnnn.nn-'\n             * - ',-'             => 'nnnn,nn' or 'nnnn,nn-'\n             */\n            outputFormat: {\n                string: 'string',\n                number: 'number',\n                dot: '.',\n                negativeDot: '-.',\n                comma: ',',\n                negativeComma: '-,',\n                dotNegative: '.-',\n                commaNegative: ',-',\n                none: null\n            },\n\n            /* Override the minimum and maximum limits\n             * overrideMinMaxLimits: \"ceiling\" adheres to maximumValue and ignores minimumValue settings\n             * overrideMinMaxLimits: \"floor\" adheres to minimumValue and ignores maximumValue settings\n             * overrideMinMaxLimits: \"ignore\" ignores both minimumValue & maximumValue\n             */\n            overrideMinMaxLimits: {\n                ceiling: 'ceiling',\n                floor: 'floor',\n                ignore: 'ignore',\n                doNotOverride: null\n            },\n\n            /* The `rawValueDivisor` divides the formatted value shown in the AutoNumeric element and store the result in `rawValue`.\n             * @example { rawValueDivisor: '100' } or <input data-raw-value-divisor=\"100\">\n             * Given the `0.01234` raw value, the formatted value will be displayed as `'1.234'`.\n             * This is useful when displaying percentage for instance, and avoid the need to divide/multiply by 100 between the number shown and the raw value.\n             */\n            rawValueDivisor: {\n                none: null,\n                percentage: 100,\n                permille: 1000,\n                basisPoint: 10000\n            },\n\n            /* Defines if the <input> element should be set as read only on initialization.\n             * When set to `true`, then the `readonly` html property is added to the <input> element on initialization.\n             */\n            readOnly: {\n                readOnly: true,\n                readWrite: false\n            },\n\n            /* Defines the rounding method to use.\n             * roundingMethod: \"S\", Round-Half-Up Symmetric (default)\n             * roundingMethod: \"A\", Round-Half-Up Asymmetric\n             * roundingMethod: \"s\", Round-Half-Down Symmetric (lower case s)\n             * roundingMethod: \"a\", Round-Half-Down Asymmetric (lower case a)\n             * roundingMethod: \"B\", Round-Half-Even \"Bankers Rounding\"\n             * roundingMethod: \"U\", Round Up \"Round-Away-From-Zero\"\n             * roundingMethod: \"D\", Round Down \"Round-Toward-Zero\" - same as truncate\n             * roundingMethod: \"C\", Round to Ceiling \"Toward Positive Infinity\"\n             * roundingMethod: \"F\", Round to Floor \"Toward Negative Infinity\"\n             * roundingMethod: \"N05\" Rounds to the nearest .05 => same as \"CHF\" used in 1.9X and still valid\n             * roundingMethod: \"U05\" Rounds up to next .05\n             * roundingMethod: \"D05\" Rounds down to next .05\n             */\n            roundingMethod: {\n                halfUpSymmetric: 'S',\n                halfUpAsymmetric: 'A',\n                halfDownSymmetric: 's',\n                halfDownAsymmetric: 'a',\n                halfEvenBankersRounding: 'B',\n                upRoundAwayFromZero: 'U',\n                downRoundTowardZero: 'D',\n                toCeilingTowardPositiveInfinity: 'C',\n                toFloorTowardNegativeInfinity: 'F',\n                toNearest05: 'N05',\n                toNearest05Alt: 'CHF',\n                upToNext05: 'U05',\n                downToNext05: 'D05'\n            },\n\n            /* Set to `true` to allow the `decimalPlacesShownOnFocus` value to be saved with sessionStorage\n             * If IE 6 or 7 is detected, the value will be saved as a session cookie.\n             */\n            saveValueToSessionStorage: {\n                save: true,\n                doNotSave: false\n            },\n\n            /* Determine if the select all keyboard command will select the complete input text, or only the input numeric value\n             * Note : If the currency symbol is between the numeric value and the negative sign, only the numeric value will be selected\n             */\n            selectNumberOnly: {\n                selectNumbersOnly: true,\n                selectAll: false\n            },\n\n            /* Defines if the element value should be selected on focus.\n             * Note: The selection is done using the `selectNumberOnly` option.\n             */\n            selectOnFocus: {\n                select: true,\n                doNotSelect: false\n            },\n\n            /* Defines how the serialize functions should treat the spaces.\n             * Those spaces ' ' can either be converted to the plus sign '+', which is the default, or to '%20'.\n             * Both values being valid per the spec (http://www.w3.org/Addressing/URL/uri-spec.html).\n             * Also see the summed up answer on http://stackoverflow.com/a/33939287.\n             *\n             * tl;dr : Spaces should be converted to '%20' before the '?' sign, then converted to '+' after.\n             * In our case since we serialize the query, we use '+' as the default (but allow the user to get back the old *wrong* behavior).\n             */\n            serializeSpaces: {\n                plus: '+',\n                percent: '%20'\n            },\n\n            /* Defines if the element value should be converted to the raw value on focus (and back to the formatted on blur).\n             * If set to `true`, then autoNumeric remove the thousand separator, currency symbol and suffix on focus.\n             * Example:\n             * If the input value is '$ 1,999.88 suffix', on focus it becomes '1999.88' and back to '$ 1,999.88 suffix' on focus out.\n             */\n            showOnlyNumbersOnFocus: {\n                onlyNumbers: true,\n                showAll: false\n            },\n\n            /* Allow the positive sign symbol `+` to be displayed for positive numbers.\n             * By default, this positive sign is not shown.\n             * The sign placement is controlled by the 'negativePositiveSignPlacement' option, mimicking the negative sign placement rules.\n             */\n            showPositiveSign: {\n                show: true,\n                hide: false\n            },\n\n            /* Defines if warnings should be shown in the console\n             * Those warnings can be ignored, but are usually printed when something could be improved by the user (ie. option conflicts).\n             */\n            showWarnings: {\n                show: true, // All warning are shown\n                hide: false // No warnings are shown, only the thrown errors\n            },\n\n            /* Defines the rules that calculate the CSS class(es) to apply on the element, based on the raw unformatted value.\n             * This can also be used to call callbacks whenever the `rawValue` is updated.\n             * Important: all callbacks must return `null` if no ranges/userDefined classes are selected\n             * @example\n             * {\n             *     positive   : 'autoNumeric-positive', // Or `null` to not use it\n             *     negative   : 'autoNumeric-negative',\n             *     ranges     : [\n             *         { min: 0, max: 25, class: 'autoNumeric-red' },\n             *         { min: 25, max: 50, class: 'autoNumeric-orange' },\n             *         { min: 50, max: 75, class: 'autoNumeric-yellow' },\n             *         { min: 75, max: Number.MAX_SAFE_INTEGER, class: 'autoNumeric-green' },\n             *     ],\n             *     userDefined: [\n             *         // If 'classes' is a string, set it if `true`, remove it if `false`\n             *         { callback: rawValue => { return true; }, classes: 'thisIsTrue' },\n             *         // If 'classes' is an array with only 2 elements, set the first class if `true`, the second if `false`\n             *         { callback: rawValue => rawValue % 2 === 0, classes: ['autoNumeric-even', 'autoNumeric-odd'] },\n             *         // Return only one index to use on the `classes` array (here, 'class3')\n             *         { callback: rawValue => { return 2; }, classes: ['class1', 'class2', 'class3'] },\n             *         // Return an array of indexes to use on the `classes` array (here, 'class1' and 'class3')\n             *         { callback: rawValue => { return [0, 2]; }, classes: ['class1', 'class2', 'class3'] },\n             *         // If 'classes' is `undefined` or `null`, then the callback is called with the AutoNumeric object passed as a parameter\n             *         { callback: anElement => { return anElement.getFormatted(); } },\n             *     ],\n             * }\n             */\n            styleRules: {\n                none: null,\n                positiveNegative: {\n                    positive: 'autoNumeric-positive',\n                    negative: 'autoNumeric-negative'\n                },\n                range0To100With4Steps: {\n                    ranges: [{ min: 0, max: 25, class: 'autoNumeric-red' }, { min: 25, max: 50, class: 'autoNumeric-orange' }, { min: 50, max: 75, class: 'autoNumeric-yellow' }, { min: 75, max: 100, class: 'autoNumeric-green' }]\n                },\n                evenOdd: {\n                    userDefined: [{ callback: function callback(rawValue) {\n                            return rawValue % 2 === 0;\n                        }, classes: ['autoNumeric-even', 'autoNumeric-odd'] }]\n                },\n                rangeSmallAndZero: {\n                    userDefined: [{\n                        callback: function callback(rawValue) {\n                            if (rawValue >= -1 && rawValue < 0) {\n                                return 0;\n                            }\n                            if (Number(rawValue) === 0) {\n                                return 1;\n                            }\n                            if (rawValue > 0 && rawValue <= 1) {\n                                return 2;\n                            }\n\n                            return null; // In case the rawValue is outside those ranges\n                        }, classes: ['autoNumeric-small-negative', 'autoNumeric-zero', 'autoNumeric-small-positive']\n                    }]\n                }\n            },\n\n            /* Add a text on the right hand side of the element value.\n             * This suffix text can have any characters in its string, except numeric characters and the negative/positive sign.\n             * Example: ' dollars'\n             */\n            suffixText: {\n                none: '',\n                percentage: '%',\n                permille: '‰',\n                basisPoint: '‱'\n            },\n\n            /* The three options (divisorWhenUnfocused, decimalPlacesShownOnBlur & symbolWhenUnfocused) handle scaling of the input when the input does not have focus\n             * Please note that the non-scaled value is held in data and it is advised that you use the `saveValueToSessionStorage` option to ensure retaining the value\n             * [\"divisor\", \"decimal places\", \"symbol\"]\n             * Example: with the following options set {divisorWhenUnfocused: '1000', decimalPlacesShownOnBlur: '1', symbolWhenUnfocused: ' K'}\n             * Example: focusin value \"1,111.11\" focusout value \"1.1 K\"\n             */\n\n            /* The `symbolWhenUnfocused` option is a symbol placed as a suffix when not in focus.\n             * This is optional too.\n             */\n            symbolWhenUnfocused: {\n                none: null,\n                percentage: '%',\n                permille: '‰',\n                basisPoint: '‱'\n            },\n\n            /* Defines if the element value should be unformatted when the user hover his mouse over it while holding the `Alt` key.\n             * Unformatting there means that this removes any non-number characters and displays the *raw* value, as understood by Javascript (ie. `12.34` is a valid number, while `12,34` is not).\n             *\n             * We reformat back before anything else if :\n             * - the user focus on the element by tabbing or clicking into it,\n             * - the user releases the `Alt` key, and\n             * - if we detect a mouseleave event.\n             *\n             * We unformat again if :\n             * - while the mouse is over the element, the user hit ctrl again\n             */\n            unformatOnHover: {\n                unformat: true,\n                doNotUnformat: false\n            },\n\n            /* Removes the formatting and use the raw value in each autoNumeric elements of the parent form element, on the form `submit` event.\n             * The output format is a numeric string (nnnn.nn or -nnnn.nn).\n             */\n            unformatOnSubmit: {\n                unformat: true,\n                keepCurrentValue: false\n            },\n\n            /* That option is linked to the `modifyValueOnWheel` one and will only be used if the latter is set to `true`.\n             * This option will modify the wheel behavior and can be used in two ways, either by setting :\n             * - a 'fixed' step value (a positive float or integer number `1000`), or\n             * - the `'progressive'` string.\n             *\n             * The 'fixed' mode always increment/decrement the element value by that amount, while respecting the `minimumValue` and `maximumValue` settings.\n             * The 'progressive' mode will increment/decrement the element value based on its current value. The bigger the number, the bigger the step, and vice versa.\n             */\n            wheelStep: {\n                progressive: 'progressive'\n            }\n        };\n    }\n}); /**\n     * Options for autoNumeric.js\n     * @author Alexandre Bonneau <alexandre.bonneau@linuxfr.eu>\n     * @copyright © 2016 Alexandre Bonneau\n     *\n     * The MIT License (http://www.opensource.org/licenses/mit-license.php)\n     *\n     * Permission is hereby granted, free of charge, to any person\n     * obtaining a copy of this software and associated documentation\n     * files (the \"Software\"), to deal in the Software without\n     * restriction, including without limitation the rights to use,\n     * copy, modify, merge, publish, distribute, sub license, and/or sell\n     * copies of the Software, and to permit persons to whom the\n     * Software is furnished to do so, subject to the following\n     * conditions:\n     *\n     * The above copyright notice and this permission notice shall be\n     * included in all copies or substantial portions of the Software.\n     *\n     * THE SOFTWARE IS PROVIDED \"AS IS\", WITHOUT WARRANTY OF ANY KIND,\n     * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES\n     * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND\n     * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT\n     * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,\n     * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING\n     * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR\n     * OTHER DEALINGS IN THE SOFTWARE.\n     */\n}.call(window));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvQXV0b051bWVyaWNPcHRpb25zLmpzP2NlNWQiXSwibmFtZXMiOlsiT2JqZWN0IiwiZGVmaW5lUHJvcGVydHkiLCJnZXQiLCJhbGxvd0RlY2ltYWxQYWRkaW5nIiwiYWx3YXlzIiwibmV2ZXIiLCJmbG9hdHMiLCJjYXJldFBvc2l0aW9uT25Gb2N1cyIsInN0YXJ0IiwiZW5kIiwiZGVjaW1hbExlZnQiLCJkZWNpbWFsUmlnaHQiLCJkb05vRm9yY2VDYXJldFBvc2l0aW9uIiwiY3JlYXRlTG9jYWxMaXN0IiwiY3JlYXRlTGlzdCIsImRvTm90Q3JlYXRlTGlzdCIsImN1cnJlbmN5U3ltYm9sIiwibm9uZSIsImN1cnJlbmN5U2lnbiIsImF1c3RyYWwiLCJhdXN0cmFsQ2VudGF2byIsImJhaHQiLCJjZWRpIiwiY2VudCIsImNvbG9uIiwiY3J1emVpcm8iLCJkb2xsYXIiLCJkb25nIiwiZHJhY2htYSIsImRyYW0iLCJldXJvcGVhbiIsImV1cm8iLCJmbG9yaW4iLCJmcmFuYyIsImd1YXJhbmkiLCJocnl2bmlhIiwia2lwIiwiYXR0IiwibGVwdG9uIiwibGlyYSIsImxpcmFPbGQiLCJsYXJpIiwibWFyayIsIm1pbGwiLCJuYWlyYSIsInBlc2V0YSIsInBlc28iLCJwZmVubmlnIiwicG91bmQiLCJyZWFsIiwicmllbCIsInJ1YmxlIiwicnVwZWUiLCJydXBlZU9sZCIsInNoZWtlbCIsInNoZWtlbEFsdCIsInRha2EiLCJ0ZW5nZSIsInRvZ3JvZyIsIndvbiIsInllbiIsImN1cnJlbmN5U3ltYm9sUGxhY2VtZW50IiwicHJlZml4Iiwic3VmZml4IiwiZGVjaW1hbENoYXJhY3RlciIsImNvbW1hIiwiZG90IiwibWlkZGxlRG90IiwiYXJhYmljRGVjaW1hbFNlcGFyYXRvciIsImRlY2ltYWxTZXBhcmF0b3JLZXlTeW1ib2wiLCJkZWNpbWFsQ2hhcmFjdGVyQWx0ZXJuYXRpdmUiLCJkZWNpbWFsUGxhY2VzIiwib25lIiwidHdvIiwidGhyZWUiLCJmb3VyIiwiZml2ZSIsInNpeCIsImRlY2ltYWxQbGFjZXNSYXdWYWx1ZSIsInVzZURlZmF1bHQiLCJkZWNpbWFsUGxhY2VzU2hvd25PbkJsdXIiLCJkZWNpbWFsUGxhY2VzU2hvd25PbkZvY3VzIiwiZGVmYXVsdFZhbHVlT3ZlcnJpZGUiLCJkb05vdE92ZXJyaWRlIiwiZGlnaXRhbEdyb3VwU3BhY2luZyIsInR3b1NjYWxlZCIsImRpZ2l0R3JvdXBTZXBhcmF0b3IiLCJub3JtYWxTcGFjZSIsInRoaW5TcGFjZSIsIm5hcnJvd05vQnJlYWtTcGFjZSIsIm5vQnJlYWtTcGFjZSIsIm5vU2VwYXJhdG9yIiwiYXBvc3Ryb3BoZSIsImFyYWJpY1Rob3VzYW5kc1NlcGFyYXRvciIsImRvdEFib3ZlIiwiZGl2aXNvcldoZW5VbmZvY3VzZWQiLCJwZXJjZW50YWdlIiwicGVybWlsbGUiLCJiYXNpc1BvaW50IiwiZW1wdHlJbnB1dEJlaGF2aW9yIiwibnVsbCIsImZvY3VzIiwicHJlc3MiLCJ6ZXJvIiwiZmFpbE9uVW5rbm93bk9wdGlvbiIsImZhaWwiLCJpZ25vcmUiLCJmb3JtYXRPblBhZ2VMb2FkIiwiZm9ybWF0IiwiZG9Ob3RGb3JtYXQiLCJoaXN0b3J5U2l6ZSIsInZlcnlTbWFsbCIsInNtYWxsIiwibWVkaXVtIiwibGFyZ2UiLCJ2ZXJ5TGFyZ2UiLCJpbnNhbmUiLCJOdW1iZXIiLCJNQVhfU0FGRV9JTlRFR0VSIiwiaXNDYW5jZWxsYWJsZSIsImNhbmNlbGxhYmxlIiwibm90Q2FuY2VsbGFibGUiLCJsZWFkaW5nWmVybyIsImFsbG93IiwiZGVueSIsImtlZXAiLCJtYXhpbXVtVmFsdWUiLCJ0ZW5UcmlsbGlvbnMiLCJ0ZW5UcmlsbGlvbnNOb0RlY2ltYWxzIiwib25lQmlsbGlvbiIsIm1pbmltdW1WYWx1ZSIsIm1vZGlmeVZhbHVlT25XaGVlbCIsIm1vZGlmeVZhbHVlIiwiZG9Ob3RoaW5nIiwibmVnYXRpdmVCcmFja2V0c1R5cGVPbkJsdXIiLCJwYXJlbnRoZXNlcyIsImJyYWNrZXRzIiwiY2hldnJvbnMiLCJjdXJseUJyYWNlcyIsImFuZ2xlQnJhY2tldHMiLCJqYXBhbmVzZVF1b3RhdGlvbk1hcmtzIiwiaGFsZkJyYWNrZXRzIiwid2hpdGVTcXVhcmVCcmFja2V0cyIsInF1b3RhdGlvbk1hcmtzIiwiZ3VpbGxlbWV0cyIsIm5lZ2F0aXZlUG9zaXRpdmVTaWduUGxhY2VtZW50IiwibGVmdCIsInJpZ2h0Iiwibm9FdmVudExpc3RlbmVycyIsIm5vRXZlbnRzIiwiYWRkRXZlbnRzIiwib25JbnZhbGlkUGFzdGUiLCJlcnJvciIsImNsYW1wIiwidHJ1bmNhdGUiLCJyZXBsYWNlIiwib3V0cHV0Rm9ybWF0Iiwic3RyaW5nIiwibnVtYmVyIiwibmVnYXRpdmVEb3QiLCJuZWdhdGl2ZUNvbW1hIiwiZG90TmVnYXRpdmUiLCJjb21tYU5lZ2F0aXZlIiwib3ZlcnJpZGVNaW5NYXhMaW1pdHMiLCJjZWlsaW5nIiwiZmxvb3IiLCJyYXdWYWx1ZURpdmlzb3IiLCJyZWFkT25seSIsInJlYWRXcml0ZSIsInJvdW5kaW5nTWV0aG9kIiwiaGFsZlVwU3ltbWV0cmljIiwiaGFsZlVwQXN5bW1ldHJpYyIsImhhbGZEb3duU3ltbWV0cmljIiwiaGFsZkRvd25Bc3ltbWV0cmljIiwiaGFsZkV2ZW5CYW5rZXJzUm91bmRpbmciLCJ1cFJvdW5kQXdheUZyb21aZXJvIiwiZG93blJvdW5kVG93YXJkWmVybyIsInRvQ2VpbGluZ1Rvd2FyZFBvc2l0aXZlSW5maW5pdHkiLCJ0b0Zsb29yVG93YXJkTmVnYXRpdmVJbmZpbml0eSIsInRvTmVhcmVzdDA1IiwidG9OZWFyZXN0MDVBbHQiLCJ1cFRvTmV4dDA1IiwiZG93blRvTmV4dDA1Iiwic2F2ZVZhbHVlVG9TZXNzaW9uU3RvcmFnZSIsInNhdmUiLCJkb05vdFNhdmUiLCJzZWxlY3ROdW1iZXJPbmx5Iiwic2VsZWN0TnVtYmVyc09ubHkiLCJzZWxlY3RBbGwiLCJzZWxlY3RPbkZvY3VzIiwic2VsZWN0IiwiZG9Ob3RTZWxlY3QiLCJzZXJpYWxpemVTcGFjZXMiLCJwbHVzIiwicGVyY2VudCIsInNob3dPbmx5TnVtYmVyc09uRm9jdXMiLCJvbmx5TnVtYmVycyIsInNob3dBbGwiLCJzaG93UG9zaXRpdmVTaWduIiwic2hvdyIsImhpZGUiLCJzaG93V2FybmluZ3MiLCJzdHlsZVJ1bGVzIiwicG9zaXRpdmVOZWdhdGl2ZSIsInBvc2l0aXZlIiwibmVnYXRpdmUiLCJyYW5nZTBUbzEwMFdpdGg0U3RlcHMiLCJyYW5nZXMiLCJtaW4iLCJtYXgiLCJjbGFzcyIsImV2ZW5PZGQiLCJ1c2VyRGVmaW5lZCIsImNhbGxiYWNrIiwicmF3VmFsdWUiLCJjbGFzc2VzIiwicmFuZ2VTbWFsbEFuZFplcm8iLCJzdWZmaXhUZXh0Iiwic3ltYm9sV2hlblVuZm9jdXNlZCIsInVuZm9ybWF0T25Ib3ZlciIsInVuZm9ybWF0IiwiZG9Ob3RVbmZvcm1hdCIsInVuZm9ybWF0T25TdWJtaXQiLCJrZWVwQ3VycmVudFZhbHVlIiwid2hlZWxTdGVwIiwicHJvZ3Jlc3NpdmUiXSwibWFwcGluZ3MiOiI7Ozs7O0FBNkJBOzs7Ozs7QUFFQTs7O0FBR0FBLE9BQU9DLGNBQVAsd0JBQW1DLFNBQW5DLEVBQThDO0FBQzFDQyxPQUQwQyxpQkFDcEM7QUFDRixlQUFPO0FBQ0g7Ozs7OztBQU1BQyxpQ0FBcUI7QUFDakJDLHdCQUFRLElBRFM7QUFFakJDLHVCQUFRLEtBRlM7QUFHakJDLHdCQUFRO0FBSFMsYUFQbEI7O0FBYUg7Ozs7Ozs7QUFPQUMsa0NBQXNCO0FBQ2xCQyx1QkFBd0IsT0FETjtBQUVsQkMscUJBQXdCLEtBRk47QUFHbEJDLDZCQUF3QixhQUhOO0FBSWxCQyw4QkFBd0IsY0FKTjtBQUtsQkMsd0NBQXdCO0FBTE4sYUFwQm5COztBQTRCSDs7O0FBR0FDLDZCQUFpQjtBQUNiQyw0QkFBaUIsSUFESjtBQUViQyxpQ0FBaUI7QUFGSixhQS9CZDs7QUFvQ0g7Ozs7QUFJQUMsNEJBQWdCO0FBQ1pDLHNCQUFnQixFQURKO0FBRVpDLDhCQUFnQixHQUZKO0FBR1pDLHlCQUFnQixHQUhKLEVBR1M7QUFDckJDLGdDQUFnQixHQUpKO0FBS1pDLHNCQUFnQixHQUxKLEVBS1M7QUFDckJDLHNCQUFnQixHQU5KLEVBTVM7QUFDckJDLHNCQUFnQixHQVBKO0FBUVpDLHVCQUFnQixHQVJKLEVBUVM7QUFDckJDLDBCQUFnQixHQVRKLEVBU1M7QUFDckJDLHdCQUFnQixHQVZKO0FBV1pDLHNCQUFnQixHQVhKLEVBV1M7QUFDckJDLHlCQUFnQixHQVpKLEVBWVM7QUFDckJDLHNCQUFnQixJQWJKLEVBYVU7QUFDdEJDLDBCQUFnQixHQWRKLEVBY1M7QUFDckJDLHNCQUFnQixHQWZKLEVBZVM7QUFDckJDLHdCQUFnQixHQWhCSjtBQWlCWkMsdUJBQWdCLEdBakJKLEVBaUJTO0FBQ3JCQyx5QkFBZ0IsR0FsQkosRUFrQlM7QUFDckJDLHlCQUFnQixHQW5CSixFQW1CUztBQUNyQkMscUJBQWdCLEdBcEJKLEVBb0JTO0FBQ3JCQyxxQkFBZ0IsS0FyQkosRUFxQlc7QUFDdkJDLHdCQUFnQixJQXRCSixFQXNCVTtBQUN0QkMsc0JBQWdCLEdBdkJKLEVBdUJTO0FBQ3JCQyx5QkFBZ0IsR0F4Qko7QUF5QlpDLHNCQUFnQixHQXpCSixFQXlCUztBQUNyQkMsc0JBQWdCLEdBMUJKO0FBMkJaQyxzQkFBZ0IsR0EzQko7QUE0QlpDLHVCQUFnQixHQTVCSixFQTRCUztBQUNyQkMsd0JBQWdCLEdBN0JKO0FBOEJaQyxzQkFBZ0IsR0E5QkosRUE4QlM7QUFDckJDLHlCQUFnQixHQS9CSixFQStCUztBQUNyQkMsdUJBQWdCLEdBaENKO0FBaUNaQyxzQkFBZ0IsSUFqQ0osRUFpQ1U7QUFDdEJDLHNCQUFnQixHQWxDSixFQWtDUztBQUNyQkMsdUJBQWdCLEdBbkNKLEVBbUNTO0FBQ3JCQyx1QkFBZ0IsR0FwQ0osRUFvQ1M7QUFDckJDLDBCQUFnQixHQXJDSjtBQXNDWkMsd0JBQWdCLEdBdENKO0FBdUNaQywyQkFBZ0IsT0F2Q0o7QUF3Q1pDLHNCQUFnQixHQXhDSixFQXdDUztBQUNyQkMsdUJBQWdCLEdBekNKLEVBeUNTO0FBQ3JCQyx3QkFBZ0IsR0ExQ0osRUEwQ1M7QUFDckJDLHFCQUFnQixHQTNDSjtBQTRDWkMscUJBQWdCO0FBNUNKLGFBeENiOztBQXVGSDs7OztBQUlBQyxxQ0FBeUI7QUFDckJDLHdCQUFRLEdBRGE7QUFFckJDLHdCQUFRO0FBRmEsYUEzRnRCOztBQWdHSDs7QUFFQUMsOEJBQWtCO0FBQ2RDLHVCQUEyQixHQURiO0FBRWRDLHFCQUEyQixHQUZiO0FBR2RDLDJCQUEyQixHQUhiO0FBSWRDLHdDQUEyQixHQUpiO0FBS2RDLDJDQUEyQjtBQUxiLGFBbEdmOztBQTBHSDs7OztBQUlBQyx5Q0FBNkI7QUFDekJyRCxzQkFBTyxJQURrQjtBQUV6QmdELHVCQUFPLEdBRmtCO0FBR3pCQyxxQkFBTztBQUhrQixhQTlHMUI7O0FBb0hIOzs7QUFHQUssMkJBQWU7QUFDWHRELHNCQUFPLENBREk7QUFFWHVELHFCQUFPLENBRkk7QUFHWEMscUJBQU8sQ0FISTtBQUlYQyx1QkFBTyxDQUpJO0FBS1hDLHNCQUFPLENBTEk7QUFNWEMsc0JBQU8sQ0FOSTtBQU9YQyxxQkFBTztBQVBJLGFBdkhaOztBQWlJSDs7Ozs7QUFLQUMsbUNBQXVCO0FBQ25CQyw0QkFBWSxJQURPO0FBRW5COUQsc0JBQVksQ0FGTztBQUduQnVELHFCQUFZLENBSE87QUFJbkJDLHFCQUFZLENBSk87QUFLbkJDLHVCQUFZLENBTE87QUFNbkJDLHNCQUFZLENBTk87QUFPbkJDLHNCQUFZLENBUE87QUFRbkJDLHFCQUFZO0FBUk8sYUF0SXBCOztBQWlKSDs7Ozs7OztBQU9BRyxzQ0FBMEI7QUFDdEJELDRCQUFZLElBRFU7QUFFdEI5RCxzQkFBWSxDQUZVO0FBR3RCdUQscUJBQVksQ0FIVTtBQUl0QkMscUJBQVksQ0FKVTtBQUt0QkMsdUJBQVksQ0FMVTtBQU10QkMsc0JBQVksQ0FOVTtBQU90QkMsc0JBQVksQ0FQVTtBQVF0QkMscUJBQVk7QUFSVSxhQXhKdkI7O0FBbUtIOzs7Ozs7OztBQVFBSSx1Q0FBMkI7QUFDdkJGLDRCQUFZLElBRFc7QUFFdkI5RCxzQkFBWSxDQUZXO0FBR3ZCdUQscUJBQVksQ0FIVztBQUl2QkMscUJBQVksQ0FKVztBQUt2QkMsdUJBQVksQ0FMVztBQU12QkMsc0JBQVksQ0FOVztBQU92QkMsc0JBQVksQ0FQVztBQVF2QkMscUJBQVk7QUFSVyxhQTNLeEI7O0FBc0xIOzs7Ozs7QUFNQUssa0NBQXNCO0FBQ2xCQywrQkFBZTtBQURHLGFBNUxuQjs7QUFnTUg7Ozs7OztBQU1BQyxpQ0FBcUI7QUFDakJYLHFCQUFXLEdBRE07QUFFakJZLDJCQUFXLElBRk07QUFHakJYLHVCQUFXLEdBSE07QUFJakJDLHNCQUFXO0FBSk0sYUF0TWxCOztBQTZNSDs7O0FBR0FXLGlDQUFxQjtBQUNqQnJCLHVCQUEwQixHQURUO0FBRWpCQyxxQkFBMEIsR0FGVDtBQUdqQnFCLDZCQUEwQixHQUhUO0FBSWpCQywyQkFBMEIsUUFKVDtBQUtqQkMsb0NBQTBCLFFBTFQ7QUFNakJDLDhCQUEwQixNQU5UO0FBT2pCQyw2QkFBMEIsRUFQVDtBQVFqQkMsZ0NBUmlCO0FBU2pCQywwQ0FBMEIsR0FUVDtBQVVqQkMsMEJBQTBCO0FBVlQsYUFoTmxCOztBQTZOSDs7Ozs7OztBQU9BQyxrQ0FBc0I7QUFDbEI5RSxzQkFBWSxJQURNO0FBRWxCK0UsNEJBQVksR0FGTTtBQUdsQkMsMEJBQVksSUFITTtBQUlsQkMsNEJBQVk7QUFKTSxhQXBPbkI7O0FBMk9IOzs7Ozs7O0FBT0FDLGdDQUFvQjtBQUNoQkMsc0JBQVEsTUFEUTtBQUVoQkMsdUJBQVEsT0FGUTtBQUdoQkMsdUJBQVEsT0FIUTtBQUloQmxHLHdCQUFRLFFBSlE7QUFLaEJtRyxzQkFBUTtBQUxRLGFBbFBqQjs7QUEwUEg7Ozs7QUFJQUMsaUNBQXFCO0FBQ2pCQyxzQkFBUSxJQURTO0FBRWpCQyx3QkFBUTtBQUZTLGFBOVBsQjs7QUFtUUg7O0FBRUFDLDhCQUFrQjtBQUNkQyx3QkFBYSxJQURDLEVBQ0s7QUFDbkJDLDZCQUFhLEtBRkMsQ0FFTTtBQUZOLGFBclFmOztBQTBRSDs7O0FBR0FDLHlCQUFhO0FBQ1RDLDJCQUFXLENBREY7QUFFVEMsdUJBQVcsRUFGRjtBQUdUQyx3QkFBVyxFQUhGO0FBSVRDLHVCQUFXLEVBSkY7QUFLVEMsMkJBQVcsR0FMRjtBQU1UQyx3QkFBV0MsT0FBT0M7QUFOVCxhQTdRVjs7QUFzUkg7Ozs7Ozs7Ozs7QUFVQUMsMkJBQWU7QUFDWEMsNkJBQWdCLElBREw7QUFFWEMsZ0NBQWdCO0FBRkwsYUFoU1o7O0FBcVNIOzs7OztBQUtBQyx5QkFBYTtBQUNUQyx1QkFBTyxPQURFO0FBRVRDLHNCQUFPLE1BRkU7QUFHVEMsc0JBQU87QUFIRSxhQTFTVjs7QUFnVEg7Ozs7O0FBS0FDLDBCQUFjO0FBQ1ZDLDhCQUF3QixrQkFEZCxFQUNrQztBQUM1Q0Msd0NBQXdCLGVBRmQsRUFFK0I7QUFDekNDLDRCQUF3QixjQUhkO0FBSVYxQixzQkFBd0I7QUFKZCxhQXJUWDs7QUE0VEg7Ozs7OztBQU1BMkIsMEJBQWM7QUFDVkgsOEJBQXdCLG1CQURkLEVBQ21DO0FBQzdDQyx3Q0FBd0IsZ0JBRmQ7QUFHVkMsNEJBQXdCLGVBSGQ7QUFJVjFCLHNCQUF3QjtBQUpkLGFBbFVYOztBQXlVSDs7Ozs7Ozs7OztBQVVBNEIsZ0NBQW9CO0FBQ2hCQyw2QkFBYSxJQURHO0FBRWhCQywyQkFBYTtBQUZHLGFBblZqQjs7QUF3Vkg7Ozs7QUFJQUMsd0NBQTRCO0FBQ3hCQyw2QkFBd0IsS0FEQTtBQUV4QkMsMEJBQXdCLEtBRkE7QUFHeEJDLDBCQUF3QixLQUhBO0FBSXhCQyw2QkFBd0IsS0FKQTtBQUt4QkMsK0JBQXdCLEtBTEE7QUFNeEJDLHdDQUF3QixLQU5BO0FBT3hCQyw4QkFBd0IsS0FQQTtBQVF4QkMscUNBQXdCLEtBUkE7QUFTeEJDLGdDQUF3QixLQVRBO0FBVXhCQyw0QkFBd0IsS0FWQTtBQVd4Qi9ILHNCQUF3QixJQVhBLENBV007QUFYTixhQTVWekI7O0FBMFdIOzs7Ozs7Ozs7Ozs7QUFZQWdJLDJDQUErQjtBQUMzQm5GLHdCQUFRLEdBRG1CO0FBRTNCQyx3QkFBUSxHQUZtQjtBQUczQm1GLHNCQUFRLEdBSG1CO0FBSTNCQyx1QkFBUSxHQUptQjtBQUszQmxJLHNCQUFRO0FBTG1CLGFBdFg1Qjs7QUE4WEg7Ozs7O0FBS0FtSSw4QkFBa0I7QUFDZEMsMEJBQVcsSUFERztBQUVkQywyQkFBVztBQUZHLGFBbllmOztBQXdZSDs7Ozs7Ozs7Ozs7Ozs7QUFjQUMsNEJBQWdCO0FBQ1pDLHVCQUFVLE9BREU7QUFFWjlDLHdCQUFVLFFBRkU7QUFHWitDLHVCQUFVLE9BSEU7QUFJWkMsMEJBQVUsVUFKRTtBQUtaQyx5QkFBVTtBQUxFLGFBdFpiOztBQThaSDs7Ozs7OztBQU9BQywwQkFBYztBQUNWQyx3QkFBZSxRQURMO0FBRVZDLHdCQUFlLFFBRkw7QUFHVjVGLHFCQUFlLEdBSEw7QUFJVjZGLDZCQUFlLElBSkw7QUFLVjlGLHVCQUFlLEdBTEw7QUFNVitGLCtCQUFlLElBTkw7QUFPVkMsNkJBQWUsSUFQTDtBQVFWQywrQkFBZSxJQVJMO0FBU1ZqSixzQkFBZTtBQVRMLGFBcmFYOztBQWliSDs7Ozs7QUFLQWtKLGtDQUFzQjtBQUNsQkMseUJBQWUsU0FERztBQUVsQkMsdUJBQWUsT0FGRztBQUdsQjNELHdCQUFlLFFBSEc7QUFJbEJ2QiwrQkFBZTtBQUpHLGFBdGJuQjs7QUE2Ykg7Ozs7O0FBS0FtRiw2QkFBaUI7QUFDYnJKLHNCQUFZLElBREM7QUFFYitFLDRCQUFZLEdBRkM7QUFHYkMsMEJBQVksSUFIQztBQUliQyw0QkFBWTtBQUpDLGFBbGNkOztBQXljSDs7O0FBR0FxRSxzQkFBVTtBQUNOQSwwQkFBVyxJQURMO0FBRU5DLDJCQUFXO0FBRkwsYUE1Y1A7O0FBaWRIOzs7Ozs7Ozs7Ozs7OztBQWNBQyw0QkFBZ0I7QUFDWkMsaUNBQWlDLEdBRHJCO0FBRVpDLGtDQUFpQyxHQUZyQjtBQUdaQyxtQ0FBaUMsR0FIckI7QUFJWkMsb0NBQWlDLEdBSnJCO0FBS1pDLHlDQUFpQyxHQUxyQjtBQU1aQyxxQ0FBaUMsR0FOckI7QUFPWkMscUNBQWlDLEdBUHJCO0FBUVpDLGlEQUFpQyxHQVJyQjtBQVNaQywrQ0FBaUMsR0FUckI7QUFVWkMsNkJBQWlDLEtBVnJCO0FBV1pDLGdDQUFpQyxLQVhyQjtBQVlaQyw0QkFBaUMsS0FackI7QUFhWkMsOEJBQWlDO0FBYnJCLGFBL2RiOztBQStlSDs7O0FBR0FDLHVDQUEyQjtBQUN2QkMsc0JBQVcsSUFEWTtBQUV2QkMsMkJBQVc7QUFGWSxhQWxmeEI7O0FBdWZIOzs7QUFHQUMsOEJBQWtCO0FBQ2RDLG1DQUFtQixJQURMO0FBRWRDLDJCQUFtQjtBQUZMLGFBMWZmOztBQStmSDs7O0FBR0FDLDJCQUFlO0FBQ1hDLHdCQUFhLElBREY7QUFFWEMsNkJBQWE7QUFGRixhQWxnQlo7O0FBdWdCSDs7Ozs7Ozs7QUFRQUMsNkJBQWlCO0FBQ2JDLHNCQUFTLEdBREk7QUFFYkMseUJBQVM7QUFGSSxhQS9nQmQ7O0FBb2hCSDs7Ozs7QUFLQUMsb0NBQXdCO0FBQ3BCQyw2QkFBYSxJQURPO0FBRXBCQyx5QkFBYTtBQUZPLGFBemhCckI7O0FBOGhCSDs7OztBQUlBQyw4QkFBa0I7QUFDZEMsc0JBQU0sSUFEUTtBQUVkQyxzQkFBTTtBQUZRLGFBbGlCZjs7QUF1aUJIOzs7QUFHQUMsMEJBQWM7QUFDVkYsc0JBQU0sSUFESSxFQUNFO0FBQ1pDLHNCQUFNLEtBRkksQ0FFRztBQUZILGFBMWlCWDs7QUEraUJIOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUEyQkFFLHdCQUFZO0FBQ1J6TCxzQkFBdUIsSUFEZjtBQUVSMEwsa0NBQXVCO0FBQ25CQyw4QkFBVSxzQkFEUztBQUVuQkMsOEJBQVU7QUFGUyxpQkFGZjtBQU1SQyx1Q0FBdUI7QUFDbkJDLDRCQUFRLENBQ0osRUFBRUMsS0FBSyxDQUFQLEVBQVVDLEtBQUssRUFBZixFQUFtQkMsT0FBTyxpQkFBMUIsRUFESSxFQUVKLEVBQUVGLEtBQUssRUFBUCxFQUFXQyxLQUFLLEVBQWhCLEVBQW9CQyxPQUFPLG9CQUEzQixFQUZJLEVBR0osRUFBRUYsS0FBSyxFQUFQLEVBQVdDLEtBQUssRUFBaEIsRUFBb0JDLE9BQU8sb0JBQTNCLEVBSEksRUFJSixFQUFFRixLQUFLLEVBQVAsRUFBV0MsS0FBSyxHQUFoQixFQUFxQkMsT0FBTyxtQkFBNUIsRUFKSTtBQURXLGlCQU5mO0FBY1JDLHlCQUF1QjtBQUNuQkMsaUNBQWEsQ0FDVCxFQUFFQyxVQUFVO0FBQUEsbUNBQVlDLFdBQVcsQ0FBWCxLQUFpQixDQUE3QjtBQUFBLHlCQUFaLEVBQTRDQyxTQUFTLENBQUMsa0JBQUQsRUFBcUIsaUJBQXJCLENBQXJELEVBRFM7QUFETSxpQkFkZjtBQW1CUkMsbUNBQXVCO0FBQ25CSixpQ0FBYSxDQUNUO0FBQ0lDLGtDQUFZLDRCQUFZO0FBQ3BCLGdDQUFJQyxZQUFZLENBQUMsQ0FBYixJQUFrQkEsV0FBVyxDQUFqQyxFQUFvQztBQUNoQyx1Q0FBTyxDQUFQO0FBQ0g7QUFDRCxnQ0FBSWpHLE9BQU9pRyxRQUFQLE1BQXFCLENBQXpCLEVBQTRCO0FBQ3hCLHVDQUFPLENBQVA7QUFDSDtBQUNELGdDQUFJQSxXQUFXLENBQVgsSUFBZ0JBLFlBQVksQ0FBaEMsRUFBbUM7QUFDL0IsdUNBQU8sQ0FBUDtBQUNIOztBQUVELG1DQUFPLElBQVAsQ0FYb0IsQ0FXTjtBQUNqQix5QkFiTCxFQWFPQyxTQUFTLENBQ1IsNEJBRFEsRUFFUixrQkFGUSxFQUdSLDRCQUhRO0FBYmhCLHFCQURTO0FBRE07QUFuQmYsYUExa0JUOztBQXNuQkg7Ozs7QUFJQUUsd0JBQVk7QUFDUnhNLHNCQUFZLEVBREo7QUFFUitFLDRCQUFZLEdBRko7QUFHUkMsMEJBQVksR0FISjtBQUlSQyw0QkFBWTtBQUpKLGFBMW5CVDs7QUFpb0JIOzs7Ozs7O0FBT0E7OztBQUdBd0gsaUNBQXFCO0FBQ2pCek0sc0JBQVksSUFESztBQUVqQitFLDRCQUFZLEdBRks7QUFHakJDLDBCQUFZLEdBSEs7QUFJakJDLDRCQUFZO0FBSkssYUEzb0JsQjs7QUFrcEJIOzs7Ozs7Ozs7OztBQVdBeUgsNkJBQWlCO0FBQ2JDLDBCQUFlLElBREY7QUFFYkMsK0JBQWU7QUFGRixhQTdwQmQ7O0FBa3FCSDs7O0FBR0FDLDhCQUFrQjtBQUNkRiwwQkFBa0IsSUFESjtBQUVkRyxrQ0FBa0I7QUFGSixhQXJxQmY7O0FBMHFCSDs7Ozs7Ozs7QUFRQUMsdUJBQVc7QUFDUEMsNkJBQWE7QUFETjtBQWxyQlIsU0FBUDtBQXNyQkg7QUF4ckJ5QyxDQUE5QyxFLENBbENBIiwiZmlsZSI6IjQuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIE9wdGlvbnMgZm9yIGF1dG9OdW1lcmljLmpzXG4gKiBAYXV0aG9yIEFsZXhhbmRyZSBCb25uZWF1IDxhbGV4YW5kcmUuYm9ubmVhdUBsaW51eGZyLmV1PlxuICogQGNvcHlyaWdodCDCqSAyMDE2IEFsZXhhbmRyZSBCb25uZWF1XG4gKlxuICogVGhlIE1JVCBMaWNlbnNlIChodHRwOi8vd3d3Lm9wZW5zb3VyY2Uub3JnL2xpY2Vuc2VzL21pdC1saWNlbnNlLnBocClcbiAqXG4gKiBQZXJtaXNzaW9uIGlzIGhlcmVieSBncmFudGVkLCBmcmVlIG9mIGNoYXJnZSwgdG8gYW55IHBlcnNvblxuICogb2J0YWluaW5nIGEgY29weSBvZiB0aGlzIHNvZnR3YXJlIGFuZCBhc3NvY2lhdGVkIGRvY3VtZW50YXRpb25cbiAqIGZpbGVzICh0aGUgXCJTb2Z0d2FyZVwiKSwgdG8gZGVhbCBpbiB0aGUgU29mdHdhcmUgd2l0aG91dFxuICogcmVzdHJpY3Rpb24sIGluY2x1ZGluZyB3aXRob3V0IGxpbWl0YXRpb24gdGhlIHJpZ2h0cyB0byB1c2UsXG4gKiBjb3B5LCBtb2RpZnksIG1lcmdlLCBwdWJsaXNoLCBkaXN0cmlidXRlLCBzdWIgbGljZW5zZSwgYW5kL29yIHNlbGxcbiAqIGNvcGllcyBvZiB0aGUgU29mdHdhcmUsIGFuZCB0byBwZXJtaXQgcGVyc29ucyB0byB3aG9tIHRoZVxuICogU29mdHdhcmUgaXMgZnVybmlzaGVkIHRvIGRvIHNvLCBzdWJqZWN0IHRvIHRoZSBmb2xsb3dpbmdcbiAqIGNvbmRpdGlvbnM6XG4gKlxuICogVGhlIGFib3ZlIGNvcHlyaWdodCBub3RpY2UgYW5kIHRoaXMgcGVybWlzc2lvbiBub3RpY2Ugc2hhbGwgYmVcbiAqIGluY2x1ZGVkIGluIGFsbCBjb3BpZXMgb3Igc3Vic3RhbnRpYWwgcG9ydGlvbnMgb2YgdGhlIFNvZnR3YXJlLlxuICpcbiAqIFRIRSBTT0ZUV0FSRSBJUyBQUk9WSURFRCBcIkFTIElTXCIsIFdJVEhPVVQgV0FSUkFOVFkgT0YgQU5ZIEtJTkQsXG4gKiBFWFBSRVNTIE9SIElNUExJRUQsIElOQ0xVRElORyBCVVQgTk9UIExJTUlURUQgVE8gVEhFIFdBUlJBTlRJRVNcbiAqIE9GIE1FUkNIQU5UQUJJTElUWSwgRklUTkVTUyBGT1IgQSBQQVJUSUNVTEFSIFBVUlBPU0UgQU5EXG4gKiBOT05JTkZSSU5HRU1FTlQuIElOIE5PIEVWRU5UIFNIQUxMIFRIRSBBVVRIT1JTIE9SIENPUFlSSUdIVFxuICogSE9MREVSUyBCRSBMSUFCTEUgRk9SIEFOWSBDTEFJTSwgREFNQUdFUyBPUiBPVEhFUiBMSUFCSUxJVFksXG4gKiBXSEVUSEVSIElOIEFOIEFDVElPTiBPRiBDT05UUkFDVCwgVE9SVCBPUiBPVEhFUldJU0UsIEFSSVNJTkdcbiAqIEZST00sIE9VVCBPRiBPUiBJTiBDT05ORUNUSU9OIFdJVEggVEhFIFNPRlRXQVJFIE9SIFRIRSBVU0UgT1JcbiAqIE9USEVSIERFQUxJTkdTIElOIFRIRSBTT0ZUV0FSRS5cbiAqL1xuXG5pbXBvcnQgQXV0b051bWVyaWMgZnJvbSAnLi9BdXRvTnVtZXJpYyc7XG5cbi8qKlxuICogT3B0aW9ucyB2YWx1ZXMgZW51bWVyYXRpb25cbiAqL1xuT2JqZWN0LmRlZmluZVByb3BlcnR5KEF1dG9OdW1lcmljLCAnb3B0aW9ucycsIHtcbiAgICBnZXQoKSB7XG4gICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICAvKiBEZWZpbmVzIGlmIHRoZSBkZWNpbWFsIHBsYWNlcyBzaG91bGQgYmUgcGFkZGVkIHdpdGggemVyb2VzXG4gICAgICAgICAgICAgKiBgdHJ1ZWAgICAgIDogYWx3YXlzIHBhZCBkZWNpbWFscyB3aXRoIHplcm9zIChpZS4gJzEyLjM0MDAnKVxuICAgICAgICAgICAgICogYGZhbHNlYCAgICA6IG5ldmVyIHBhZCB3aXRoIHplcm9zIChpZS4gJzEyLjM0JylcbiAgICAgICAgICAgICAqIGAnZmxvYXRzJ2AgOiBwYWQgd2l0aCB6ZXJvZXMgb25seSB3aGVuIHRoZXJlIGFyZSBkZWNpbWFscyAoaWUuICcxMicgYW5kICcxMi4zNDAwJylcbiAgICAgICAgICAgICAqIE5vdGU6IHNldHRpbmcgYWxsb3dEZWNpbWFsUGFkZGluZyB0byAnZmFsc2UnIHdpbGwgb3ZlcnJpZGUgdGhlICdkZWNpbWFsUGxhY2VzJyBzZXR0aW5nLlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBhbGxvd0RlY2ltYWxQYWRkaW5nOiB7XG4gICAgICAgICAgICAgICAgYWx3YXlzOiB0cnVlLFxuICAgICAgICAgICAgICAgIG5ldmVyIDogZmFsc2UsXG4gICAgICAgICAgICAgICAgZmxvYXRzOiAnZmxvYXRzJyxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIERlZmluZXMgd2hlcmUgc2hvdWxkIGJlIHBvc2l0aW9uZWQgdGhlIGNhcmV0IG9uIGZvY3VzXG4gICAgICAgICAgICAgKiBudWxsIDogRG8gbm90IGVuZm9yY2UgYW55IGNhcmV0IHBvc2l0aW9uaW5nIG9uIGZvY3VzICh0aGlzIGlzIG5lZWRlZCB3aGVuIHVzaW5nIGBzZWxlY3RPbkZvY3VzYClcbiAgICAgICAgICAgICAqIGAnc3RhcnQnYCA6IHB1dCB0aGUgY2FyZXQgb2YgdGhlIGZhciBsZWZ0IHNpZGUgb2YgdGhlIHZhbHVlIChleGNsdWRpbmcgdGhlIHBvc2l0aXZlL25lZ2F0aXZlIHNpZ24gYW5kIGN1cnJlbmN5IHN5bWJvbCwgaWYgYW55KVxuICAgICAgICAgICAgICogYCdlbmQnYCA6IHB1dCB0aGUgY2FyZXQgb2YgdGhlIGZhciByaWdodCBzaWRlIG9mIHRoZSB2YWx1ZSAoZXhjbHVkaW5nIHRoZSBwb3NpdGl2ZS9uZWdhdGl2ZSBzaWduIGFuZCBjdXJyZW5jeSBzeW1ib2wsIGlmIGFueSlcbiAgICAgICAgICAgICAqIGAnZGVjaW1hbExlZnQnYCA6IHB1dCB0aGUgY2FyZXQgb2YgdGhlIGxlZnQgb2YgdGhlIGRlY2ltYWwgY2hhcmFjdGVyIGlmIGFueVxuICAgICAgICAgICAgICogYCdkZWNpbWFsUmlnaHQnYCA6IHB1dCB0aGUgY2FyZXQgb2YgdGhlIHJpZ2h0IG9mIHRoZSBkZWNpbWFsIGNoYXJhY3RlciBpZiBhbnlcbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgY2FyZXRQb3NpdGlvbk9uRm9jdXM6IHtcbiAgICAgICAgICAgICAgICBzdGFydCAgICAgICAgICAgICAgICAgOiAnc3RhcnQnLFxuICAgICAgICAgICAgICAgIGVuZCAgICAgICAgICAgICAgICAgICA6ICdlbmQnLFxuICAgICAgICAgICAgICAgIGRlY2ltYWxMZWZ0ICAgICAgICAgICA6ICdkZWNpbWFsTGVmdCcsXG4gICAgICAgICAgICAgICAgZGVjaW1hbFJpZ2h0ICAgICAgICAgIDogJ2RlY2ltYWxSaWdodCcsXG4gICAgICAgICAgICAgICAgZG9Ob0ZvcmNlQ2FyZXRQb3NpdGlvbjogbnVsbCxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIERlZmluZXMgaWYgYSBsb2NhbCBsaXN0IG9mIEF1dG9OdW1lcmljIG9iamVjdHMgc2hvdWxkIGJlIGtlcHQgd2hlbiBpbml0aWFsaXppbmcgdGhpcyBvYmplY3QuXG4gICAgICAgICAgICAgKiBUaGlzIGxpc3QgaXMgdXNlZCBieSB0aGUgYGdsb2JhbC4qYCBmdW5jdGlvbnMuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIGNyZWF0ZUxvY2FsTGlzdDoge1xuICAgICAgICAgICAgICAgIGNyZWF0ZUxpc3QgICAgIDogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkb05vdENyZWF0ZUxpc3Q6IGZhbHNlLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGVmaW5lcyB0aGUgY3VycmVuY3kgc3ltYm9sIHN0cmluZy5cbiAgICAgICAgICAgICAqIEl0IGNhbiBiZSBhIHN0cmluZyBvZiBtb3JlIHRoYW4gb25lIGNoYXJhY3RlciAoYWxsb3dpbmcgZm9yIGluc3RhbmNlIHRvIHVzZSBhIHNwYWNlIG9uIGVpdGhlciBzaWRlIG9mIGl0LCBleGFtcGxlOiAnJCAnIG9yICcgJCcpXG4gICAgICAgICAgICAgKiBjZi4gaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ3VycmVuY3lfc3ltYm9sXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIGN1cnJlbmN5U3ltYm9sOiB7XG4gICAgICAgICAgICAgICAgbm9uZSAgICAgICAgICA6ICcnLFxuICAgICAgICAgICAgICAgIGN1cnJlbmN5U2lnbiAgOiAnwqQnLFxuICAgICAgICAgICAgICAgIGF1c3RyYWwgICAgICAgOiAn4oKzJywgLy8gQVJBXG4gICAgICAgICAgICAgICAgYXVzdHJhbENlbnRhdm86ICfCoicsXG4gICAgICAgICAgICAgICAgYmFodCAgICAgICAgICA6ICfguL8nLCAvLyBUSEJcbiAgICAgICAgICAgICAgICBjZWRpICAgICAgICAgIDogJ+KCtScsIC8vIEdIU1xuICAgICAgICAgICAgICAgIGNlbnQgICAgICAgICAgOiAnwqInLFxuICAgICAgICAgICAgICAgIGNvbG9uICAgICAgICAgOiAn4oKhJywgLy8gQ1JDXG4gICAgICAgICAgICAgICAgY3J1emVpcm8gICAgICA6ICfigqInLCAvLyBCUkIgLSBOb3QgdXNlZCBhbnltb3JlIHNpbmNlIDE5OTNcbiAgICAgICAgICAgICAgICBkb2xsYXIgICAgICAgIDogJyQnLFxuICAgICAgICAgICAgICAgIGRvbmcgICAgICAgICAgOiAn4oKrJywgLy8gVk5EXG4gICAgICAgICAgICAgICAgZHJhY2htYSAgICAgICA6ICfigq8nLCAvLyBHUkQgKG9yICfOlM+Bz4cuJyBvciAnzpTPgS4nKVxuICAgICAgICAgICAgICAgIGRyYW0gICAgICAgICAgOiAn4oCL1o8nLCAvLyBBTURcbiAgICAgICAgICAgICAgICBldXJvcGVhbiAgICAgIDogJ+KCoCcsIC8vIFhFVSAob2xkIGN1cnJlbmN5IGJlZm9yZSB0aGUgRXVybylcbiAgICAgICAgICAgICAgICBldXJvICAgICAgICAgIDogJ+KCrCcsIC8vIEVVUlxuICAgICAgICAgICAgICAgIGZsb3JpbiAgICAgICAgOiAnxpInLFxuICAgICAgICAgICAgICAgIGZyYW5jICAgICAgICAgOiAn4oKjJywgLy8gRlJGXG4gICAgICAgICAgICAgICAgZ3VhcmFuaSAgICAgICA6ICfigrInLCAvLyBQWUdcbiAgICAgICAgICAgICAgICBocnl2bmlhICAgICAgIDogJ+KCtCcsIC8vINCz0YDQvVxuICAgICAgICAgICAgICAgIGtpcCAgICAgICAgICAgOiAn4oKtJywgLy8gTEFLXG4gICAgICAgICAgICAgICAgYXR0ICAgICAgICAgICA6ICfguq3gurHgupQnLCAvLyBjZW50cyBvZiB0aGUgS2lwXG4gICAgICAgICAgICAgICAgbGVwdG9uICAgICAgICA6ICfOmy4nLCAvLyBjZW50cyBvZiB0aGUgRHJhY2htYVxuICAgICAgICAgICAgICAgIGxpcmEgICAgICAgICAgOiAn4oK6JywgLy8gVFJZXG4gICAgICAgICAgICAgICAgbGlyYU9sZCAgICAgICA6ICfigqQnLFxuICAgICAgICAgICAgICAgIGxhcmkgICAgICAgICAgOiAn4oK+JywgLy8gR0VMXG4gICAgICAgICAgICAgICAgbWFyayAgICAgICAgICA6ICfihLMnLFxuICAgICAgICAgICAgICAgIG1pbGwgICAgICAgICAgOiAn4oKlJyxcbiAgICAgICAgICAgICAgICBuYWlyYSAgICAgICAgIDogJ+KCpicsIC8vIE5HTlxuICAgICAgICAgICAgICAgIHBlc2V0YSAgICAgICAgOiAn4oKnJyxcbiAgICAgICAgICAgICAgICBwZXNvICAgICAgICAgIDogJ+KCsScsIC8vIFBIUFxuICAgICAgICAgICAgICAgIHBmZW5uaWcgICAgICAgOiAn4oKwJywgLy8gY2VudHMgb2YgdGhlIE1hcmtcbiAgICAgICAgICAgICAgICBwb3VuZCAgICAgICAgIDogJ8KjJyxcbiAgICAgICAgICAgICAgICByZWFsICAgICAgICAgIDogJ1IkJywgLy8gQnJhemlsaWFuIHJlYWxcbiAgICAgICAgICAgICAgICByaWVsICAgICAgICAgIDogJ+GfmycsIC8vIEtIUlxuICAgICAgICAgICAgICAgIHJ1YmxlICAgICAgICAgOiAn4oK9JywgLy8gUlVCXG4gICAgICAgICAgICAgICAgcnVwZWUgICAgICAgICA6ICfigrknLCAvLyBJTlJcbiAgICAgICAgICAgICAgICBydXBlZU9sZCAgICAgIDogJ+KCqCcsXG4gICAgICAgICAgICAgICAgc2hla2VsICAgICAgICA6ICfigqonLFxuICAgICAgICAgICAgICAgIHNoZWtlbEFsdCAgICAgOiAn16nXtNeX4oCO4oCOJyxcbiAgICAgICAgICAgICAgICB0YWthICAgICAgICAgIDogJ+CnsycsIC8vIEJEVFxuICAgICAgICAgICAgICAgIHRlbmdlICAgICAgICAgOiAn4oK4JywgLy8gS1pUXG4gICAgICAgICAgICAgICAgdG9ncm9nICAgICAgICA6ICfigq4nLCAvLyBNTlRcbiAgICAgICAgICAgICAgICB3b24gICAgICAgICAgIDogJ+KCqScsXG4gICAgICAgICAgICAgICAgeWVuICAgICAgICAgICA6ICfCpScsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBEZWZpbmVzIHdoZXJlIHRoZSBjdXJyZW5jeSBzeW1ib2wgc2hvdWxkIGJlIHBsYWNlZCAoYmVmb3JlIG9mIGFmdGVyIHRoZSBudW1iZXJzKVxuICAgICAgICAgICAgICogZm9yIHByZWZpeCBjdXJyZW5jeVN5bWJvbFBsYWNlbWVudDogXCJwXCIgKGRlZmF1bHQpXG4gICAgICAgICAgICAgKiBmb3Igc3VmZml4IGN1cnJlbmN5U3ltYm9sUGxhY2VtZW50OiBcInNcIlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBjdXJyZW5jeVN5bWJvbFBsYWNlbWVudDoge1xuICAgICAgICAgICAgICAgIHByZWZpeDogJ3AnLFxuICAgICAgICAgICAgICAgIHN1ZmZpeDogJ3MnLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGVmaW5lcyB3aGF0IGRlY2ltYWwgc2VwYXJhdG9yIGNoYXJhY3RlciBpcyB1c2VkXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIGRlY2ltYWxDaGFyYWN0ZXI6IHtcbiAgICAgICAgICAgICAgICBjb21tYSAgICAgICAgICAgICAgICAgICAgOiAnLCcsXG4gICAgICAgICAgICAgICAgZG90ICAgICAgICAgICAgICAgICAgICAgIDogJy4nLFxuICAgICAgICAgICAgICAgIG1pZGRsZURvdCAgICAgICAgICAgICAgICA6ICfCtycsXG4gICAgICAgICAgICAgICAgYXJhYmljRGVjaW1hbFNlcGFyYXRvciAgIDogJ9mrJyxcbiAgICAgICAgICAgICAgICBkZWNpbWFsU2VwYXJhdG9yS2V5U3ltYm9sOiAn4o6WJyxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIEFsbG93IHRvIGRlY2xhcmUgYW4gYWx0ZXJuYXRpdmUgZGVjaW1hbCBzZXBhcmF0b3Igd2hpY2ggaXMgYXV0b21hdGljYWxseSByZXBsYWNlZCBieSBgZGVjaW1hbENoYXJhY3RlcmAgd2hlbiB0eXBlZC5cbiAgICAgICAgICAgICAqIFRoaXMgaXMgdXNlZCBieSBjb3VudHJpZXMgdGhhdCB1c2UgYSBjb21tYSBcIixcIiBhcyB0aGUgZGVjaW1hbCBjaGFyYWN0ZXIgYW5kIGhhdmUga2V5Ym9hcmRzXFxudW1lcmljIHBhZHMgdGhhdCBoYXZlXG4gICAgICAgICAgICAgKiBhIHBlcmlvZCAnZnVsbCBzdG9wJyBhcyB0aGUgZGVjaW1hbCBjaGFyYWN0ZXIgKEZyYW5jZSBvciBTcGFpbiBmb3IgaW5zdGFuY2UpLlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBkZWNpbWFsQ2hhcmFjdGVyQWx0ZXJuYXRpdmU6IHtcbiAgICAgICAgICAgICAgICBub25lIDogbnVsbCxcbiAgICAgICAgICAgICAgICBjb21tYTogJywnLFxuICAgICAgICAgICAgICAgIGRvdCAgOiAnLicsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBEZWZpbmVzIHRoZSBkZWZhdWx0IG51bWJlciBvZiBkZWNpbWFsIHBsYWNlcyB0byBzaG93IG9uIHRoZSBmb3JtYXR0ZWQgdmFsdWUsIGFuZCBrZWVwIGZvciB0aGUgcHJlY2lzaW9uLlxuICAgICAgICAgICAgICogSW5jaWRlbnRhbGx5LCBzaW5jZSB3ZSBuZWVkIHRvIGJlIGFibGUgdG8gc2hvdyB0aGF0IG1hbnkgZGVjaW1hbCBwbGFjZXMsIHRoaXMgYWxzbyBkZWZpbmVzIHRoZSByYXcgdmFsdWUgcHJlY2lzaW9uIGJ5IGRlZmF1bHQuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIGRlY2ltYWxQbGFjZXM6IHtcbiAgICAgICAgICAgICAgICBub25lIDogMCxcbiAgICAgICAgICAgICAgICBvbmUgIDogMSxcbiAgICAgICAgICAgICAgICB0d28gIDogMixcbiAgICAgICAgICAgICAgICB0aHJlZTogMyxcbiAgICAgICAgICAgICAgICBmb3VyIDogNCxcbiAgICAgICAgICAgICAgICBmaXZlIDogNSxcbiAgICAgICAgICAgICAgICBzaXggIDogNixcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIERlZmluZXMgaG93IG1hbnkgZGVjaW1hbCBwbGFjZXMgc2hvdWxkIGJlIGtlcHQgZm9yIHRoZSByYXcgdmFsdWUgKGllLiBUaGlzIGlzIHRoZSBwcmVjaXNpb24gZm9yIGZsb2F0IHZhbHVlcykuXG4gICAgICAgICAgICAgKlxuICAgICAgICAgICAgICogSWYgdGhpcyBvcHRpb24gaXMgc2V0IHRvIGBudWxsYCAod2hpY2ggaXMgdGhlIGRlZmF1bHQpLCB0aGVuIHRoZSB2YWx1ZSBvZiBgZGVjaW1hbFBsYWNlc2AgaXMgdXNlZCBmb3IgYGRlY2ltYWxQbGFjZXNSYXdWYWx1ZWAgYXMgd2VsbC5cbiAgICAgICAgICAgICAqIE5vdGU6IFNldHRpbmcgdGhpcyB0byBhIGxvd2VyIG51bWJlciBvZiBkZWNpbWFsIHBsYWNlcyB0aGFuIHRoZSBvbmUgdG8gYmUgc2hvd24gd2lsbCBsZWFkIHRvIGNvbmZ1c2lvbiBmb3IgdGhlIHVzZXJzLlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBkZWNpbWFsUGxhY2VzUmF3VmFsdWU6IHtcbiAgICAgICAgICAgICAgICB1c2VEZWZhdWx0OiBudWxsLFxuICAgICAgICAgICAgICAgIG5vbmUgICAgICA6IDAsXG4gICAgICAgICAgICAgICAgb25lICAgICAgIDogMSxcbiAgICAgICAgICAgICAgICB0d28gICAgICAgOiAyLFxuICAgICAgICAgICAgICAgIHRocmVlICAgICA6IDMsXG4gICAgICAgICAgICAgICAgZm91ciAgICAgIDogNCxcbiAgICAgICAgICAgICAgICBmaXZlICAgICAgOiA1LFxuICAgICAgICAgICAgICAgIHNpeCAgICAgICA6IDYsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBEZWZpbmVzIGhvdyBtYW55IGRlY2ltYWwgcGxhY2VzIHNob3VsZCBiZSB2aXNpYmxlIHdoZW4gdGhlIGVsZW1lbnQgaXMgdW5mb2N1c2VkLlxuICAgICAgICAgICAgICogSWYgdGhpcyBpcyBzZXQgdG8gYG51bGxgLCB0aGVuIHRoaXMgb3B0aW9uIGlzIGlnbm9yZWQsIGFuZCB0aGUgYGRlY2ltYWxQbGFjZXNgIG9wdGlvbiB2YWx1ZSB3aWxsIGJlIHVzZWQgaW5zdGVhZC5cbiAgICAgICAgICAgICAqIFRoaXMgbWVhbnMgdGhpcyBpcyBvcHRpb25hbCA7IGlmIG9taXR0ZWQgdGhlIGRlY2ltYWwgcGxhY2VzIHdpbGwgYmUgdGhlIHNhbWUgd2hlbiB0aGUgaW5wdXQgaGFzIHRoZSBmb2N1cy5cbiAgICAgICAgICAgICAqXG4gICAgICAgICAgICAgKiBUaGlzIG9wdGlvbiBjYW4gYmUgdXNlZCBpbiBjb25qb25jdGlvbiB3aXRoIHRoZSB0d28gb3RoZXIgYHNjYWxlKmAgb3B0aW9ucywgd2hpY2ggYWxsb3dzIHRvIGRpc3BsYXkgYSBkaWZmZXJlbnQgZm9ybWF0dGVkIHZhbHVlIHdoZW4gdGhlIGVsZW1lbnQgaXMgdW5mb2N1c2VkLCB3aGlsZSBhbm90aGVyIGZvcm1hdHRlZCB2YWx1ZSBpcyBzaG93biB3aGVuIGZvY3VzZWQuXG4gICAgICAgICAgICAgKiBGb3IgdGhvc2UgYHNjYWxlKmAgb3B0aW9uIHRvIGhhdmUgYW55IGVmZmVjdCwgYGRpdmlzb3JXaGVuVW5mb2N1c2VkYCBtdXN0IG5vdCBiZSBgbnVsbGAuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIGRlY2ltYWxQbGFjZXNTaG93bk9uQmx1cjoge1xuICAgICAgICAgICAgICAgIHVzZURlZmF1bHQ6IG51bGwsXG4gICAgICAgICAgICAgICAgbm9uZSAgICAgIDogMCxcbiAgICAgICAgICAgICAgICBvbmUgICAgICAgOiAxLFxuICAgICAgICAgICAgICAgIHR3byAgICAgICA6IDIsXG4gICAgICAgICAgICAgICAgdGhyZWUgICAgIDogMyxcbiAgICAgICAgICAgICAgICBmb3VyICAgICAgOiA0LFxuICAgICAgICAgICAgICAgIGZpdmUgICAgICA6IDUsXG4gICAgICAgICAgICAgICAgc2l4ICAgICAgIDogNixcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIERlZmluZXMgaG93IG1hbnkgZGVjaW1hbCBwbGFjZXMgc2hvdWxkIGJlIHZpc2libGUgd2hlbiB0aGUgZWxlbWVudCBoYXMgdGhlIGZvY3VzLlxuICAgICAgICAgICAgICogSWYgdGhpcyBpcyBzZXQgdG8gYG51bGxgLCB0aGVuIHRoaXMgb3B0aW9uIGlzIGlnbm9yZWQsIGFuZCB0aGUgYGRlY2ltYWxQbGFjZXNgIG9wdGlvbiB2YWx1ZSB3aWxsIGJlIHVzZWQgaW5zdGVhZC5cbiAgICAgICAgICAgICAqXG4gICAgICAgICAgICAgKiBFeGFtcGxlOlxuICAgICAgICAgICAgICogRm9uIGluc3RhbmNlIGlmIGBkZWNpbWFsUGxhY2VzU2hvd25PbkZvY3VzYCBpcyBzZXQgdG8gYDVgIGFuZCB0aGUgZGVmYXVsdCBudW1iZXIgb2YgZGVjaW1hbCBwbGFjZXMgaXMgYDJgLCB0aGVuIG9uIGZvY3VzIGAxLDAwMC4xMjM0NWAgd2lsbCBiZSBzaG93biwgd2hpbGUgd2l0aG91dCBmb2N1cyBgMSwwMDAuMTJgIHdpbGwgYmUgc2V0IGJhY2suXG4gICAgICAgICAgICAgKiBOb3RlIDE6IHRoZSByZXN1bHRzIGRlcGVuZHMgb24gdGhlIHJvdW5kaW5nIG1ldGhvZCB1c2VkLlxuICAgICAgICAgICAgICogTm90ZSAyOiB0aGUgYGdldE51bWVyaWNTdHJpbmcoKWAgbWV0aG9kIHJldHVybnMgdGhlIGV4dGVuZGVkIGRlY2ltYWwgcGxhY2VzXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIGRlY2ltYWxQbGFjZXNTaG93bk9uRm9jdXM6IHtcbiAgICAgICAgICAgICAgICB1c2VEZWZhdWx0OiBudWxsLFxuICAgICAgICAgICAgICAgIG5vbmUgICAgICA6IDAsXG4gICAgICAgICAgICAgICAgb25lICAgICAgIDogMSxcbiAgICAgICAgICAgICAgICB0d28gICAgICAgOiAyLFxuICAgICAgICAgICAgICAgIHRocmVlICAgICA6IDMsXG4gICAgICAgICAgICAgICAgZm91ciAgICAgIDogNCxcbiAgICAgICAgICAgICAgICBmaXZlICAgICAgOiA1LFxuICAgICAgICAgICAgICAgIHNpeCAgICAgICA6IDYsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBIZWxwZXIgb3B0aW9uIGZvciBBU1AuTkVUIHBvc3RiYWNrXG4gICAgICAgICAgICAgKiBUaGlzIHNob3VsZCBiZSBzZXQgYXMgdGhlIHZhbHVlIG9mIHRoZSB1bmZvcm1hdHRlZCBkZWZhdWx0IHZhbHVlXG4gICAgICAgICAgICAgKiBleGFtcGxlczpcbiAgICAgICAgICAgICAqIG5vIGRlZmF1bHQgdmFsdWU9XCJcIiB7ZGVmYXVsdFZhbHVlT3ZlcnJpZGU6IFwiXCJ9XG4gICAgICAgICAgICAgKiB2YWx1ZT0xMjM0LjU2IHtkZWZhdWx0VmFsdWVPdmVycmlkZTogJzEyMzQuNTYnfVxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBkZWZhdWx0VmFsdWVPdmVycmlkZToge1xuICAgICAgICAgICAgICAgIGRvTm90T3ZlcnJpZGU6IG51bGwsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBEZWZpbmVzIGhvdyBtYW55IG51bWJlcnMgc2hvdWxkIGJlIGdyb3VwZWQgdG9nZXRoZXIgKHVzdWFsbHkgZm9yIHRoZSB0aG91c2FuZCBzZXBhcmF0b3IpXG4gICAgICAgICAgICAgKiAtIFwiMlwiLCAgcmVzdWx0cyBpbiA5OSw5OSw5OSw5OTkgSW5kaWEncyBsYWtoc1xuICAgICAgICAgICAgICogLSBcIjJzXCIsIHJlc3VsdHMgaW4gOTksOTk5LDk5LDk5LDk5OSBJbmRpYSdzIGxha2hzIHNjYWxlZFxuICAgICAgICAgICAgICogLSBcIjNcIiwgIHJlc3VsdHMgaW4gOTk5LDk5OSw5OTkgKGRlZmF1bHQpXG4gICAgICAgICAgICAgKiAtIFwiNFwiLCAgcmVzdWx0cyBpbiA5OTk5LDk5OTksOTk5OSB1c2VkIGluIHNvbWUgQXNpYW4gY291bnRyaWVzXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIGRpZ2l0YWxHcm91cFNwYWNpbmc6IHtcbiAgICAgICAgICAgICAgICB0d28gICAgICA6ICcyJyxcbiAgICAgICAgICAgICAgICB0d29TY2FsZWQ6ICcycycsXG4gICAgICAgICAgICAgICAgdGhyZWUgICAgOiAnMycsXG4gICAgICAgICAgICAgICAgZm91ciAgICAgOiAnNCcsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBEZWZpbmVzIHRoZSB0aG91c2FuZCBncm91cGluZyBzZXBhcmF0b3IgY2hhcmFjdGVyXG4gICAgICAgICAgICAgKiBFeGFtcGxlIDogSWYgYCcuJ2AgaXMgc2V0LCB0aGVuIHlvdSdsbCBnZXQgYCcxLjIzNC41NjcnYFxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBkaWdpdEdyb3VwU2VwYXJhdG9yOiB7XG4gICAgICAgICAgICAgICAgY29tbWEgICAgICAgICAgICAgICAgICAgOiAnLCcsXG4gICAgICAgICAgICAgICAgZG90ICAgICAgICAgICAgICAgICAgICAgOiAnLicsXG4gICAgICAgICAgICAgICAgbm9ybWFsU3BhY2UgICAgICAgICAgICAgOiAnICcsXG4gICAgICAgICAgICAgICAgdGhpblNwYWNlICAgICAgICAgICAgICAgOiAnXFx1MjAwOScsXG4gICAgICAgICAgICAgICAgbmFycm93Tm9CcmVha1NwYWNlICAgICAgOiAnXFx1MjAyZicsXG4gICAgICAgICAgICAgICAgbm9CcmVha1NwYWNlICAgICAgICAgICAgOiAnXFx1MDBhMCcsXG4gICAgICAgICAgICAgICAgbm9TZXBhcmF0b3IgICAgICAgICAgICAgOiAnJyxcbiAgICAgICAgICAgICAgICBhcG9zdHJvcGhlICAgICAgICAgICAgICA6IGAnYCxcbiAgICAgICAgICAgICAgICBhcmFiaWNUaG91c2FuZHNTZXBhcmF0b3I6ICfZrCcsXG4gICAgICAgICAgICAgICAgZG90QWJvdmUgICAgICAgICAgICAgICAgOiAny5knLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogVGhlIGBkaXZpc29yV2hlblVuZm9jdXNlZGAgZGl2aWRlIHRoZSBlbGVtZW50IHZhbHVlIG9uIGZvY3VzLlxuICAgICAgICAgICAgICogT24gYmx1ciwgdGhlIGVsZW1lbnQgdmFsdWUgaXMgbXVsdGlwbGllZCBiYWNrLlxuICAgICAgICAgICAgICpcbiAgICAgICAgICAgICAqIEV4YW1wbGUgOiBHaXZlbiB0aGUgb3B0aW9uIHsgZGl2aXNvcldoZW5VbmZvY3VzZWQ6IDEwMDAgfSAob3IgZGlyZWN0bHkgaW4gdGhlIGh0bWwgYDxpbnB1dCBkYXRhLWRpdmlzb3Itd2hlbi11bmZvY3VzZWQ9XCIxMDAwXCI+YClcbiAgICAgICAgICAgICAqIFRoZSBkaXZpc29yIHZhbHVlIGRvZXMgbm90IG5lZWQgdG8gYmUgYW4gaW50ZWdlciwgYnV0IHBsZWFzZSB1bmRlcnN0YW5kIHRoYXQgSmF2YXNjcmlwdCBoYXMgbGltaXRlZCBhY2N1cmFjeSBpbiBtYXRoIDsgdXNlIHdpdGggY2F1dGlvbi5cbiAgICAgICAgICAgICAqIE5vdGU6IFRoZSBgZ2V0TnVtZXJpY1N0cmluZ2AgbWV0aG9kIHJldHVybnMgdGhlIGZ1bGwgdmFsdWUsIGluY2x1ZGluZyB0aGUgJ2hpZGRlbicgZGVjaW1hbHMuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIGRpdmlzb3JXaGVuVW5mb2N1c2VkOiB7XG4gICAgICAgICAgICAgICAgbm9uZSAgICAgIDogbnVsbCxcbiAgICAgICAgICAgICAgICBwZXJjZW50YWdlOiAxMDAsXG4gICAgICAgICAgICAgICAgcGVybWlsbGUgIDogMTAwMCxcbiAgICAgICAgICAgICAgICBiYXNpc1BvaW50OiAxMDAwMCxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIERlZmluZXMgd2hhdCBzaG91bGQgYmUgZGlzcGxheWVkIGluIHRoZSBlbGVtZW50IGlmIHRoZSByYXcgdmFsdWUgaXMgYW4gZW1wdHkgc3RyaW5nICgnJykuXG4gICAgICAgICAgICAgKiAtICdmb2N1cycgIDogVGhlIGN1cnJlbmN5IHNpZ24gaXMgZGlzcGxheWVkIHdoZW4gdGhlIGlucHV0IHJlY2VpdmVzIGZvY3VzIChkZWZhdWx0KVxuICAgICAgICAgICAgICogLSAncHJlc3MnICA6IFRoZSBjdXJyZW5jeSBzaWduIGlzIGRpc3BsYXllZCB3aGVuZXZlciBhIGtleSBpcyBiZWluZyBwcmVzc2VkXG4gICAgICAgICAgICAgKiAtICdhbHdheXMnIDogVGhlIGN1cnJlbmN5IHNpZ24gaXMgYWx3YXlzIGRpc3BsYXllZFxuICAgICAgICAgICAgICogLSAnemVybycgICA6IEEgemVybyBpcyBkaXNwbGF5ZWQgKCdyb3VuZGVkJyB3aXRoIG9yIHdpdGhvdXQgYSBjdXJyZW5jeSBzaWduKSBpZiB0aGUgaW5wdXQgaGFzIG5vIHZhbHVlIG9uIGZvY3VzIG91dFxuICAgICAgICAgICAgICogLSAnbnVsbCcgICA6IFdoZW4gdGhlIGVsZW1lbnQgaXMgZW1wdHksIHRoZSBgcmF3VmFsdWVgIGFuZCB0aGUgZWxlbWVudCB2YWx1ZS90ZXh0IGlzIHNldCB0byBgbnVsbGAuIFRoaXMgYWxzbyBhbGxvd3MgdG8gc2V0IHRoZSB2YWx1ZSB0byBgbnVsbGAgdXNpbmcgYGFuRWxlbWVudC5zZXQobnVsbClgLlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBlbXB0eUlucHV0QmVoYXZpb3I6IHtcbiAgICAgICAgICAgICAgICBudWxsICA6ICdudWxsJyxcbiAgICAgICAgICAgICAgICBmb2N1cyA6ICdmb2N1cycsXG4gICAgICAgICAgICAgICAgcHJlc3MgOiAncHJlc3MnLFxuICAgICAgICAgICAgICAgIGFsd2F5czogJ2Fsd2F5cycsXG4gICAgICAgICAgICAgICAgemVybyAgOiAnemVybycsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBUaGlzIG9wdGlvbiBpcyB0aGUgJ3N0cmljdCBtb2RlJyAoYWthICdkZWJ1ZycgbW9kZSksIHdoaWNoIGFsbG93cyBhdXRvTnVtZXJpYyB0byBzdHJpY3RseSBhbmFseXNlIHRoZSBvcHRpb25zIHBhc3NlZCwgYW5kIGZhaWxzIGlmIGFuIHVua25vd24gb3B0aW9ucyBpcyB1c2VkIGluIHRoZSBzZXR0aW5ncyBvYmplY3QuXG4gICAgICAgICAgICAgKiBZb3Ugc2hvdWxkIHNldCB0aGF0IHRvIGB0cnVlYCBpZiB5b3Ugd2FudCB0byBtYWtlIHN1cmUgeW91IGFyZSBvbmx5IHVzaW5nICdwdXJlJyBhdXRvTnVtZXJpYyBzZXR0aW5ncyBvYmplY3RzIGluIHlvdXIgY29kZS5cbiAgICAgICAgICAgICAqIElmIHlvdSBzZWUgdW5jYXVnaHQgZXJyb3JzIGluIHRoZSBjb25zb2xlIGFuZCB5b3VyIGNvZGUgc3RhcnRzIHRvIGZhaWwsIHRoaXMgbWVhbnMgc29tZWhvdyB0aG9zZSBvcHRpb25zIGdldHMgcG9sbHV0ZWQgYnkgYW5vdGhlciBwcm9ncmFtICh3aGljaCB1c3VhbGx5IGhhcHBlbnMgd2hlbiB1c2luZyBmcmFtZXdvcmtzKS5cbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgZmFpbE9uVW5rbm93bk9wdGlvbjoge1xuICAgICAgICAgICAgICAgIGZhaWwgIDogdHJ1ZSxcbiAgICAgICAgICAgICAgICBpZ25vcmU6IGZhbHNlLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGV0ZXJtaW5lIGlmIHRoZSBkZWZhdWx0IHZhbHVlIHdpbGwgYmUgZm9ybWF0dGVkIG9uIGluaXRpYWxpemF0aW9uLlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBmb3JtYXRPblBhZ2VMb2FkOiB7XG4gICAgICAgICAgICAgICAgZm9ybWF0ICAgICA6IHRydWUsIC8vIGF1dG9tYXRpY2FsbHkgZm9ybWF0cyB0aGUgZGVmYXVsdCB2YWx1ZSBvbiBpbml0aWFsaXphdGlvblxuICAgICAgICAgICAgICAgIGRvTm90Rm9ybWF0OiBmYWxzZSwgLy8gd2lsbCBub3QgZm9ybWF0IHRoZSBkZWZhdWx0IHZhbHVlIG9uIGluaXRpYWxpemF0aW9uXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBTZXQgdGhlIHVuZG8vcmVkbyBoaXN0b3J5IHRhYmxlIHNpemUuXG4gICAgICAgICAgICAgKiBFYWNoIHJlY29yZCBrZWVwcyB0aGUgcmF3IHZhbHVlIGFzIHdlbGwgYW5kIHRoZSBsYXN0IGtub3duIGNhcmV0L3NlbGVjdGlvbiBwb3NpdGlvbnMuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIGhpc3RvcnlTaXplOiB7XG4gICAgICAgICAgICAgICAgdmVyeVNtYWxsOiA1LFxuICAgICAgICAgICAgICAgIHNtYWxsICAgIDogMTAsXG4gICAgICAgICAgICAgICAgbWVkaXVtICAgOiAyMCxcbiAgICAgICAgICAgICAgICBsYXJnZSAgICA6IDUwLFxuICAgICAgICAgICAgICAgIHZlcnlMYXJnZTogMTAwLFxuICAgICAgICAgICAgICAgIGluc2FuZSAgIDogTnVtYmVyLk1BWF9TQUZFX0lOVEVHRVIsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBBbGxvdyB0aGUgdXNlciB0byAnY2FuY2VsJyBhbmQgdW5kbyB0aGUgY2hhbmdlcyBoZSBtYWRlIHRvIHRoZSBnaXZlbiBhdXRvbnVtZXJpYy1tYW5hZ2VkIGVsZW1lbnQsIGJ5IHByZXNzaW5nIHRoZSAnRXNjYXBlJyBrZXkuXG4gICAgICAgICAgICAgKiBXaGVuZXZlciB0aGUgdXNlciAndmFsaWRhdGUnIHRoZSBpbnB1dCAoZWl0aGVyIGJ5IGhpdHRpbmcgJ0VudGVyJywgb3IgYmx1cnJpbmcgdGhlIGVsZW1lbnQpLCB0aGUgbmV3IHZhbHVlIGlzIHNhdmVkIGZvciBzdWJzZXF1ZW50ICdjYW5jZWxsYXRpb24nLlxuICAgICAgICAgICAgICpcbiAgICAgICAgICAgICAqIFRoZSBwcm9jZXNzIDpcbiAgICAgICAgICAgICAqICAgLSBzYXZlIHRoZSBpbnB1dCB2YWx1ZSBvbiBmb2N1c1xuICAgICAgICAgICAgICogICAtIGlmIHRoZSB1c2VyIGNoYW5nZSB0aGUgaW5wdXQgdmFsdWUsIGFuZCBoaXQgYEVzY2FwZWAsIHRoZW4gdGhlIGluaXRpYWwgdmFsdWUgc2F2ZWQgb24gZm9jdXMgaXMgc2V0IGJhY2tcbiAgICAgICAgICAgICAqICAgLSBvbiB0aGUgb3RoZXIgaGFuZCBpZiB0aGUgdXNlciBlaXRoZXIgaGF2ZSB1c2VkIGBFbnRlcmAgdG8gdmFsaWRhdGUgKGBFbnRlcmAgdGhyb3dzIGEgY2hhbmdlIGV2ZW50KSBoaXMgZW50cmllcywgb3IgaWYgdGhlIGlucHV0IHZhbHVlIGhhcyBiZWVuIGNoYW5nZWQgYnkgYW5vdGhlciBzY3JpcHQgaW4gdGhlIG1lYW4gdGltZSwgdGhlbiB3ZSBzYXZlIHRoZSBuZXcgaW5wdXQgdmFsdWVcbiAgICAgICAgICAgICAqICAgLSBvbiBhIHN1Y2Nlc3NmdWwgJ2NhbmNlbCcsIHNlbGVjdCB0aGUgd2hvbGUgdmFsdWUgKHdoaWxlIHJlc3BlY3RpbmcgdGhlIGBzZWxlY3ROdW1iZXJPbmx5YCBvcHRpb24pXG4gICAgICAgICAgICAgKiAgIC0gYm9udXM7IGlmIHRoZSB2YWx1ZSBoYXMgbm90IGNoYW5nZWQsIGhpdHRpbmcgJ0VzYycganVzdCBzZWxlY3QgYWxsIHRoZSBpbnB1dCB2YWx1ZSAod2hpbGUgcmVzcGVjdGluZyB0aGUgYHNlbGVjdE51bWJlck9ubHlgIG9wdGlvbilcbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgaXNDYW5jZWxsYWJsZToge1xuICAgICAgICAgICAgICAgIGNhbmNlbGxhYmxlICAgOiB0cnVlLFxuICAgICAgICAgICAgICAgIG5vdENhbmNlbGxhYmxlOiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIENvbnRyb2xzIHRoZSBsZWFkaW5nIHplcm8gYmVoYXZpb3JcbiAgICAgICAgICAgICAqIC0gJ2FsbG93JyA6IGFsbG93cyBsZWFkaW5nIHplcm9zIHRvIGJlIGVudGVyZWQuIFplcm9zIHdpbGwgYmUgdHJ1bmNhdGVkIHdoZW4gZW50ZXJpbmcgYWRkaXRpb25hbCBkaWdpdHMuIE9uIGZvY3Vzb3V0IHplcm9zIHdpbGwgYmUgZGVsZXRlZFxuICAgICAgICAgICAgICogLSAnZGVueScgIDogYWxsb3dzIG9ubHkgb25lIGxlYWRpbmcgemVybyBvbiB2YWx1ZXMgdGhhdCBhcmUgYmV0d2VlbiAxIGFuZCAtMVxuICAgICAgICAgICAgICogLSAna2VlcCcgIDogYWxsb3dzIGxlYWRpbmcgemVyb3MgdG8gYmUgZW50ZXJlZC4gb24gZm9jdXNvdXQgemVyb3Mgd2lsbCBiZSByZXRhaW5lZFxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBsZWFkaW5nWmVybzoge1xuICAgICAgICAgICAgICAgIGFsbG93OiAnYWxsb3cnLFxuICAgICAgICAgICAgICAgIGRlbnkgOiAnZGVueScsXG4gICAgICAgICAgICAgICAga2VlcCA6ICdrZWVwJyxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIERlZmluZXMgdGhlIG1heGltdW0gcG9zc2libGUgdmFsdWUgYSB1c2VyIGNhbiBlbnRlci5cbiAgICAgICAgICAgICAqIE5vdGVzOlxuICAgICAgICAgICAgICogLSB0aGlzIHZhbHVlIG11c3QgYSBzdHJpbmcgYW5kIHVzZSB0aGUgcGVyaW9kIGZvciB0aGUgZGVjaW1hbCBwb2ludFxuICAgICAgICAgICAgICogLSB0aGlzIHZhbHVlIG5lZWRzIHRvIGJlIGxhcmdlciB0aGFuIGBtaW5pbXVtVmFsdWVgXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIG1heGltdW1WYWx1ZToge1xuICAgICAgICAgICAgICAgIHRlblRyaWxsaW9ucyAgICAgICAgICA6ICc5OTk5OTk5OTk5OTk5Ljk5JywgLy8gOS45OTkuOTk5Ljk5OS45OTksOTkgfj0gMTAwMDAgYmlsbGlvbnNcbiAgICAgICAgICAgICAgICB0ZW5UcmlsbGlvbnNOb0RlY2ltYWxzOiAnOTk5OTk5OTk5OTk5OScsIC8vRklYTUUgVXBkYXRlIGFsbCB0aG9zZSBsaW1pdHMgdG8gdGhlICdyZWFsJyBudW1iZXJzXG4gICAgICAgICAgICAgICAgb25lQmlsbGlvbiAgICAgICAgICAgIDogJzk5OTk5OTk5OS45OScsXG4gICAgICAgICAgICAgICAgemVybyAgICAgICAgICAgICAgICAgIDogJzAnLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGVmaW5lcyB0aGUgbWluaW11bSBwb3NzaWJsZSB2YWx1ZSBhIHVzZXIgY2FuIGVudGVyLlxuICAgICAgICAgICAgICogTm90ZXM6XG4gICAgICAgICAgICAgKiAtIHRoaXMgdmFsdWUgbXVzdCBhIHN0cmluZyBhbmQgdXNlIHRoZSBwZXJpb2QgZm9yIHRoZSBkZWNpbWFsIHBvaW50XG4gICAgICAgICAgICAgKiAtIHRoaXMgdmFsdWUgbmVlZHMgdG8gYmUgc21hbGxlciB0aGFuIGBtYXhpbXVtVmFsdWVgXG4gICAgICAgICAgICAgKiAtIGlmIHRoaXMgaXMgc3VwZXJpb3IgdG8gMCwgdGhlbiB5b3UnbGwgZWZmZWN0aXZlbHkgcHJldmVudCB5b3VyIHVzZXIgdG8gZW50aXJlbHkgZGVsZXRlIHRoZSBjb250ZW50IG9mIHlvdXIgZWxlbWVudFxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBtaW5pbXVtVmFsdWU6IHtcbiAgICAgICAgICAgICAgICB0ZW5UcmlsbGlvbnMgICAgICAgICAgOiAnLTk5OTk5OTk5OTk5OTkuOTknLCAvLyAtOS45OTkuOTk5Ljk5OS45OTksOTkgfj0gMTAwMDAgYmlsbGlvbnNcbiAgICAgICAgICAgICAgICB0ZW5UcmlsbGlvbnNOb0RlY2ltYWxzOiAnLTk5OTk5OTk5OTk5OTknLFxuICAgICAgICAgICAgICAgIG9uZUJpbGxpb24gICAgICAgICAgICA6ICctOTk5OTk5OTk5Ljk5JyxcbiAgICAgICAgICAgICAgICB6ZXJvICAgICAgICAgICAgICAgICAgOiAnMCcsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBBbGxvdyB0aGUgdXNlciB0byBpbmNyZW1lbnQgb3IgZGVjcmVtZW50IHRoZSBlbGVtZW50IHZhbHVlIHdpdGggdGhlIG1vdXNlIHdoZWVsLlxuICAgICAgICAgICAgICogVGhlIHdoZWVsIGJlaGF2aW9yIGNhbiBieSBtb2RpZmllZCBieSB0aGUgYHdoZWVsU3RlcGAgb3B0aW9uLlxuICAgICAgICAgICAgICogVGhpcyBgd2hlZWxTdGVwYCBvcHRpb25zIGNhbiBiZSB1c2VkIGluIHR3byB3YXlzLCBlaXRoZXIgYnkgc2V0dGluZyA6XG4gICAgICAgICAgICAgKiAtIGEgJ2ZpeGVkJyBzdGVwIHZhbHVlIChgd2hlZWxTdGVwIDogMTAwMGApLCBvclxuICAgICAgICAgICAgICogLSB0aGUgJ3Byb2dyZXNzaXZlJyBzdHJpbmcgKGB3aGVlbFN0ZXAgOiAncHJvZ3Jlc3NpdmUnYCksIHdoaWNoIHdpbGwgdGhlbiBhY3RpdmF0ZSBhIHNwZWNpYWwgbW9kZSB3aGVyZSB0aGUgc3RlcCBpcyBhdXRvbWF0aWNhbGx5IGNhbGN1bGF0ZWQgYmFzZWQgb24gdGhlIGVsZW1lbnQgdmFsdWUgc2l6ZS5cbiAgICAgICAgICAgICAqXG4gICAgICAgICAgICAgKiBOb3RlIDpcbiAgICAgICAgICAgICAqIEEgc3BlY2lhbCBiZWhhdmlvciBpcyBhcHBsaWVkIGluIG9yZGVyIHRvIGF2b2lkIHByZXZlbnRpbmcgdGhlIHVzZXIgdG8gc2Nyb2xsIHRoZSBwYWdlIGlmIHRoZSBpbnB1dHMgYXJlIGNvdmVyaW5nIHRoZSB3aG9sZSBhdmFpbGFibGUgc3BhY2UuXG4gICAgICAgICAgICAgKiBZb3UgY2FuIHVzZSB0aGUgJ1NoaWZ0JyBtb2RpZmllciBrZXkgd2hpbGUgdXNpbmcgdGhlIG1vdXNlIHdoZWVsIGluIG9yZGVyIHRvIHRlbXBvcmFyaWx5IGRpc2FibGUgdGhlIGluY3JlbWVudC9kZWNyZW1lbnQgZmVhdHVyZSAodXNlZnVsIG9uIHNtYWxsIHNjcmVlbiB3aGVyZSBzb21lIGJhZGx5IGNvbmZpZ3VyZWQgaW5wdXRzIGNvdWxkIHVzZSBhbGwgdGhlIGF2YWlsYWJsZSBzcGFjZSkuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIG1vZGlmeVZhbHVlT25XaGVlbDoge1xuICAgICAgICAgICAgICAgIG1vZGlmeVZhbHVlOiB0cnVlLFxuICAgICAgICAgICAgICAgIGRvTm90aGluZyAgOiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIEFkZHMgYnJhY2tldHMgb24gbmVnYXRpdmUgdmFsdWVzIChpZS4gdHJhbnNmb3JtcyAnLSQgOTk5Ljk5JyB0byAnKDk5OS45OSknKVxuICAgICAgICAgICAgICogVGhvc2UgYnJhY2tldHMgYXJlIHZpc2libGUgb25seSB3aGVuIHRoZSBmaWVsZCBkb2VzIE5PVCBoYXZlIHRoZSBmb2N1cy5cbiAgICAgICAgICAgICAqIFRoZSBsZWZ0IGFuZCByaWdodCBzeW1ib2xzIHNob3VsZCBiZSBlbmNsb3NlZCBpbiBxdW90ZXMgYW5kIHNlcGFyYXRlZCBieSBhIGNvbW1hLlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBuZWdhdGl2ZUJyYWNrZXRzVHlwZU9uQmx1cjoge1xuICAgICAgICAgICAgICAgIHBhcmVudGhlc2VzICAgICAgICAgICA6ICcoLCknLFxuICAgICAgICAgICAgICAgIGJyYWNrZXRzICAgICAgICAgICAgICA6ICdbLF0nLFxuICAgICAgICAgICAgICAgIGNoZXZyb25zICAgICAgICAgICAgICA6ICc8LD4nLFxuICAgICAgICAgICAgICAgIGN1cmx5QnJhY2VzICAgICAgICAgICA6ICd7LH0nLFxuICAgICAgICAgICAgICAgIGFuZ2xlQnJhY2tldHMgICAgICAgICA6ICfjgIgs44CJJyxcbiAgICAgICAgICAgICAgICBqYXBhbmVzZVF1b3RhdGlvbk1hcmtzOiAn772iLO+9oycsXG4gICAgICAgICAgICAgICAgaGFsZkJyYWNrZXRzICAgICAgICAgIDogJ+K4pCziuKUnLFxuICAgICAgICAgICAgICAgIHdoaXRlU3F1YXJlQnJhY2tldHMgICA6ICfin6Ys4p+nJyxcbiAgICAgICAgICAgICAgICBxdW90YXRpb25NYXJrcyAgICAgICAgOiAn4oC5LOKAuicsXG4gICAgICAgICAgICAgICAgZ3VpbGxlbWV0cyAgICAgICAgICAgIDogJ8KrLMK7JyxcbiAgICAgICAgICAgICAgICBub25lICAgICAgICAgICAgICAgICAgOiBudWxsLCAvLyBUaGlzIGlzIHRoZSBkZWZhdWx0IHZhbHVlLCB3aGljaCBkZWFjdGl2YXRlIHRoaXMgZmVhdHVyZVxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogUGxhY2VtZW50IG9mIHRoZSBuZWdhdGl2ZS9wb3NpdGl2ZSBzaWduIHJlbGF0aXZlIHRvIHRoZSBgY3VycmVuY3lTeW1ib2xgIG9wdGlvbi5cbiAgICAgICAgICAgICAqXG4gICAgICAgICAgICAgKiBFeGFtcGxlOlxuICAgICAgICAgICAgICogLTEsMjM0LjU2ICA9PiBkZWZhdWx0IG5vIG9wdGlvbnMgcmVxdWlyZWRcbiAgICAgICAgICAgICAqIC0kMSwyMzQuNTYgPT4ge2N1cnJlbmN5U3ltYm9sOiBcIiRcIn0gb3Ige2N1cnJlbmN5U3ltYm9sOiBcIiRcIiwgbmVnYXRpdmVQb3NpdGl2ZVNpZ25QbGFjZW1lbnQ6IFwibFwifVxuICAgICAgICAgICAgICogJC0xLDIzNC41NiA9PiB7Y3VycmVuY3lTeW1ib2w6IFwiJFwiLCBuZWdhdGl2ZVBvc2l0aXZlU2lnblBsYWNlbWVudDogXCJyXCJ9IC8vIERlZmF1bHQgaWYgbmVnYXRpdmVQb3NpdGl2ZVNpZ25QbGFjZW1lbnQgaXMgJ251bGwnIGFuZCBjdXJyZW5jeVN5bWJvbCBpcyBub3QgZW1wdHlcbiAgICAgICAgICAgICAqIC0xLDIzNC41NiQgPT4ge2N1cnJlbmN5U3ltYm9sOiBcIiRcIiwgY3VycmVuY3lTeW1ib2xQbGFjZW1lbnQ6IFwic1wiLCBuZWdhdGl2ZVBvc2l0aXZlU2lnblBsYWNlbWVudDogXCJwXCJ9IC8vIERlZmF1bHQgaWYgbmVnYXRpdmVQb3NpdGl2ZVNpZ25QbGFjZW1lbnQgaXMgJ251bGwnIGFuZCBjdXJyZW5jeVN5bWJvbCBpcyBub3QgZW1wdHlcbiAgICAgICAgICAgICAqIDEsMjM0LjU2LSAgPT4ge25lZ2F0aXZlUG9zaXRpdmVTaWduUGxhY2VtZW50OiBcInNcIn1cbiAgICAgICAgICAgICAqICQxLDIzNC41Ni0gPT4ge2N1cnJlbmN5U3ltYm9sOiBcIiRcIiwgbmVnYXRpdmVQb3NpdGl2ZVNpZ25QbGFjZW1lbnQ6IFwic1wifVxuICAgICAgICAgICAgICogMSwyMzQuNTYtJCA9PiB7Y3VycmVuY3lTeW1ib2w6IFwiJFwiLCBjdXJyZW5jeVN5bWJvbFBsYWNlbWVudDogXCJzXCJ9XG4gICAgICAgICAgICAgKiAxLDIzNC41NiQtID0+IHtjdXJyZW5jeVN5bWJvbDogXCIkXCIsIGN1cnJlbmN5U3ltYm9sUGxhY2VtZW50OiBcInNcIiwgbmVnYXRpdmVQb3NpdGl2ZVNpZ25QbGFjZW1lbnQ6IFwiclwifVxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBuZWdhdGl2ZVBvc2l0aXZlU2lnblBsYWNlbWVudDoge1xuICAgICAgICAgICAgICAgIHByZWZpeDogJ3AnLFxuICAgICAgICAgICAgICAgIHN1ZmZpeDogJ3MnLFxuICAgICAgICAgICAgICAgIGxlZnQgIDogJ2wnLFxuICAgICAgICAgICAgICAgIHJpZ2h0IDogJ3InLFxuICAgICAgICAgICAgICAgIG5vbmUgIDogbnVsbCxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIERlZmluZXMgaWYgdGhlIGVsZW1lbnQgc2hvdWxkIGhhdmUgZXZlbnQgbGlzdGVuZXJzIGFjdGl2YXRlZCBvbiBpdC5cbiAgICAgICAgICAgICAqIEJ5IGRlZmF1bHQsIHRob3NlIGV2ZW50IGxpc3RlbmVycyBhcmUgb25seSBhZGRlZCB0byA8aW5wdXQ+IGVsZW1lbnRzIGFuZCBodG1sIGVsZW1lbnQgd2l0aCB0aGUgYGNvbnRlbnRlZGl0YWJsZWAgYXR0cmlidXRlIHNldCB0byBgdHJ1ZWAsIGJ1dCBub3Qgb24gdGhlIG90aGVyIGh0bWwgdGFncy5cbiAgICAgICAgICAgICAqIFRoaXMgYWxsb3dzIHRvIGluaXRpYWxpemUgZWxlbWVudHMgd2l0aG91dCBhbnkgZXZlbnQgbGlzdGVuZXJzLlxuICAgICAgICAgICAgICogV2FybmluZzogU2luY2UgQXV0b051bWVyaWMgd2lsbCBub3QgY2hlY2sgdGhlIGlucHV0IGNvbnRlbnQgYWZ0ZXIgaXRzIGluaXRpYWxpemF0aW9uLCB1c2luZyBzb21lIGF1dG9OdW1lcmljIG1ldGhvZHMgYWZ0ZXJ3YXJkcyAqd2lsbCogcHJvYmFibHkgbGVhZHMgdG8gZm9ybWF0dGluZyBwcm9ibGVtcy5cbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgbm9FdmVudExpc3RlbmVyczoge1xuICAgICAgICAgICAgICAgIG5vRXZlbnRzIDogdHJ1ZSxcbiAgICAgICAgICAgICAgICBhZGRFdmVudHM6IGZhbHNlLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogTWFuYWdlIGhvdyBhdXRvTnVtZXJpYyByZWFjdCB3aGVuIHRoZSB1c2VyIHRyaWVzIHRvIHBhc3RlIGFuIGludmFsaWQgbnVtYmVyLlxuICAgICAgICAgICAgICogLSAnZXJyb3InICAgIDogKFRoaXMgaXMgdGhlIGRlZmF1bHQgYmVoYXZpb3IpIFRoZSBpbnB1dCB2YWx1ZSBpcyBub3QgY2hhbmdlZCBhbmQgYW4gZXJyb3IgaXMgb3V0cHV0IGluIHRoZSBjb25zb2xlLlxuICAgICAgICAgICAgICogLSAnaWdub3JlJyAgIDogaWRlbSB0aGFuICdlcnJvcicsIGJ1dCBmYWlsIHNpbGVudGx5IHdpdGhvdXQgb3V0cHV0dGluZyBhbnkgZXJyb3Ivd2FybmluZyBpbiB0aGUgY29uc29sZS5cbiAgICAgICAgICAgICAqIC0gJ2NsYW1wJyAgICA6IGlmIHRoZSBwYXN0ZWQgdmFsdWUgaXMgZWl0aGVyIHRvbyBzbWFsbCBvciB0b28gYmlnIHJlZ2FyZGluZyB0aGUgbWluaW11bVZhbHVlIGFuZCBtYXhpbXVtVmFsdWUgcmFuZ2UsIHRoZW4gdGhlIHJlc3VsdCBpcyBjbGFtcGVkIHRvIHRob3NlIGxpbWl0cy5cbiAgICAgICAgICAgICAqIC0gJ3RydW5jYXRlJyA6IGF1dG9OdW1lcmljIHdpbGwgaW5zZXJ0IGFzIG1hbnkgcGFzdGVkIG51bWJlcnMgaXQgY2FuIGF0IHRoZSBpbml0aWFsIGNhcmV0L3NlbGVjdGlvbiwgdW50aWwgZXZlcnl0aGluZyBpcyBwYXN0ZWQsIG9yIHRoZSByYW5nZSBsaW1pdCBpcyBoaXQuXG4gICAgICAgICAgICAgKiAgICAgICAgICAgICAgICBUaGUgbm9uLXBhc3RlZCBudW1iZXJzIGFyZSBkcm9wcGVkIGFuZCB0aGVyZWZvcmUgbm90IHVzZWQgYXQgYWxsLlxuICAgICAgICAgICAgICogLSAncmVwbGFjZScgIDogYXV0b051bWVyaWMgd2lsbCBmaXJzdCBpbnNlcnQgYXMgbWFueSBwYXN0ZWQgbnVtYmVycyBpdCBjYW4gYXQgdGhlIGluaXRpYWwgY2FyZXQvc2VsZWN0aW9uLCB0aGVuIGlmIHRoZSByYW5nZSBsaW1pdCBpcyBoaXQsIGl0IHdpbGwgdHJ5XG4gICAgICAgICAgICAgKiAgICAgICAgICAgICAgICB0byByZXBsYWNlIG9uZSBieSBvbmUgdGhlIHJlbWFpbmluZyBpbml0aWFsIG51bWJlcnMgKG9uIHRoZSByaWdodCBzaWRlIG9mIHRoZSBjYXJldCkgd2l0aCB0aGUgcmVzdCBvZiB0aGUgcGFzdGVkIG51bWJlcnMuXG4gICAgICAgICAgICAgKlxuICAgICAgICAgICAgICogTm90ZSAxIDogQSBwYXN0ZSBjb250ZW50IHN0YXJ0aW5nIHdpdGggYSBuZWdhdGl2ZSBzaWduICctJyB3aWxsIGJlIGFjY2VwdGVkIGFueXdoZXJlIGluIHRoZSBpbnB1dCwgYW5kIHdpbGwgc2V0IHRoZSByZXN1bHRpbmcgdmFsdWUgYXMgYSBuZWdhdGl2ZSBudW1iZXJcbiAgICAgICAgICAgICAqIE5vdGUgMiA6IEEgcGFzdGUgY29udGVudCBzdGFydGluZyB3aXRoIGEgbnVtYmVyIHdpbGwgYmUgYWNjZXB0ZWQsIGV2ZW4gaWYgdGhlIHJlc3QgaXMgZ2liYmVyaXNoIChpZS4gJzEyM2Zvb2JhcjQ1NicpLlxuICAgICAgICAgICAgICogICAgICAgICAgT25seSB0aGUgZmlyc3QgbnVtYmVyIHdpbGwgYmUgdXNlZCAoaGVyZSAnMTIzJykuXG4gICAgICAgICAgICAgKiBOb3RlIDMgOiBUaGUgcGFzdGUgZXZlbnQgd29ya3Mgd2l0aCB0aGUgYGRlY2ltYWxQbGFjZXNTaG93bk9uRm9jdXNgIG9wdGlvbiB0b28uXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIG9uSW52YWxpZFBhc3RlOiB7XG4gICAgICAgICAgICAgICAgZXJyb3IgICA6ICdlcnJvcicsXG4gICAgICAgICAgICAgICAgaWdub3JlICA6ICdpZ25vcmUnLFxuICAgICAgICAgICAgICAgIGNsYW1wICAgOiAnY2xhbXAnLFxuICAgICAgICAgICAgICAgIHRydW5jYXRlOiAndHJ1bmNhdGUnLFxuICAgICAgICAgICAgICAgIHJlcGxhY2UgOiAncmVwbGFjZScsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBEZWZpbmVzIGhvdyB0aGUgdmFsdWUgc2hvdWxkIGJlIGZvcm1hdHRlZCB3aGVuIHdhbnRpbmcgYSAnbG9jYWxpemVkJyB2ZXJzaW9uIG9mIGl0LlxuICAgICAgICAgICAgICogLSBudWxsIG9yICdzdHJpbmcnID0+ICdubm5uLm5uJyBvciAnLW5ubm4ubm4nIGFzIHRleHQgdHlwZS4gVGhpcyBpcyB0aGUgZGVmYXVsdCBiZWhhdmlvci5cbiAgICAgICAgICAgICAqIC0gJ251bWJlcicgICAgICAgICA9PiBubm5uLm5uIG9yIC1ubm5uLm5uIGFzIGEgTnVtYmVyIChXYXJuaW5nOiB0aGlzIHdvcmtzIG9ubHkgZm9yIGludGVnZXJzIGluZmVyaW9yIHRvIE51bWJlci5NQVhfU0FGRV9JTlRFR0VSKVxuICAgICAgICAgICAgICogLSAnLCcgb3IgJy0sJyAgICAgID0+ICdubm5uLG5uJyBvciAnLW5ubm4sbm4nXG4gICAgICAgICAgICAgKiAtICcuLScgICAgICAgICAgICAgPT4gJ25ubm4ubm4nIG9yICdubm5uLm5uLSdcbiAgICAgICAgICAgICAqIC0gJywtJyAgICAgICAgICAgICA9PiAnbm5ubixubicgb3IgJ25ubm4sbm4tJ1xuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBvdXRwdXRGb3JtYXQ6IHtcbiAgICAgICAgICAgICAgICBzdHJpbmcgICAgICAgOiAnc3RyaW5nJyxcbiAgICAgICAgICAgICAgICBudW1iZXIgICAgICAgOiAnbnVtYmVyJyxcbiAgICAgICAgICAgICAgICBkb3QgICAgICAgICAgOiAnLicsXG4gICAgICAgICAgICAgICAgbmVnYXRpdmVEb3QgIDogJy0uJyxcbiAgICAgICAgICAgICAgICBjb21tYSAgICAgICAgOiAnLCcsXG4gICAgICAgICAgICAgICAgbmVnYXRpdmVDb21tYTogJy0sJyxcbiAgICAgICAgICAgICAgICBkb3ROZWdhdGl2ZSAgOiAnLi0nLFxuICAgICAgICAgICAgICAgIGNvbW1hTmVnYXRpdmU6ICcsLScsXG4gICAgICAgICAgICAgICAgbm9uZSAgICAgICAgIDogbnVsbCxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIE92ZXJyaWRlIHRoZSBtaW5pbXVtIGFuZCBtYXhpbXVtIGxpbWl0c1xuICAgICAgICAgICAgICogb3ZlcnJpZGVNaW5NYXhMaW1pdHM6IFwiY2VpbGluZ1wiIGFkaGVyZXMgdG8gbWF4aW11bVZhbHVlIGFuZCBpZ25vcmVzIG1pbmltdW1WYWx1ZSBzZXR0aW5nc1xuICAgICAgICAgICAgICogb3ZlcnJpZGVNaW5NYXhMaW1pdHM6IFwiZmxvb3JcIiBhZGhlcmVzIHRvIG1pbmltdW1WYWx1ZSBhbmQgaWdub3JlcyBtYXhpbXVtVmFsdWUgc2V0dGluZ3NcbiAgICAgICAgICAgICAqIG92ZXJyaWRlTWluTWF4TGltaXRzOiBcImlnbm9yZVwiIGlnbm9yZXMgYm90aCBtaW5pbXVtVmFsdWUgJiBtYXhpbXVtVmFsdWVcbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgb3ZlcnJpZGVNaW5NYXhMaW1pdHM6IHtcbiAgICAgICAgICAgICAgICBjZWlsaW5nICAgICAgOiAnY2VpbGluZycsXG4gICAgICAgICAgICAgICAgZmxvb3IgICAgICAgIDogJ2Zsb29yJyxcbiAgICAgICAgICAgICAgICBpZ25vcmUgICAgICAgOiAnaWdub3JlJyxcbiAgICAgICAgICAgICAgICBkb05vdE92ZXJyaWRlOiBudWxsLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogVGhlIGByYXdWYWx1ZURpdmlzb3JgIGRpdmlkZXMgdGhlIGZvcm1hdHRlZCB2YWx1ZSBzaG93biBpbiB0aGUgQXV0b051bWVyaWMgZWxlbWVudCBhbmQgc3RvcmUgdGhlIHJlc3VsdCBpbiBgcmF3VmFsdWVgLlxuICAgICAgICAgICAgICogQGV4YW1wbGUgeyByYXdWYWx1ZURpdmlzb3I6ICcxMDAnIH0gb3IgPGlucHV0IGRhdGEtcmF3LXZhbHVlLWRpdmlzb3I9XCIxMDBcIj5cbiAgICAgICAgICAgICAqIEdpdmVuIHRoZSBgMC4wMTIzNGAgcmF3IHZhbHVlLCB0aGUgZm9ybWF0dGVkIHZhbHVlIHdpbGwgYmUgZGlzcGxheWVkIGFzIGAnMS4yMzQnYC5cbiAgICAgICAgICAgICAqIFRoaXMgaXMgdXNlZnVsIHdoZW4gZGlzcGxheWluZyBwZXJjZW50YWdlIGZvciBpbnN0YW5jZSwgYW5kIGF2b2lkIHRoZSBuZWVkIHRvIGRpdmlkZS9tdWx0aXBseSBieSAxMDAgYmV0d2VlbiB0aGUgbnVtYmVyIHNob3duIGFuZCB0aGUgcmF3IHZhbHVlLlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICByYXdWYWx1ZURpdmlzb3I6IHtcbiAgICAgICAgICAgICAgICBub25lICAgICAgOiBudWxsLFxuICAgICAgICAgICAgICAgIHBlcmNlbnRhZ2U6IDEwMCxcbiAgICAgICAgICAgICAgICBwZXJtaWxsZSAgOiAxMDAwLFxuICAgICAgICAgICAgICAgIGJhc2lzUG9pbnQ6IDEwMDAwLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGVmaW5lcyBpZiB0aGUgPGlucHV0PiBlbGVtZW50IHNob3VsZCBiZSBzZXQgYXMgcmVhZCBvbmx5IG9uIGluaXRpYWxpemF0aW9uLlxuICAgICAgICAgICAgICogV2hlbiBzZXQgdG8gYHRydWVgLCB0aGVuIHRoZSBgcmVhZG9ubHlgIGh0bWwgcHJvcGVydHkgaXMgYWRkZWQgdG8gdGhlIDxpbnB1dD4gZWxlbWVudCBvbiBpbml0aWFsaXphdGlvbi5cbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgcmVhZE9ubHk6IHtcbiAgICAgICAgICAgICAgICByZWFkT25seSA6IHRydWUsXG4gICAgICAgICAgICAgICAgcmVhZFdyaXRlOiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIERlZmluZXMgdGhlIHJvdW5kaW5nIG1ldGhvZCB0byB1c2UuXG4gICAgICAgICAgICAgKiByb3VuZGluZ01ldGhvZDogXCJTXCIsIFJvdW5kLUhhbGYtVXAgU3ltbWV0cmljIChkZWZhdWx0KVxuICAgICAgICAgICAgICogcm91bmRpbmdNZXRob2Q6IFwiQVwiLCBSb3VuZC1IYWxmLVVwIEFzeW1tZXRyaWNcbiAgICAgICAgICAgICAqIHJvdW5kaW5nTWV0aG9kOiBcInNcIiwgUm91bmQtSGFsZi1Eb3duIFN5bW1ldHJpYyAobG93ZXIgY2FzZSBzKVxuICAgICAgICAgICAgICogcm91bmRpbmdNZXRob2Q6IFwiYVwiLCBSb3VuZC1IYWxmLURvd24gQXN5bW1ldHJpYyAobG93ZXIgY2FzZSBhKVxuICAgICAgICAgICAgICogcm91bmRpbmdNZXRob2Q6IFwiQlwiLCBSb3VuZC1IYWxmLUV2ZW4gXCJCYW5rZXJzIFJvdW5kaW5nXCJcbiAgICAgICAgICAgICAqIHJvdW5kaW5nTWV0aG9kOiBcIlVcIiwgUm91bmQgVXAgXCJSb3VuZC1Bd2F5LUZyb20tWmVyb1wiXG4gICAgICAgICAgICAgKiByb3VuZGluZ01ldGhvZDogXCJEXCIsIFJvdW5kIERvd24gXCJSb3VuZC1Ub3dhcmQtWmVyb1wiIC0gc2FtZSBhcyB0cnVuY2F0ZVxuICAgICAgICAgICAgICogcm91bmRpbmdNZXRob2Q6IFwiQ1wiLCBSb3VuZCB0byBDZWlsaW5nIFwiVG93YXJkIFBvc2l0aXZlIEluZmluaXR5XCJcbiAgICAgICAgICAgICAqIHJvdW5kaW5nTWV0aG9kOiBcIkZcIiwgUm91bmQgdG8gRmxvb3IgXCJUb3dhcmQgTmVnYXRpdmUgSW5maW5pdHlcIlxuICAgICAgICAgICAgICogcm91bmRpbmdNZXRob2Q6IFwiTjA1XCIgUm91bmRzIHRvIHRoZSBuZWFyZXN0IC4wNSA9PiBzYW1lIGFzIFwiQ0hGXCIgdXNlZCBpbiAxLjlYIGFuZCBzdGlsbCB2YWxpZFxuICAgICAgICAgICAgICogcm91bmRpbmdNZXRob2Q6IFwiVTA1XCIgUm91bmRzIHVwIHRvIG5leHQgLjA1XG4gICAgICAgICAgICAgKiByb3VuZGluZ01ldGhvZDogXCJEMDVcIiBSb3VuZHMgZG93biB0byBuZXh0IC4wNVxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICByb3VuZGluZ01ldGhvZDoge1xuICAgICAgICAgICAgICAgIGhhbGZVcFN5bW1ldHJpYyAgICAgICAgICAgICAgICA6ICdTJyxcbiAgICAgICAgICAgICAgICBoYWxmVXBBc3ltbWV0cmljICAgICAgICAgICAgICAgOiAnQScsXG4gICAgICAgICAgICAgICAgaGFsZkRvd25TeW1tZXRyaWMgICAgICAgICAgICAgIDogJ3MnLFxuICAgICAgICAgICAgICAgIGhhbGZEb3duQXN5bW1ldHJpYyAgICAgICAgICAgICA6ICdhJyxcbiAgICAgICAgICAgICAgICBoYWxmRXZlbkJhbmtlcnNSb3VuZGluZyAgICAgICAgOiAnQicsXG4gICAgICAgICAgICAgICAgdXBSb3VuZEF3YXlGcm9tWmVybyAgICAgICAgICAgIDogJ1UnLFxuICAgICAgICAgICAgICAgIGRvd25Sb3VuZFRvd2FyZFplcm8gICAgICAgICAgICA6ICdEJyxcbiAgICAgICAgICAgICAgICB0b0NlaWxpbmdUb3dhcmRQb3NpdGl2ZUluZmluaXR5OiAnQycsXG4gICAgICAgICAgICAgICAgdG9GbG9vclRvd2FyZE5lZ2F0aXZlSW5maW5pdHkgIDogJ0YnLFxuICAgICAgICAgICAgICAgIHRvTmVhcmVzdDA1ICAgICAgICAgICAgICAgICAgICA6ICdOMDUnLFxuICAgICAgICAgICAgICAgIHRvTmVhcmVzdDA1QWx0ICAgICAgICAgICAgICAgICA6ICdDSEYnLFxuICAgICAgICAgICAgICAgIHVwVG9OZXh0MDUgICAgICAgICAgICAgICAgICAgICA6ICdVMDUnLFxuICAgICAgICAgICAgICAgIGRvd25Ub05leHQwNSAgICAgICAgICAgICAgICAgICA6ICdEMDUnLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogU2V0IHRvIGB0cnVlYCB0byBhbGxvdyB0aGUgYGRlY2ltYWxQbGFjZXNTaG93bk9uRm9jdXNgIHZhbHVlIHRvIGJlIHNhdmVkIHdpdGggc2Vzc2lvblN0b3JhZ2VcbiAgICAgICAgICAgICAqIElmIElFIDYgb3IgNyBpcyBkZXRlY3RlZCwgdGhlIHZhbHVlIHdpbGwgYmUgc2F2ZWQgYXMgYSBzZXNzaW9uIGNvb2tpZS5cbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgc2F2ZVZhbHVlVG9TZXNzaW9uU3RvcmFnZToge1xuICAgICAgICAgICAgICAgIHNhdmUgICAgIDogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkb05vdFNhdmU6IGZhbHNlLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGV0ZXJtaW5lIGlmIHRoZSBzZWxlY3QgYWxsIGtleWJvYXJkIGNvbW1hbmQgd2lsbCBzZWxlY3QgdGhlIGNvbXBsZXRlIGlucHV0IHRleHQsIG9yIG9ubHkgdGhlIGlucHV0IG51bWVyaWMgdmFsdWVcbiAgICAgICAgICAgICAqIE5vdGUgOiBJZiB0aGUgY3VycmVuY3kgc3ltYm9sIGlzIGJldHdlZW4gdGhlIG51bWVyaWMgdmFsdWUgYW5kIHRoZSBuZWdhdGl2ZSBzaWduLCBvbmx5IHRoZSBudW1lcmljIHZhbHVlIHdpbGwgYmUgc2VsZWN0ZWRcbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgc2VsZWN0TnVtYmVyT25seToge1xuICAgICAgICAgICAgICAgIHNlbGVjdE51bWJlcnNPbmx5OiB0cnVlLFxuICAgICAgICAgICAgICAgIHNlbGVjdEFsbCAgICAgICAgOiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIERlZmluZXMgaWYgdGhlIGVsZW1lbnQgdmFsdWUgc2hvdWxkIGJlIHNlbGVjdGVkIG9uIGZvY3VzLlxuICAgICAgICAgICAgICogTm90ZTogVGhlIHNlbGVjdGlvbiBpcyBkb25lIHVzaW5nIHRoZSBgc2VsZWN0TnVtYmVyT25seWAgb3B0aW9uLlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBzZWxlY3RPbkZvY3VzOiB7XG4gICAgICAgICAgICAgICAgc2VsZWN0ICAgICA6IHRydWUsXG4gICAgICAgICAgICAgICAgZG9Ob3RTZWxlY3Q6IGZhbHNlLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGVmaW5lcyBob3cgdGhlIHNlcmlhbGl6ZSBmdW5jdGlvbnMgc2hvdWxkIHRyZWF0IHRoZSBzcGFjZXMuXG4gICAgICAgICAgICAgKiBUaG9zZSBzcGFjZXMgJyAnIGNhbiBlaXRoZXIgYmUgY29udmVydGVkIHRvIHRoZSBwbHVzIHNpZ24gJysnLCB3aGljaCBpcyB0aGUgZGVmYXVsdCwgb3IgdG8gJyUyMCcuXG4gICAgICAgICAgICAgKiBCb3RoIHZhbHVlcyBiZWluZyB2YWxpZCBwZXIgdGhlIHNwZWMgKGh0dHA6Ly93d3cudzMub3JnL0FkZHJlc3NpbmcvVVJML3VyaS1zcGVjLmh0bWwpLlxuICAgICAgICAgICAgICogQWxzbyBzZWUgdGhlIHN1bW1lZCB1cCBhbnN3ZXIgb24gaHR0cDovL3N0YWNrb3ZlcmZsb3cuY29tL2EvMzM5MzkyODcuXG4gICAgICAgICAgICAgKlxuICAgICAgICAgICAgICogdGw7ZHIgOiBTcGFjZXMgc2hvdWxkIGJlIGNvbnZlcnRlZCB0byAnJTIwJyBiZWZvcmUgdGhlICc/JyBzaWduLCB0aGVuIGNvbnZlcnRlZCB0byAnKycgYWZ0ZXIuXG4gICAgICAgICAgICAgKiBJbiBvdXIgY2FzZSBzaW5jZSB3ZSBzZXJpYWxpemUgdGhlIHF1ZXJ5LCB3ZSB1c2UgJysnIGFzIHRoZSBkZWZhdWx0IChidXQgYWxsb3cgdGhlIHVzZXIgdG8gZ2V0IGJhY2sgdGhlIG9sZCAqd3JvbmcqIGJlaGF2aW9yKS5cbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgc2VyaWFsaXplU3BhY2VzOiB7XG4gICAgICAgICAgICAgICAgcGx1cyAgIDogJysnLFxuICAgICAgICAgICAgICAgIHBlcmNlbnQ6ICclMjAnLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGVmaW5lcyBpZiB0aGUgZWxlbWVudCB2YWx1ZSBzaG91bGQgYmUgY29udmVydGVkIHRvIHRoZSByYXcgdmFsdWUgb24gZm9jdXMgKGFuZCBiYWNrIHRvIHRoZSBmb3JtYXR0ZWQgb24gYmx1cikuXG4gICAgICAgICAgICAgKiBJZiBzZXQgdG8gYHRydWVgLCB0aGVuIGF1dG9OdW1lcmljIHJlbW92ZSB0aGUgdGhvdXNhbmQgc2VwYXJhdG9yLCBjdXJyZW5jeSBzeW1ib2wgYW5kIHN1ZmZpeCBvbiBmb2N1cy5cbiAgICAgICAgICAgICAqIEV4YW1wbGU6XG4gICAgICAgICAgICAgKiBJZiB0aGUgaW5wdXQgdmFsdWUgaXMgJyQgMSw5OTkuODggc3VmZml4Jywgb24gZm9jdXMgaXQgYmVjb21lcyAnMTk5OS44OCcgYW5kIGJhY2sgdG8gJyQgMSw5OTkuODggc3VmZml4JyBvbiBmb2N1cyBvdXQuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIHNob3dPbmx5TnVtYmVyc09uRm9jdXM6IHtcbiAgICAgICAgICAgICAgICBvbmx5TnVtYmVyczogdHJ1ZSxcbiAgICAgICAgICAgICAgICBzaG93QWxsICAgIDogZmFsc2UsXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBBbGxvdyB0aGUgcG9zaXRpdmUgc2lnbiBzeW1ib2wgYCtgIHRvIGJlIGRpc3BsYXllZCBmb3IgcG9zaXRpdmUgbnVtYmVycy5cbiAgICAgICAgICAgICAqIEJ5IGRlZmF1bHQsIHRoaXMgcG9zaXRpdmUgc2lnbiBpcyBub3Qgc2hvd24uXG4gICAgICAgICAgICAgKiBUaGUgc2lnbiBwbGFjZW1lbnQgaXMgY29udHJvbGxlZCBieSB0aGUgJ25lZ2F0aXZlUG9zaXRpdmVTaWduUGxhY2VtZW50JyBvcHRpb24sIG1pbWlja2luZyB0aGUgbmVnYXRpdmUgc2lnbiBwbGFjZW1lbnQgcnVsZXMuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIHNob3dQb3NpdGl2ZVNpZ246IHtcbiAgICAgICAgICAgICAgICBzaG93OiB0cnVlLFxuICAgICAgICAgICAgICAgIGhpZGU6IGZhbHNlLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGVmaW5lcyBpZiB3YXJuaW5ncyBzaG91bGQgYmUgc2hvd24gaW4gdGhlIGNvbnNvbGVcbiAgICAgICAgICAgICAqIFRob3NlIHdhcm5pbmdzIGNhbiBiZSBpZ25vcmVkLCBidXQgYXJlIHVzdWFsbHkgcHJpbnRlZCB3aGVuIHNvbWV0aGluZyBjb3VsZCBiZSBpbXByb3ZlZCBieSB0aGUgdXNlciAoaWUuIG9wdGlvbiBjb25mbGljdHMpLlxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBzaG93V2FybmluZ3M6IHtcbiAgICAgICAgICAgICAgICBzaG93OiB0cnVlLCAvLyBBbGwgd2FybmluZyBhcmUgc2hvd25cbiAgICAgICAgICAgICAgICBoaWRlOiBmYWxzZSwgLy8gTm8gd2FybmluZ3MgYXJlIHNob3duLCBvbmx5IHRoZSB0aHJvd24gZXJyb3JzXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBEZWZpbmVzIHRoZSBydWxlcyB0aGF0IGNhbGN1bGF0ZSB0aGUgQ1NTIGNsYXNzKGVzKSB0byBhcHBseSBvbiB0aGUgZWxlbWVudCwgYmFzZWQgb24gdGhlIHJhdyB1bmZvcm1hdHRlZCB2YWx1ZS5cbiAgICAgICAgICAgICAqIFRoaXMgY2FuIGFsc28gYmUgdXNlZCB0byBjYWxsIGNhbGxiYWNrcyB3aGVuZXZlciB0aGUgYHJhd1ZhbHVlYCBpcyB1cGRhdGVkLlxuICAgICAgICAgICAgICogSW1wb3J0YW50OiBhbGwgY2FsbGJhY2tzIG11c3QgcmV0dXJuIGBudWxsYCBpZiBubyByYW5nZXMvdXNlckRlZmluZWQgY2xhc3NlcyBhcmUgc2VsZWN0ZWRcbiAgICAgICAgICAgICAqIEBleGFtcGxlXG4gICAgICAgICAgICAgKiB7XG4gICAgICAgICAgICAgKiAgICAgcG9zaXRpdmUgICA6ICdhdXRvTnVtZXJpYy1wb3NpdGl2ZScsIC8vIE9yIGBudWxsYCB0byBub3QgdXNlIGl0XG4gICAgICAgICAgICAgKiAgICAgbmVnYXRpdmUgICA6ICdhdXRvTnVtZXJpYy1uZWdhdGl2ZScsXG4gICAgICAgICAgICAgKiAgICAgcmFuZ2VzICAgICA6IFtcbiAgICAgICAgICAgICAqICAgICAgICAgeyBtaW46IDAsIG1heDogMjUsIGNsYXNzOiAnYXV0b051bWVyaWMtcmVkJyB9LFxuICAgICAgICAgICAgICogICAgICAgICB7IG1pbjogMjUsIG1heDogNTAsIGNsYXNzOiAnYXV0b051bWVyaWMtb3JhbmdlJyB9LFxuICAgICAgICAgICAgICogICAgICAgICB7IG1pbjogNTAsIG1heDogNzUsIGNsYXNzOiAnYXV0b051bWVyaWMteWVsbG93JyB9LFxuICAgICAgICAgICAgICogICAgICAgICB7IG1pbjogNzUsIG1heDogTnVtYmVyLk1BWF9TQUZFX0lOVEVHRVIsIGNsYXNzOiAnYXV0b051bWVyaWMtZ3JlZW4nIH0sXG4gICAgICAgICAgICAgKiAgICAgXSxcbiAgICAgICAgICAgICAqICAgICB1c2VyRGVmaW5lZDogW1xuICAgICAgICAgICAgICogICAgICAgICAvLyBJZiAnY2xhc3NlcycgaXMgYSBzdHJpbmcsIHNldCBpdCBpZiBgdHJ1ZWAsIHJlbW92ZSBpdCBpZiBgZmFsc2VgXG4gICAgICAgICAgICAgKiAgICAgICAgIHsgY2FsbGJhY2s6IHJhd1ZhbHVlID0+IHsgcmV0dXJuIHRydWU7IH0sIGNsYXNzZXM6ICd0aGlzSXNUcnVlJyB9LFxuICAgICAgICAgICAgICogICAgICAgICAvLyBJZiAnY2xhc3NlcycgaXMgYW4gYXJyYXkgd2l0aCBvbmx5IDIgZWxlbWVudHMsIHNldCB0aGUgZmlyc3QgY2xhc3MgaWYgYHRydWVgLCB0aGUgc2Vjb25kIGlmIGBmYWxzZWBcbiAgICAgICAgICAgICAqICAgICAgICAgeyBjYWxsYmFjazogcmF3VmFsdWUgPT4gcmF3VmFsdWUgJSAyID09PSAwLCBjbGFzc2VzOiBbJ2F1dG9OdW1lcmljLWV2ZW4nLCAnYXV0b051bWVyaWMtb2RkJ10gfSxcbiAgICAgICAgICAgICAqICAgICAgICAgLy8gUmV0dXJuIG9ubHkgb25lIGluZGV4IHRvIHVzZSBvbiB0aGUgYGNsYXNzZXNgIGFycmF5IChoZXJlLCAnY2xhc3MzJylcbiAgICAgICAgICAgICAqICAgICAgICAgeyBjYWxsYmFjazogcmF3VmFsdWUgPT4geyByZXR1cm4gMjsgfSwgY2xhc3NlczogWydjbGFzczEnLCAnY2xhc3MyJywgJ2NsYXNzMyddIH0sXG4gICAgICAgICAgICAgKiAgICAgICAgIC8vIFJldHVybiBhbiBhcnJheSBvZiBpbmRleGVzIHRvIHVzZSBvbiB0aGUgYGNsYXNzZXNgIGFycmF5IChoZXJlLCAnY2xhc3MxJyBhbmQgJ2NsYXNzMycpXG4gICAgICAgICAgICAgKiAgICAgICAgIHsgY2FsbGJhY2s6IHJhd1ZhbHVlID0+IHsgcmV0dXJuIFswLCAyXTsgfSwgY2xhc3NlczogWydjbGFzczEnLCAnY2xhc3MyJywgJ2NsYXNzMyddIH0sXG4gICAgICAgICAgICAgKiAgICAgICAgIC8vIElmICdjbGFzc2VzJyBpcyBgdW5kZWZpbmVkYCBvciBgbnVsbGAsIHRoZW4gdGhlIGNhbGxiYWNrIGlzIGNhbGxlZCB3aXRoIHRoZSBBdXRvTnVtZXJpYyBvYmplY3QgcGFzc2VkIGFzIGEgcGFyYW1ldGVyXG4gICAgICAgICAgICAgKiAgICAgICAgIHsgY2FsbGJhY2s6IGFuRWxlbWVudCA9PiB7IHJldHVybiBhbkVsZW1lbnQuZ2V0Rm9ybWF0dGVkKCk7IH0gfSxcbiAgICAgICAgICAgICAqICAgICBdLFxuICAgICAgICAgICAgICogfVxuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBzdHlsZVJ1bGVzOiB7XG4gICAgICAgICAgICAgICAgbm9uZSAgICAgICAgICAgICAgICAgOiBudWxsLFxuICAgICAgICAgICAgICAgIHBvc2l0aXZlTmVnYXRpdmUgICAgIDoge1xuICAgICAgICAgICAgICAgICAgICBwb3NpdGl2ZTogJ2F1dG9OdW1lcmljLXBvc2l0aXZlJyxcbiAgICAgICAgICAgICAgICAgICAgbmVnYXRpdmU6ICdhdXRvTnVtZXJpYy1uZWdhdGl2ZScsXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICByYW5nZTBUbzEwMFdpdGg0U3RlcHM6IHtcbiAgICAgICAgICAgICAgICAgICAgcmFuZ2VzOiBbXG4gICAgICAgICAgICAgICAgICAgICAgICB7IG1pbjogMCwgbWF4OiAyNSwgY2xhc3M6ICdhdXRvTnVtZXJpYy1yZWQnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICB7IG1pbjogMjUsIG1heDogNTAsIGNsYXNzOiAnYXV0b051bWVyaWMtb3JhbmdlJyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgeyBtaW46IDUwLCBtYXg6IDc1LCBjbGFzczogJ2F1dG9OdW1lcmljLXllbGxvdycgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgIHsgbWluOiA3NSwgbWF4OiAxMDAsIGNsYXNzOiAnYXV0b051bWVyaWMtZ3JlZW4nIH0sXG4gICAgICAgICAgICAgICAgICAgIF0sXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICBldmVuT2RkICAgICAgICAgICAgICA6IHtcbiAgICAgICAgICAgICAgICAgICAgdXNlckRlZmluZWQ6IFtcbiAgICAgICAgICAgICAgICAgICAgICAgIHsgY2FsbGJhY2s6IHJhd1ZhbHVlID0+IHJhd1ZhbHVlICUgMiA9PT0gMCwgY2xhc3NlczogWydhdXRvTnVtZXJpYy1ldmVuJywgJ2F1dG9OdW1lcmljLW9kZCddIH0sXG4gICAgICAgICAgICAgICAgICAgIF0sXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICByYW5nZVNtYWxsQW5kWmVybyAgICA6IHtcbiAgICAgICAgICAgICAgICAgICAgdXNlckRlZmluZWQ6IFtcbiAgICAgICAgICAgICAgICAgICAgICAgIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYWxsYmFjayAgOiByYXdWYWx1ZSA9PiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyYXdWYWx1ZSA+PSAtMSAmJiByYXdWYWx1ZSA8IDApIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiAwO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChOdW1iZXIocmF3VmFsdWUpID09PSAwKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gMTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAocmF3VmFsdWUgPiAwICYmIHJhd1ZhbHVlIDw9IDEpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiAyO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIG51bGw7ICAvLyBJbiBjYXNlIHRoZSByYXdWYWx1ZSBpcyBvdXRzaWRlIHRob3NlIHJhbmdlc1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0sIGNsYXNzZXM6IFtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJ2F1dG9OdW1lcmljLXNtYWxsLW5lZ2F0aXZlJyxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJ2F1dG9OdW1lcmljLXplcm8nLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAnYXV0b051bWVyaWMtc21hbGwtcG9zaXRpdmUnLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIF0sXG4gICAgICAgICAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgICAgICBdLFxuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAvKiBBZGQgYSB0ZXh0IG9uIHRoZSByaWdodCBoYW5kIHNpZGUgb2YgdGhlIGVsZW1lbnQgdmFsdWUuXG4gICAgICAgICAgICAgKiBUaGlzIHN1ZmZpeCB0ZXh0IGNhbiBoYXZlIGFueSBjaGFyYWN0ZXJzIGluIGl0cyBzdHJpbmcsIGV4Y2VwdCBudW1lcmljIGNoYXJhY3RlcnMgYW5kIHRoZSBuZWdhdGl2ZS9wb3NpdGl2ZSBzaWduLlxuICAgICAgICAgICAgICogRXhhbXBsZTogJyBkb2xsYXJzJ1xuICAgICAgICAgICAgICovXG4gICAgICAgICAgICBzdWZmaXhUZXh0OiB7XG4gICAgICAgICAgICAgICAgbm9uZSAgICAgIDogJycsXG4gICAgICAgICAgICAgICAgcGVyY2VudGFnZTogJyUnLFxuICAgICAgICAgICAgICAgIHBlcm1pbGxlICA6ICfigLAnLFxuICAgICAgICAgICAgICAgIGJhc2lzUG9pbnQ6ICfigLEnLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogVGhlIHRocmVlIG9wdGlvbnMgKGRpdmlzb3JXaGVuVW5mb2N1c2VkLCBkZWNpbWFsUGxhY2VzU2hvd25PbkJsdXIgJiBzeW1ib2xXaGVuVW5mb2N1c2VkKSBoYW5kbGUgc2NhbGluZyBvZiB0aGUgaW5wdXQgd2hlbiB0aGUgaW5wdXQgZG9lcyBub3QgaGF2ZSBmb2N1c1xuICAgICAgICAgICAgICogUGxlYXNlIG5vdGUgdGhhdCB0aGUgbm9uLXNjYWxlZCB2YWx1ZSBpcyBoZWxkIGluIGRhdGEgYW5kIGl0IGlzIGFkdmlzZWQgdGhhdCB5b3UgdXNlIHRoZSBgc2F2ZVZhbHVlVG9TZXNzaW9uU3RvcmFnZWAgb3B0aW9uIHRvIGVuc3VyZSByZXRhaW5pbmcgdGhlIHZhbHVlXG4gICAgICAgICAgICAgKiBbXCJkaXZpc29yXCIsIFwiZGVjaW1hbCBwbGFjZXNcIiwgXCJzeW1ib2xcIl1cbiAgICAgICAgICAgICAqIEV4YW1wbGU6IHdpdGggdGhlIGZvbGxvd2luZyBvcHRpb25zIHNldCB7ZGl2aXNvcldoZW5VbmZvY3VzZWQ6ICcxMDAwJywgZGVjaW1hbFBsYWNlc1Nob3duT25CbHVyOiAnMScsIHN5bWJvbFdoZW5VbmZvY3VzZWQ6ICcgSyd9XG4gICAgICAgICAgICAgKiBFeGFtcGxlOiBmb2N1c2luIHZhbHVlIFwiMSwxMTEuMTFcIiBmb2N1c291dCB2YWx1ZSBcIjEuMSBLXCJcbiAgICAgICAgICAgICAqL1xuXG4gICAgICAgICAgICAvKiBUaGUgYHN5bWJvbFdoZW5VbmZvY3VzZWRgIG9wdGlvbiBpcyBhIHN5bWJvbCBwbGFjZWQgYXMgYSBzdWZmaXggd2hlbiBub3QgaW4gZm9jdXMuXG4gICAgICAgICAgICAgKiBUaGlzIGlzIG9wdGlvbmFsIHRvby5cbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgc3ltYm9sV2hlblVuZm9jdXNlZDoge1xuICAgICAgICAgICAgICAgIG5vbmUgICAgICA6IG51bGwsXG4gICAgICAgICAgICAgICAgcGVyY2VudGFnZTogJyUnLFxuICAgICAgICAgICAgICAgIHBlcm1pbGxlICA6ICfigLAnLFxuICAgICAgICAgICAgICAgIGJhc2lzUG9pbnQ6ICfigLEnLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogRGVmaW5lcyBpZiB0aGUgZWxlbWVudCB2YWx1ZSBzaG91bGQgYmUgdW5mb3JtYXR0ZWQgd2hlbiB0aGUgdXNlciBob3ZlciBoaXMgbW91c2Ugb3ZlciBpdCB3aGlsZSBob2xkaW5nIHRoZSBgQWx0YCBrZXkuXG4gICAgICAgICAgICAgKiBVbmZvcm1hdHRpbmcgdGhlcmUgbWVhbnMgdGhhdCB0aGlzIHJlbW92ZXMgYW55IG5vbi1udW1iZXIgY2hhcmFjdGVycyBhbmQgZGlzcGxheXMgdGhlICpyYXcqIHZhbHVlLCBhcyB1bmRlcnN0b29kIGJ5IEphdmFzY3JpcHQgKGllLiBgMTIuMzRgIGlzIGEgdmFsaWQgbnVtYmVyLCB3aGlsZSBgMTIsMzRgIGlzIG5vdCkuXG4gICAgICAgICAgICAgKlxuICAgICAgICAgICAgICogV2UgcmVmb3JtYXQgYmFjayBiZWZvcmUgYW55dGhpbmcgZWxzZSBpZiA6XG4gICAgICAgICAgICAgKiAtIHRoZSB1c2VyIGZvY3VzIG9uIHRoZSBlbGVtZW50IGJ5IHRhYmJpbmcgb3IgY2xpY2tpbmcgaW50byBpdCxcbiAgICAgICAgICAgICAqIC0gdGhlIHVzZXIgcmVsZWFzZXMgdGhlIGBBbHRgIGtleSwgYW5kXG4gICAgICAgICAgICAgKiAtIGlmIHdlIGRldGVjdCBhIG1vdXNlbGVhdmUgZXZlbnQuXG4gICAgICAgICAgICAgKlxuICAgICAgICAgICAgICogV2UgdW5mb3JtYXQgYWdhaW4gaWYgOlxuICAgICAgICAgICAgICogLSB3aGlsZSB0aGUgbW91c2UgaXMgb3ZlciB0aGUgZWxlbWVudCwgdGhlIHVzZXIgaGl0IGN0cmwgYWdhaW5cbiAgICAgICAgICAgICAqL1xuICAgICAgICAgICAgdW5mb3JtYXRPbkhvdmVyOiB7XG4gICAgICAgICAgICAgICAgdW5mb3JtYXQgICAgIDogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkb05vdFVuZm9ybWF0OiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIC8qIFJlbW92ZXMgdGhlIGZvcm1hdHRpbmcgYW5kIHVzZSB0aGUgcmF3IHZhbHVlIGluIGVhY2ggYXV0b051bWVyaWMgZWxlbWVudHMgb2YgdGhlIHBhcmVudCBmb3JtIGVsZW1lbnQsIG9uIHRoZSBmb3JtIGBzdWJtaXRgIGV2ZW50LlxuICAgICAgICAgICAgICogVGhlIG91dHB1dCBmb3JtYXQgaXMgYSBudW1lcmljIHN0cmluZyAobm5ubi5ubiBvciAtbm5ubi5ubikuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIHVuZm9ybWF0T25TdWJtaXQ6IHtcbiAgICAgICAgICAgICAgICB1bmZvcm1hdCAgICAgICAgOiB0cnVlLFxuICAgICAgICAgICAgICAgIGtlZXBDdXJyZW50VmFsdWU6IGZhbHNlLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgLyogVGhhdCBvcHRpb24gaXMgbGlua2VkIHRvIHRoZSBgbW9kaWZ5VmFsdWVPbldoZWVsYCBvbmUgYW5kIHdpbGwgb25seSBiZSB1c2VkIGlmIHRoZSBsYXR0ZXIgaXMgc2V0IHRvIGB0cnVlYC5cbiAgICAgICAgICAgICAqIFRoaXMgb3B0aW9uIHdpbGwgbW9kaWZ5IHRoZSB3aGVlbCBiZWhhdmlvciBhbmQgY2FuIGJlIHVzZWQgaW4gdHdvIHdheXMsIGVpdGhlciBieSBzZXR0aW5nIDpcbiAgICAgICAgICAgICAqIC0gYSAnZml4ZWQnIHN0ZXAgdmFsdWUgKGEgcG9zaXRpdmUgZmxvYXQgb3IgaW50ZWdlciBudW1iZXIgYDEwMDBgKSwgb3JcbiAgICAgICAgICAgICAqIC0gdGhlIGAncHJvZ3Jlc3NpdmUnYCBzdHJpbmcuXG4gICAgICAgICAgICAgKlxuICAgICAgICAgICAgICogVGhlICdmaXhlZCcgbW9kZSBhbHdheXMgaW5jcmVtZW50L2RlY3JlbWVudCB0aGUgZWxlbWVudCB2YWx1ZSBieSB0aGF0IGFtb3VudCwgd2hpbGUgcmVzcGVjdGluZyB0aGUgYG1pbmltdW1WYWx1ZWAgYW5kIGBtYXhpbXVtVmFsdWVgIHNldHRpbmdzLlxuICAgICAgICAgICAgICogVGhlICdwcm9ncmVzc2l2ZScgbW9kZSB3aWxsIGluY3JlbWVudC9kZWNyZW1lbnQgdGhlIGVsZW1lbnQgdmFsdWUgYmFzZWQgb24gaXRzIGN1cnJlbnQgdmFsdWUuIFRoZSBiaWdnZXIgdGhlIG51bWJlciwgdGhlIGJpZ2dlciB0aGUgc3RlcCwgYW5kIHZpY2UgdmVyc2EuXG4gICAgICAgICAgICAgKi9cbiAgICAgICAgICAgIHdoZWVsU3RlcDoge1xuICAgICAgICAgICAgICAgIHByb2dyZXNzaXZlOiAncHJvZ3Jlc3NpdmUnLFxuICAgICAgICAgICAgfSxcbiAgICAgICAgfTtcbiAgICB9LFxufSk7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvQXV0b051bWVyaWNPcHRpb25zLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==")
        }, function(module, exports, __webpack_require__) {
            eval('/*** IMPORTS FROM imports-loader ***/\n(function() {\n\n\'use strict\';\n\nvar _AutoNumeric = __webpack_require__(1);\n\nvar _AutoNumeric2 = _interopRequireDefault(_AutoNumeric);\n\nvar _AutoNumericOptions = __webpack_require__(4);\n\nvar _AutoNumericOptions2 = _interopRequireDefault(_AutoNumericOptions);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\n/* eslint no-unused-vars: 0 */\n\n/**\n * The defaults options.\n * These can be overridden by the following methods:\n * - HTML5 data attributes (ie. `<input type="text" data-currency-symbol=" €">`)\n * - Options passed to the `update` method (ie. `anElement.update({ currencySymbol: \' €\' });`), or simply during the initialization (ie. `new AutoNumeric(domElement, {options});`)\n */\n/**\n * Default settings for autoNumeric.js\n * @author Alexandre Bonneau <alexandre.bonneau@linuxfr.eu>\n * @copyright © 2016 Alexandre Bonneau\n *\n * The MIT License (http://www.opensource.org/licenses/mit-license.php)\n *\n * Permission is hereby granted, free of charge, to any person\n * obtaining a copy of this software and associated documentation\n * files (the "Software"), to deal in the Software without\n * restriction, including without limitation the rights to use,\n * copy, modify, merge, publish, distribute, sub license, and/or sell\n * copies of the Software, and to permit persons to whom the\n * Software is furnished to do so, subject to the following\n * conditions:\n *\n * The above copyright notice and this permission notice shall be\n * included in all copies or substantial portions of the Software.\n *\n * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,\n * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES\n * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND\n * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT\n * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,\n * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING\n * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR\n * OTHER DEALINGS IN THE SOFTWARE.\n */\n\nObject.defineProperty(_AutoNumeric2.default, \'defaultSettings\', {\n    get: function get() {\n        return {\n            allowDecimalPadding: _AutoNumeric2.default.options.allowDecimalPadding.always,\n            caretPositionOnFocus: _AutoNumeric2.default.options.caretPositionOnFocus.doNoForceCaretPosition,\n            createLocalList: _AutoNumeric2.default.options.createLocalList.createList,\n            currencySymbol: _AutoNumeric2.default.options.currencySymbol.none,\n            currencySymbolPlacement: _AutoNumeric2.default.options.currencySymbolPlacement.prefix,\n            decimalCharacter: _AutoNumeric2.default.options.decimalCharacter.dot,\n            decimalCharacterAlternative: _AutoNumeric2.default.options.decimalCharacterAlternative.none,\n            decimalPlaces: _AutoNumeric2.default.options.decimalPlaces.two,\n            decimalPlacesRawValue: _AutoNumeric2.default.options.decimalPlacesRawValue.useDefault,\n            decimalPlacesShownOnBlur: _AutoNumeric2.default.options.decimalPlacesShownOnBlur.useDefault,\n            decimalPlacesShownOnFocus: _AutoNumeric2.default.options.decimalPlacesShownOnFocus.useDefault,\n            defaultValueOverride: _AutoNumeric2.default.options.defaultValueOverride.doNotOverride,\n            digitalGroupSpacing: _AutoNumeric2.default.options.digitalGroupSpacing.three,\n            digitGroupSeparator: _AutoNumeric2.default.options.digitGroupSeparator.comma,\n            divisorWhenUnfocused: _AutoNumeric2.default.options.divisorWhenUnfocused.none,\n            emptyInputBehavior: _AutoNumeric2.default.options.emptyInputBehavior.focus,\n            failOnUnknownOption: _AutoNumeric2.default.options.failOnUnknownOption.ignore,\n            formatOnPageLoad: _AutoNumeric2.default.options.formatOnPageLoad.format,\n            historySize: _AutoNumeric2.default.options.historySize.medium,\n            isCancellable: _AutoNumeric2.default.options.isCancellable.cancellable,\n            leadingZero: _AutoNumeric2.default.options.leadingZero.deny,\n            maximumValue: _AutoNumeric2.default.options.maximumValue.tenTrillions,\n            minimumValue: _AutoNumeric2.default.options.minimumValue.tenTrillions,\n            modifyValueOnWheel: _AutoNumeric2.default.options.modifyValueOnWheel.modifyValue,\n            negativeBracketsTypeOnBlur: _AutoNumeric2.default.options.negativeBracketsTypeOnBlur.none,\n            negativePositiveSignPlacement: _AutoNumeric2.default.options.negativePositiveSignPlacement.none,\n            noEventListeners: _AutoNumeric2.default.options.noEventListeners.addEvents,\n            //TODO Shouldn\'t we use `truncate` as the default value?\n            onInvalidPaste: _AutoNumeric2.default.options.onInvalidPaste.error,\n            outputFormat: _AutoNumeric2.default.options.outputFormat.none,\n            overrideMinMaxLimits: _AutoNumeric2.default.options.overrideMinMaxLimits.doNotOverride,\n            rawValueDivisor: _AutoNumeric2.default.options.rawValueDivisor.none,\n            readOnly: _AutoNumeric2.default.options.readOnly.readWrite,\n            roundingMethod: _AutoNumeric2.default.options.roundingMethod.halfUpSymmetric,\n            saveValueToSessionStorage: _AutoNumeric2.default.options.saveValueToSessionStorage.doNotSave,\n            selectNumberOnly: _AutoNumeric2.default.options.selectNumberOnly.selectNumbersOnly,\n            selectOnFocus: _AutoNumeric2.default.options.selectOnFocus.select,\n            serializeSpaces: _AutoNumeric2.default.options.serializeSpaces.plus,\n            showOnlyNumbersOnFocus: _AutoNumeric2.default.options.showOnlyNumbersOnFocus.showAll,\n            showPositiveSign: _AutoNumeric2.default.options.showPositiveSign.hide,\n            showWarnings: _AutoNumeric2.default.options.showWarnings.show,\n            styleRules: _AutoNumeric2.default.options.styleRules.none,\n            suffixText: _AutoNumeric2.default.options.suffixText.none,\n            symbolWhenUnfocused: _AutoNumeric2.default.options.symbolWhenUnfocused.none,\n            unformatOnHover: _AutoNumeric2.default.options.unformatOnHover.unformat,\n            unformatOnSubmit: _AutoNumeric2.default.options.unformatOnSubmit.keepCurrentValue,\n            wheelStep: _AutoNumeric2.default.options.wheelStep.progressive\n        };\n    }\n});\n}.call(window));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvQXV0b051bWVyaWNEZWZhdWx0U2V0dGluZ3MuanM/ZTg2YiJdLCJuYW1lcyI6WyJPYmplY3QiLCJkZWZpbmVQcm9wZXJ0eSIsImdldCIsImFsbG93RGVjaW1hbFBhZGRpbmciLCJvcHRpb25zIiwiYWx3YXlzIiwiY2FyZXRQb3NpdGlvbk9uRm9jdXMiLCJkb05vRm9yY2VDYXJldFBvc2l0aW9uIiwiY3JlYXRlTG9jYWxMaXN0IiwiY3JlYXRlTGlzdCIsImN1cnJlbmN5U3ltYm9sIiwibm9uZSIsImN1cnJlbmN5U3ltYm9sUGxhY2VtZW50IiwicHJlZml4IiwiZGVjaW1hbENoYXJhY3RlciIsImRvdCIsImRlY2ltYWxDaGFyYWN0ZXJBbHRlcm5hdGl2ZSIsImRlY2ltYWxQbGFjZXMiLCJ0d28iLCJkZWNpbWFsUGxhY2VzUmF3VmFsdWUiLCJ1c2VEZWZhdWx0IiwiZGVjaW1hbFBsYWNlc1Nob3duT25CbHVyIiwiZGVjaW1hbFBsYWNlc1Nob3duT25Gb2N1cyIsImRlZmF1bHRWYWx1ZU92ZXJyaWRlIiwiZG9Ob3RPdmVycmlkZSIsImRpZ2l0YWxHcm91cFNwYWNpbmciLCJ0aHJlZSIsImRpZ2l0R3JvdXBTZXBhcmF0b3IiLCJjb21tYSIsImRpdmlzb3JXaGVuVW5mb2N1c2VkIiwiZW1wdHlJbnB1dEJlaGF2aW9yIiwiZm9jdXMiLCJmYWlsT25Vbmtub3duT3B0aW9uIiwiaWdub3JlIiwiZm9ybWF0T25QYWdlTG9hZCIsImZvcm1hdCIsImhpc3RvcnlTaXplIiwibWVkaXVtIiwiaXNDYW5jZWxsYWJsZSIsImNhbmNlbGxhYmxlIiwibGVhZGluZ1plcm8iLCJkZW55IiwibWF4aW11bVZhbHVlIiwidGVuVHJpbGxpb25zIiwibWluaW11bVZhbHVlIiwibW9kaWZ5VmFsdWVPbldoZWVsIiwibW9kaWZ5VmFsdWUiLCJuZWdhdGl2ZUJyYWNrZXRzVHlwZU9uQmx1ciIsIm5lZ2F0aXZlUG9zaXRpdmVTaWduUGxhY2VtZW50Iiwibm9FdmVudExpc3RlbmVycyIsImFkZEV2ZW50cyIsIm9uSW52YWxpZFBhc3RlIiwiZXJyb3IiLCJvdXRwdXRGb3JtYXQiLCJvdmVycmlkZU1pbk1heExpbWl0cyIsInJhd1ZhbHVlRGl2aXNvciIsInJlYWRPbmx5IiwicmVhZFdyaXRlIiwicm91bmRpbmdNZXRob2QiLCJoYWxmVXBTeW1tZXRyaWMiLCJzYXZlVmFsdWVUb1Nlc3Npb25TdG9yYWdlIiwiZG9Ob3RTYXZlIiwic2VsZWN0TnVtYmVyT25seSIsInNlbGVjdE51bWJlcnNPbmx5Iiwic2VsZWN0T25Gb2N1cyIsInNlbGVjdCIsInNlcmlhbGl6ZVNwYWNlcyIsInBsdXMiLCJzaG93T25seU51bWJlcnNPbkZvY3VzIiwic2hvd0FsbCIsInNob3dQb3NpdGl2ZVNpZ24iLCJoaWRlIiwic2hvd1dhcm5pbmdzIiwic2hvdyIsInN0eWxlUnVsZXMiLCJzdWZmaXhUZXh0Iiwic3ltYm9sV2hlblVuZm9jdXNlZCIsInVuZm9ybWF0T25Ib3ZlciIsInVuZm9ybWF0IiwidW5mb3JtYXRPblN1Ym1pdCIsImtlZXBDdXJyZW50VmFsdWUiLCJ3aGVlbFN0ZXAiLCJwcm9ncmVzc2l2ZSJdLCJtYXBwaW5ncyI6Ijs7Ozs7QUE2QkE7Ozs7QUFDQTs7Ozs7O0FBRUE7O0FBRUE7Ozs7OztBQWxDQTs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUF3Q0FBLE9BQU9DLGNBQVAsd0JBQW1DLGlCQUFuQyxFQUFzRDtBQUNsREMsT0FEa0QsaUJBQzVDO0FBQ0YsZUFBTztBQUNIQyxpQ0FBK0Isc0JBQVlDLE9BQVosQ0FBb0JELG1CQUFwQixDQUF3Q0UsTUFEcEU7QUFFSEMsa0NBQStCLHNCQUFZRixPQUFaLENBQW9CRSxvQkFBcEIsQ0FBeUNDLHNCQUZyRTtBQUdIQyw2QkFBK0Isc0JBQVlKLE9BQVosQ0FBb0JJLGVBQXBCLENBQW9DQyxVQUhoRTtBQUlIQyw0QkFBK0Isc0JBQVlOLE9BQVosQ0FBb0JNLGNBQXBCLENBQW1DQyxJQUovRDtBQUtIQyxxQ0FBK0Isc0JBQVlSLE9BQVosQ0FBb0JRLHVCQUFwQixDQUE0Q0MsTUFMeEU7QUFNSEMsOEJBQStCLHNCQUFZVixPQUFaLENBQW9CVSxnQkFBcEIsQ0FBcUNDLEdBTmpFO0FBT0hDLHlDQUErQixzQkFBWVosT0FBWixDQUFvQlksMkJBQXBCLENBQWdETCxJQVA1RTtBQVFITSwyQkFBK0Isc0JBQVliLE9BQVosQ0FBb0JhLGFBQXBCLENBQWtDQyxHQVI5RDtBQVNIQyxtQ0FBK0Isc0JBQVlmLE9BQVosQ0FBb0JlLHFCQUFwQixDQUEwQ0MsVUFUdEU7QUFVSEMsc0NBQStCLHNCQUFZakIsT0FBWixDQUFvQmlCLHdCQUFwQixDQUE2Q0QsVUFWekU7QUFXSEUsdUNBQStCLHNCQUFZbEIsT0FBWixDQUFvQmtCLHlCQUFwQixDQUE4Q0YsVUFYMUU7QUFZSEcsa0NBQStCLHNCQUFZbkIsT0FBWixDQUFvQm1CLG9CQUFwQixDQUF5Q0MsYUFackU7QUFhSEMsaUNBQStCLHNCQUFZckIsT0FBWixDQUFvQnFCLG1CQUFwQixDQUF3Q0MsS0FicEU7QUFjSEMsaUNBQStCLHNCQUFZdkIsT0FBWixDQUFvQnVCLG1CQUFwQixDQUF3Q0MsS0FkcEU7QUFlSEMsa0NBQStCLHNCQUFZekIsT0FBWixDQUFvQnlCLG9CQUFwQixDQUF5Q2xCLElBZnJFO0FBZ0JIbUIsZ0NBQStCLHNCQUFZMUIsT0FBWixDQUFvQjBCLGtCQUFwQixDQUF1Q0MsS0FoQm5FO0FBaUJIQyxpQ0FBK0Isc0JBQVk1QixPQUFaLENBQW9CNEIsbUJBQXBCLENBQXdDQyxNQWpCcEU7QUFrQkhDLDhCQUErQixzQkFBWTlCLE9BQVosQ0FBb0I4QixnQkFBcEIsQ0FBcUNDLE1BbEJqRTtBQW1CSEMseUJBQStCLHNCQUFZaEMsT0FBWixDQUFvQmdDLFdBQXBCLENBQWdDQyxNQW5CNUQ7QUFvQkhDLDJCQUErQixzQkFBWWxDLE9BQVosQ0FBb0JrQyxhQUFwQixDQUFrQ0MsV0FwQjlEO0FBcUJIQyx5QkFBK0Isc0JBQVlwQyxPQUFaLENBQW9Cb0MsV0FBcEIsQ0FBZ0NDLElBckI1RDtBQXNCSEMsMEJBQStCLHNCQUFZdEMsT0FBWixDQUFvQnNDLFlBQXBCLENBQWlDQyxZQXRCN0Q7QUF1QkhDLDBCQUErQixzQkFBWXhDLE9BQVosQ0FBb0J3QyxZQUFwQixDQUFpQ0QsWUF2QjdEO0FBd0JIRSxnQ0FBK0Isc0JBQVl6QyxPQUFaLENBQW9CeUMsa0JBQXBCLENBQXVDQyxXQXhCbkU7QUF5QkhDLHdDQUErQixzQkFBWTNDLE9BQVosQ0FBb0IyQywwQkFBcEIsQ0FBK0NwQyxJQXpCM0U7QUEwQkhxQywyQ0FBK0Isc0JBQVk1QyxPQUFaLENBQW9CNEMsNkJBQXBCLENBQWtEckMsSUExQjlFO0FBMkJIc0MsOEJBQStCLHNCQUFZN0MsT0FBWixDQUFvQjZDLGdCQUFwQixDQUFxQ0MsU0EzQmpFO0FBNEJIO0FBQ0FDLDRCQUErQixzQkFBWS9DLE9BQVosQ0FBb0IrQyxjQUFwQixDQUFtQ0MsS0E3Qi9EO0FBOEJIQywwQkFBK0Isc0JBQVlqRCxPQUFaLENBQW9CaUQsWUFBcEIsQ0FBaUMxQyxJQTlCN0Q7QUErQkgyQyxrQ0FBK0Isc0JBQVlsRCxPQUFaLENBQW9Ca0Qsb0JBQXBCLENBQXlDOUIsYUEvQnJFO0FBZ0NIK0IsNkJBQStCLHNCQUFZbkQsT0FBWixDQUFvQm1ELGVBQXBCLENBQW9DNUMsSUFoQ2hFO0FBaUNINkMsc0JBQStCLHNCQUFZcEQsT0FBWixDQUFvQm9ELFFBQXBCLENBQTZCQyxTQWpDekQ7QUFrQ0hDLDRCQUErQixzQkFBWXRELE9BQVosQ0FBb0JzRCxjQUFwQixDQUFtQ0MsZUFsQy9EO0FBbUNIQyx1Q0FBK0Isc0JBQVl4RCxPQUFaLENBQW9Cd0QseUJBQXBCLENBQThDQyxTQW5DMUU7QUFvQ0hDLDhCQUErQixzQkFBWTFELE9BQVosQ0FBb0IwRCxnQkFBcEIsQ0FBcUNDLGlCQXBDakU7QUFxQ0hDLDJCQUErQixzQkFBWTVELE9BQVosQ0FBb0I0RCxhQUFwQixDQUFrQ0MsTUFyQzlEO0FBc0NIQyw2QkFBK0Isc0JBQVk5RCxPQUFaLENBQW9COEQsZUFBcEIsQ0FBb0NDLElBdENoRTtBQXVDSEMsb0NBQStCLHNCQUFZaEUsT0FBWixDQUFvQmdFLHNCQUFwQixDQUEyQ0MsT0F2Q3ZFO0FBd0NIQyw4QkFBK0Isc0JBQVlsRSxPQUFaLENBQW9Ca0UsZ0JBQXBCLENBQXFDQyxJQXhDakU7QUF5Q0hDLDBCQUErQixzQkFBWXBFLE9BQVosQ0FBb0JvRSxZQUFwQixDQUFpQ0MsSUF6QzdEO0FBMENIQyx3QkFBK0Isc0JBQVl0RSxPQUFaLENBQW9Cc0UsVUFBcEIsQ0FBK0IvRCxJQTFDM0Q7QUEyQ0hnRSx3QkFBK0Isc0JBQVl2RSxPQUFaLENBQW9CdUUsVUFBcEIsQ0FBK0JoRSxJQTNDM0Q7QUE0Q0hpRSxpQ0FBK0Isc0JBQVl4RSxPQUFaLENBQW9Cd0UsbUJBQXBCLENBQXdDakUsSUE1Q3BFO0FBNkNIa0UsNkJBQStCLHNCQUFZekUsT0FBWixDQUFvQnlFLGVBQXBCLENBQW9DQyxRQTdDaEU7QUE4Q0hDLDhCQUErQixzQkFBWTNFLE9BQVosQ0FBb0IyRSxnQkFBcEIsQ0FBcUNDLGdCQTlDakU7QUErQ0hDLHVCQUErQixzQkFBWTdFLE9BQVosQ0FBb0I2RSxTQUFwQixDQUE4QkM7QUEvQzFELFNBQVA7QUFpREg7QUFuRGlELENBQXRELEUiLCJmaWxlIjoiNS5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qKlxuICogRGVmYXVsdCBzZXR0aW5ncyBmb3IgYXV0b051bWVyaWMuanNcbiAqIEBhdXRob3IgQWxleGFuZHJlIEJvbm5lYXUgPGFsZXhhbmRyZS5ib25uZWF1QGxpbnV4ZnIuZXU+XG4gKiBAY29weXJpZ2h0IMKpIDIwMTYgQWxleGFuZHJlIEJvbm5lYXVcbiAqXG4gKiBUaGUgTUlUIExpY2Vuc2UgKGh0dHA6Ly93d3cub3BlbnNvdXJjZS5vcmcvbGljZW5zZXMvbWl0LWxpY2Vuc2UucGhwKVxuICpcbiAqIFBlcm1pc3Npb24gaXMgaGVyZWJ5IGdyYW50ZWQsIGZyZWUgb2YgY2hhcmdlLCB0byBhbnkgcGVyc29uXG4gKiBvYnRhaW5pbmcgYSBjb3B5IG9mIHRoaXMgc29mdHdhcmUgYW5kIGFzc29jaWF0ZWQgZG9jdW1lbnRhdGlvblxuICogZmlsZXMgKHRoZSBcIlNvZnR3YXJlXCIpLCB0byBkZWFsIGluIHRoZSBTb2Z0d2FyZSB3aXRob3V0XG4gKiByZXN0cmljdGlvbiwgaW5jbHVkaW5nIHdpdGhvdXQgbGltaXRhdGlvbiB0aGUgcmlnaHRzIHRvIHVzZSxcbiAqIGNvcHksIG1vZGlmeSwgbWVyZ2UsIHB1Ymxpc2gsIGRpc3RyaWJ1dGUsIHN1YiBsaWNlbnNlLCBhbmQvb3Igc2VsbFxuICogY29waWVzIG9mIHRoZSBTb2Z0d2FyZSwgYW5kIHRvIHBlcm1pdCBwZXJzb25zIHRvIHdob20gdGhlXG4gKiBTb2Z0d2FyZSBpcyBmdXJuaXNoZWQgdG8gZG8gc28sIHN1YmplY3QgdG8gdGhlIGZvbGxvd2luZ1xuICogY29uZGl0aW9uczpcbiAqXG4gKiBUaGUgYWJvdmUgY29weXJpZ2h0IG5vdGljZSBhbmQgdGhpcyBwZXJtaXNzaW9uIG5vdGljZSBzaGFsbCBiZVxuICogaW5jbHVkZWQgaW4gYWxsIGNvcGllcyBvciBzdWJzdGFudGlhbCBwb3J0aW9ucyBvZiB0aGUgU29mdHdhcmUuXG4gKlxuICogVEhFIFNPRlRXQVJFIElTIFBST1ZJREVEIFwiQVMgSVNcIiwgV0lUSE9VVCBXQVJSQU5UWSBPRiBBTlkgS0lORCxcbiAqIEVYUFJFU1MgT1IgSU1QTElFRCwgSU5DTFVESU5HIEJVVCBOT1QgTElNSVRFRCBUTyBUSEUgV0FSUkFOVElFU1xuICogT0YgTUVSQ0hBTlRBQklMSVRZLCBGSVRORVNTIEZPUiBBIFBBUlRJQ1VMQVIgUFVSUE9TRSBBTkRcbiAqIE5PTklORlJJTkdFTUVOVC4gSU4gTk8gRVZFTlQgU0hBTEwgVEhFIEFVVEhPUlMgT1IgQ09QWVJJR0hUXG4gKiBIT0xERVJTIEJFIExJQUJMRSBGT1IgQU5ZIENMQUlNLCBEQU1BR0VTIE9SIE9USEVSIExJQUJJTElUWSxcbiAqIFdIRVRIRVIgSU4gQU4gQUNUSU9OIE9GIENPTlRSQUNULCBUT1JUIE9SIE9USEVSV0lTRSwgQVJJU0lOR1xuICogRlJPTSwgT1VUIE9GIE9SIElOIENPTk5FQ1RJT04gV0lUSCBUSEUgU09GVFdBUkUgT1IgVEhFIFVTRSBPUlxuICogT1RIRVIgREVBTElOR1MgSU4gVEhFIFNPRlRXQVJFLlxuICovXG5cbmltcG9ydCBBdXRvTnVtZXJpYyBmcm9tICcuL0F1dG9OdW1lcmljJztcbmltcG9ydCBBdXRvTnVtZXJpY09wdGlvbnMgZnJvbSAnLi9BdXRvTnVtZXJpY09wdGlvbnMnO1xuXG4vKiBlc2xpbnQgbm8tdW51c2VkLXZhcnM6IDAgKi9cblxuLyoqXG4gKiBUaGUgZGVmYXVsdHMgb3B0aW9ucy5cbiAqIFRoZXNlIGNhbiBiZSBvdmVycmlkZGVuIGJ5IHRoZSBmb2xsb3dpbmcgbWV0aG9kczpcbiAqIC0gSFRNTDUgZGF0YSBhdHRyaWJ1dGVzIChpZS4gYDxpbnB1dCB0eXBlPVwidGV4dFwiIGRhdGEtY3VycmVuY3ktc3ltYm9sPVwiIOKCrFwiPmApXG4gKiAtIE9wdGlvbnMgcGFzc2VkIHRvIHRoZSBgdXBkYXRlYCBtZXRob2QgKGllLiBgYW5FbGVtZW50LnVwZGF0ZSh7IGN1cnJlbmN5U3ltYm9sOiAnIOKCrCcgfSk7YCksIG9yIHNpbXBseSBkdXJpbmcgdGhlIGluaXRpYWxpemF0aW9uIChpZS4gYG5ldyBBdXRvTnVtZXJpYyhkb21FbGVtZW50LCB7b3B0aW9uc30pO2ApXG4gKi9cbk9iamVjdC5kZWZpbmVQcm9wZXJ0eShBdXRvTnVtZXJpYywgJ2RlZmF1bHRTZXR0aW5ncycsIHtcbiAgICBnZXQoKSB7XG4gICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICBhbGxvd0RlY2ltYWxQYWRkaW5nICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5hbGxvd0RlY2ltYWxQYWRkaW5nLmFsd2F5cyxcbiAgICAgICAgICAgIGNhcmV0UG9zaXRpb25PbkZvY3VzICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLmNhcmV0UG9zaXRpb25PbkZvY3VzLmRvTm9Gb3JjZUNhcmV0UG9zaXRpb24sXG4gICAgICAgICAgICBjcmVhdGVMb2NhbExpc3QgICAgICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5jcmVhdGVMb2NhbExpc3QuY3JlYXRlTGlzdCxcbiAgICAgICAgICAgIGN1cnJlbmN5U3ltYm9sICAgICAgICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLmN1cnJlbmN5U3ltYm9sLm5vbmUsXG4gICAgICAgICAgICBjdXJyZW5jeVN5bWJvbFBsYWNlbWVudCAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5jdXJyZW5jeVN5bWJvbFBsYWNlbWVudC5wcmVmaXgsXG4gICAgICAgICAgICBkZWNpbWFsQ2hhcmFjdGVyICAgICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5kZWNpbWFsQ2hhcmFjdGVyLmRvdCxcbiAgICAgICAgICAgIGRlY2ltYWxDaGFyYWN0ZXJBbHRlcm5hdGl2ZSAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLmRlY2ltYWxDaGFyYWN0ZXJBbHRlcm5hdGl2ZS5ub25lLFxuICAgICAgICAgICAgZGVjaW1hbFBsYWNlcyAgICAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuZGVjaW1hbFBsYWNlcy50d28sXG4gICAgICAgICAgICBkZWNpbWFsUGxhY2VzUmF3VmFsdWUgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5kZWNpbWFsUGxhY2VzUmF3VmFsdWUudXNlRGVmYXVsdCxcbiAgICAgICAgICAgIGRlY2ltYWxQbGFjZXNTaG93bk9uQmx1ciAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLmRlY2ltYWxQbGFjZXNTaG93bk9uQmx1ci51c2VEZWZhdWx0LFxuICAgICAgICAgICAgZGVjaW1hbFBsYWNlc1Nob3duT25Gb2N1cyAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuZGVjaW1hbFBsYWNlc1Nob3duT25Gb2N1cy51c2VEZWZhdWx0LFxuICAgICAgICAgICAgZGVmYXVsdFZhbHVlT3ZlcnJpZGUgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuZGVmYXVsdFZhbHVlT3ZlcnJpZGUuZG9Ob3RPdmVycmlkZSxcbiAgICAgICAgICAgIGRpZ2l0YWxHcm91cFNwYWNpbmcgICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLmRpZ2l0YWxHcm91cFNwYWNpbmcudGhyZWUsXG4gICAgICAgICAgICBkaWdpdEdyb3VwU2VwYXJhdG9yICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5kaWdpdEdyb3VwU2VwYXJhdG9yLmNvbW1hLFxuICAgICAgICAgICAgZGl2aXNvcldoZW5VbmZvY3VzZWQgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuZGl2aXNvcldoZW5VbmZvY3VzZWQubm9uZSxcbiAgICAgICAgICAgIGVtcHR5SW5wdXRCZWhhdmlvciAgICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLmVtcHR5SW5wdXRCZWhhdmlvci5mb2N1cyxcbiAgICAgICAgICAgIGZhaWxPblVua25vd25PcHRpb24gICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLmZhaWxPblVua25vd25PcHRpb24uaWdub3JlLFxuICAgICAgICAgICAgZm9ybWF0T25QYWdlTG9hZCAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuZm9ybWF0T25QYWdlTG9hZC5mb3JtYXQsXG4gICAgICAgICAgICBoaXN0b3J5U2l6ZSAgICAgICAgICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5oaXN0b3J5U2l6ZS5tZWRpdW0sXG4gICAgICAgICAgICBpc0NhbmNlbGxhYmxlICAgICAgICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5pc0NhbmNlbGxhYmxlLmNhbmNlbGxhYmxlLFxuICAgICAgICAgICAgbGVhZGluZ1plcm8gICAgICAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMubGVhZGluZ1plcm8uZGVueSxcbiAgICAgICAgICAgIG1heGltdW1WYWx1ZSAgICAgICAgICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLm1heGltdW1WYWx1ZS50ZW5UcmlsbGlvbnMsXG4gICAgICAgICAgICBtaW5pbXVtVmFsdWUgICAgICAgICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5taW5pbXVtVmFsdWUudGVuVHJpbGxpb25zLFxuICAgICAgICAgICAgbW9kaWZ5VmFsdWVPbldoZWVsICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMubW9kaWZ5VmFsdWVPbldoZWVsLm1vZGlmeVZhbHVlLFxuICAgICAgICAgICAgbmVnYXRpdmVCcmFja2V0c1R5cGVPbkJsdXIgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMubmVnYXRpdmVCcmFja2V0c1R5cGVPbkJsdXIubm9uZSxcbiAgICAgICAgICAgIG5lZ2F0aXZlUG9zaXRpdmVTaWduUGxhY2VtZW50OiBBdXRvTnVtZXJpYy5vcHRpb25zLm5lZ2F0aXZlUG9zaXRpdmVTaWduUGxhY2VtZW50Lm5vbmUsXG4gICAgICAgICAgICBub0V2ZW50TGlzdGVuZXJzICAgICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5ub0V2ZW50TGlzdGVuZXJzLmFkZEV2ZW50cyxcbiAgICAgICAgICAgIC8vVE9ETyBTaG91bGRuJ3Qgd2UgdXNlIGB0cnVuY2F0ZWAgYXMgdGhlIGRlZmF1bHQgdmFsdWU/XG4gICAgICAgICAgICBvbkludmFsaWRQYXN0ZSAgICAgICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5vbkludmFsaWRQYXN0ZS5lcnJvcixcbiAgICAgICAgICAgIG91dHB1dEZvcm1hdCAgICAgICAgICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLm91dHB1dEZvcm1hdC5ub25lLFxuICAgICAgICAgICAgb3ZlcnJpZGVNaW5NYXhMaW1pdHMgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMub3ZlcnJpZGVNaW5NYXhMaW1pdHMuZG9Ob3RPdmVycmlkZSxcbiAgICAgICAgICAgIHJhd1ZhbHVlRGl2aXNvciAgICAgICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLnJhd1ZhbHVlRGl2aXNvci5ub25lLFxuICAgICAgICAgICAgcmVhZE9ubHkgICAgICAgICAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMucmVhZE9ubHkucmVhZFdyaXRlLFxuICAgICAgICAgICAgcm91bmRpbmdNZXRob2QgICAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMucm91bmRpbmdNZXRob2QuaGFsZlVwU3ltbWV0cmljLFxuICAgICAgICAgICAgc2F2ZVZhbHVlVG9TZXNzaW9uU3RvcmFnZSAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuc2F2ZVZhbHVlVG9TZXNzaW9uU3RvcmFnZS5kb05vdFNhdmUsXG4gICAgICAgICAgICBzZWxlY3ROdW1iZXJPbmx5ICAgICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5zZWxlY3ROdW1iZXJPbmx5LnNlbGVjdE51bWJlcnNPbmx5LFxuICAgICAgICAgICAgc2VsZWN0T25Gb2N1cyAgICAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuc2VsZWN0T25Gb2N1cy5zZWxlY3QsXG4gICAgICAgICAgICBzZXJpYWxpemVTcGFjZXMgICAgICAgICAgICAgIDogQXV0b051bWVyaWMub3B0aW9ucy5zZXJpYWxpemVTcGFjZXMucGx1cyxcbiAgICAgICAgICAgIHNob3dPbmx5TnVtYmVyc09uRm9jdXMgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLnNob3dPbmx5TnVtYmVyc09uRm9jdXMuc2hvd0FsbCxcbiAgICAgICAgICAgIHNob3dQb3NpdGl2ZVNpZ24gICAgICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLnNob3dQb3NpdGl2ZVNpZ24uaGlkZSxcbiAgICAgICAgICAgIHNob3dXYXJuaW5ncyAgICAgICAgICAgICAgICAgOiBBdXRvTnVtZXJpYy5vcHRpb25zLnNob3dXYXJuaW5ncy5zaG93LFxuICAgICAgICAgICAgc3R5bGVSdWxlcyAgICAgICAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuc3R5bGVSdWxlcy5ub25lLFxuICAgICAgICAgICAgc3VmZml4VGV4dCAgICAgICAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuc3VmZml4VGV4dC5ub25lLFxuICAgICAgICAgICAgc3ltYm9sV2hlblVuZm9jdXNlZCAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMuc3ltYm9sV2hlblVuZm9jdXNlZC5ub25lLFxuICAgICAgICAgICAgdW5mb3JtYXRPbkhvdmVyICAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMudW5mb3JtYXRPbkhvdmVyLnVuZm9ybWF0LFxuICAgICAgICAgICAgdW5mb3JtYXRPblN1Ym1pdCAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMudW5mb3JtYXRPblN1Ym1pdC5rZWVwQ3VycmVudFZhbHVlLFxuICAgICAgICAgICAgd2hlZWxTdGVwICAgICAgICAgICAgICAgICAgICA6IEF1dG9OdW1lcmljLm9wdGlvbnMud2hlZWxTdGVwLnByb2dyZXNzaXZlLFxuICAgICAgICB9O1xuICAgIH0sXG59KTtcblxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vc3JjL0F1dG9OdW1lcmljRGVmYXVsdFNldHRpbmdzLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==')
        }, function(module, exports, __webpack_require__) {
            eval("/*** IMPORTS FROM imports-loader ***/\n(function() {\n\n'use strict';\n\nvar _AutoNumeric = __webpack_require__(1);\n\nvar _AutoNumeric2 = _interopRequireDefault(_AutoNumeric);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\n/**\n * Event list managed by AutoNumeric\n *\n * @type {{formatted: string, minRangeExceeded: string, maxRangeExceeded: string, native: {input: string, change: string}}}\n */\nObject.defineProperty(_AutoNumeric2.default, 'events', {\n    get: function get() {\n        return {\n            formatted: 'autoNumeric:formatted',\n            minRangeExceeded: 'autoNumeric:minExceeded',\n            maxRangeExceeded: 'autoNumeric:maxExceeded',\n            native: {\n                input: 'input',\n                change: 'change'\n            }\n        };\n    }\n}); /**\n     * Options for autoNumeric.js\n     * @author Alexandre Bonneau <alexandre.bonneau@linuxfr.eu>\n     * @copyright © 2017 Alexandre Bonneau\n     *\n     * The MIT License (http://www.opensource.org/licenses/mit-license.php)\n     *\n     * Permission is hereby granted, free of charge, to any person\n     * obtaining a copy of this software and associated documentation\n     * files (the \"Software\"), to deal in the Software without\n     * restriction, including without limitation the rights to use,\n     * copy, modify, merge, publish, distribute, sub license, and/or sell\n     * copies of the Software, and to permit persons to whom the\n     * Software is furnished to do so, subject to the following\n     * conditions:\n     *\n     * The above copyright notice and this permission notice shall be\n     * included in all copies or substantial portions of the Software.\n     *\n     * THE SOFTWARE IS PROVIDED \"AS IS\", WITHOUT WARRANTY OF ANY KIND,\n     * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES\n     * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND\n     * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT\n     * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,\n     * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING\n     * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR\n     * OTHER DEALINGS IN THE SOFTWARE.\n     */\n}.call(window));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvQXV0b051bWVyaWNFdmVudHMuanM/N2JkMyJdLCJuYW1lcyI6WyJPYmplY3QiLCJkZWZpbmVQcm9wZXJ0eSIsImdldCIsImZvcm1hdHRlZCIsIm1pblJhbmdlRXhjZWVkZWQiLCJtYXhSYW5nZUV4Y2VlZGVkIiwibmF0aXZlIiwiaW5wdXQiLCJjaGFuZ2UiXSwibWFwcGluZ3MiOiI7Ozs7O0FBNkJBOzs7Ozs7QUFFQTs7Ozs7QUFLQUEsT0FBT0MsY0FBUCx3QkFBbUMsUUFBbkMsRUFBNkM7QUFDekNDLE9BRHlDLGlCQUNuQztBQUNGLGVBQU87QUFDSEMsdUJBQWtCLHVCQURmO0FBRUhDLDhCQUFrQix5QkFGZjtBQUdIQyw4QkFBa0IseUJBSGY7QUFJSEMsb0JBQWtCO0FBQ2RDLHVCQUFRLE9BRE07QUFFZEMsd0JBQVE7QUFGTTtBQUpmLFNBQVA7QUFTSDtBQVh3QyxDQUE3QyxFLENBcENBIiwiZmlsZSI6IjYuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIE9wdGlvbnMgZm9yIGF1dG9OdW1lcmljLmpzXG4gKiBAYXV0aG9yIEFsZXhhbmRyZSBCb25uZWF1IDxhbGV4YW5kcmUuYm9ubmVhdUBsaW51eGZyLmV1PlxuICogQGNvcHlyaWdodCDCqSAyMDE3IEFsZXhhbmRyZSBCb25uZWF1XG4gKlxuICogVGhlIE1JVCBMaWNlbnNlIChodHRwOi8vd3d3Lm9wZW5zb3VyY2Uub3JnL2xpY2Vuc2VzL21pdC1saWNlbnNlLnBocClcbiAqXG4gKiBQZXJtaXNzaW9uIGlzIGhlcmVieSBncmFudGVkLCBmcmVlIG9mIGNoYXJnZSwgdG8gYW55IHBlcnNvblxuICogb2J0YWluaW5nIGEgY29weSBvZiB0aGlzIHNvZnR3YXJlIGFuZCBhc3NvY2lhdGVkIGRvY3VtZW50YXRpb25cbiAqIGZpbGVzICh0aGUgXCJTb2Z0d2FyZVwiKSwgdG8gZGVhbCBpbiB0aGUgU29mdHdhcmUgd2l0aG91dFxuICogcmVzdHJpY3Rpb24sIGluY2x1ZGluZyB3aXRob3V0IGxpbWl0YXRpb24gdGhlIHJpZ2h0cyB0byB1c2UsXG4gKiBjb3B5LCBtb2RpZnksIG1lcmdlLCBwdWJsaXNoLCBkaXN0cmlidXRlLCBzdWIgbGljZW5zZSwgYW5kL29yIHNlbGxcbiAqIGNvcGllcyBvZiB0aGUgU29mdHdhcmUsIGFuZCB0byBwZXJtaXQgcGVyc29ucyB0byB3aG9tIHRoZVxuICogU29mdHdhcmUgaXMgZnVybmlzaGVkIHRvIGRvIHNvLCBzdWJqZWN0IHRvIHRoZSBmb2xsb3dpbmdcbiAqIGNvbmRpdGlvbnM6XG4gKlxuICogVGhlIGFib3ZlIGNvcHlyaWdodCBub3RpY2UgYW5kIHRoaXMgcGVybWlzc2lvbiBub3RpY2Ugc2hhbGwgYmVcbiAqIGluY2x1ZGVkIGluIGFsbCBjb3BpZXMgb3Igc3Vic3RhbnRpYWwgcG9ydGlvbnMgb2YgdGhlIFNvZnR3YXJlLlxuICpcbiAqIFRIRSBTT0ZUV0FSRSBJUyBQUk9WSURFRCBcIkFTIElTXCIsIFdJVEhPVVQgV0FSUkFOVFkgT0YgQU5ZIEtJTkQsXG4gKiBFWFBSRVNTIE9SIElNUExJRUQsIElOQ0xVRElORyBCVVQgTk9UIExJTUlURUQgVE8gVEhFIFdBUlJBTlRJRVNcbiAqIE9GIE1FUkNIQU5UQUJJTElUWSwgRklUTkVTUyBGT1IgQSBQQVJUSUNVTEFSIFBVUlBPU0UgQU5EXG4gKiBOT05JTkZSSU5HRU1FTlQuIElOIE5PIEVWRU5UIFNIQUxMIFRIRSBBVVRIT1JTIE9SIENPUFlSSUdIVFxuICogSE9MREVSUyBCRSBMSUFCTEUgRk9SIEFOWSBDTEFJTSwgREFNQUdFUyBPUiBPVEhFUiBMSUFCSUxJVFksXG4gKiBXSEVUSEVSIElOIEFOIEFDVElPTiBPRiBDT05UUkFDVCwgVE9SVCBPUiBPVEhFUldJU0UsIEFSSVNJTkdcbiAqIEZST00sIE9VVCBPRiBPUiBJTiBDT05ORUNUSU9OIFdJVEggVEhFIFNPRlRXQVJFIE9SIFRIRSBVU0UgT1JcbiAqIE9USEVSIERFQUxJTkdTIElOIFRIRSBTT0ZUV0FSRS5cbiAqL1xuXG5pbXBvcnQgQXV0b051bWVyaWMgZnJvbSAnLi9BdXRvTnVtZXJpYyc7XG5cbi8qKlxuICogRXZlbnQgbGlzdCBtYW5hZ2VkIGJ5IEF1dG9OdW1lcmljXG4gKlxuICogQHR5cGUge3tmb3JtYXR0ZWQ6IHN0cmluZywgbWluUmFuZ2VFeGNlZWRlZDogc3RyaW5nLCBtYXhSYW5nZUV4Y2VlZGVkOiBzdHJpbmcsIG5hdGl2ZToge2lucHV0OiBzdHJpbmcsIGNoYW5nZTogc3RyaW5nfX19XG4gKi9cbk9iamVjdC5kZWZpbmVQcm9wZXJ0eShBdXRvTnVtZXJpYywgJ2V2ZW50cycsIHtcbiAgICBnZXQoKSB7XG4gICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICBmb3JtYXR0ZWQgICAgICAgOiAnYXV0b051bWVyaWM6Zm9ybWF0dGVkJyxcbiAgICAgICAgICAgIG1pblJhbmdlRXhjZWVkZWQ6ICdhdXRvTnVtZXJpYzptaW5FeGNlZWRlZCcsXG4gICAgICAgICAgICBtYXhSYW5nZUV4Y2VlZGVkOiAnYXV0b051bWVyaWM6bWF4RXhjZWVkZWQnLFxuICAgICAgICAgICAgbmF0aXZlICAgICAgICAgIDoge1xuICAgICAgICAgICAgICAgIGlucHV0IDogJ2lucHV0JyxcbiAgICAgICAgICAgICAgICBjaGFuZ2U6ICdjaGFuZ2UnLFxuICAgICAgICAgICAgfSxcbiAgICAgICAgfTtcbiAgICB9LFxufSk7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvQXV0b051bWVyaWNFdmVudHMuanMiXSwic291cmNlUm9vdCI6IiJ9")
        }, function(module, exports, __webpack_require__) {
        }, function(module, exports, __webpack_require__) {
            eval('/*** IMPORTS FROM imports-loader ***/\n(function() {\n\n\'use strict\';\n\nvar _AutoNumeric = __webpack_require__(1);\n\nvar _AutoNumeric2 = _interopRequireDefault(_AutoNumeric);\n\nvar _AutoNumericEvents = __webpack_require__(6);\n\nvar _AutoNumericEvents2 = _interopRequireDefault(_AutoNumericEvents);\n\nvar _AutoNumericOptions = __webpack_require__(4);\n\nvar _AutoNumericOptions2 = _interopRequireDefault(_AutoNumericOptions);\n\nvar _AutoNumericDefaultSettings = __webpack_require__(5);\n\nvar _AutoNumericDefaultSettings2 = _interopRequireDefault(_AutoNumericDefaultSettings);\n\nvar _AutoNumericPredefinedOptions = __webpack_require__(7);\n\nvar _AutoNumericPredefinedOptions2 = _interopRequireDefault(_AutoNumericPredefinedOptions);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\n/* eslint no-unused-vars: 0 */\n\n/**\n * This file serve as the main entry point to the library.\n * cf. workaround detailed here http://stackoverflow.com/a/33683495/2834898\n *\n * @type {AutoNumeric}\n */\nmodule.exports = _AutoNumeric2.default;\n//TODO Also export the AutoNumericEnum module\n/**\n * Babel + Webpack workaround for autoNumeric\n *\n * @author Alexandre Bonneau <alexandre.bonneau@linuxfr.eu>\n * @copyright © 2017 Alexandre Bonneau\n *\n * The MIT License (http://www.opensource.org/licenses/mit-license.php)\n *\n * Permission is hereby granted, free of charge, to any person\n * obtaining a copy of this software and associated documentation\n * files (the "Software"), to deal in the Software without\n * restriction, including without limitation the rights to use,\n * copy, modify, merge, publish, distribute, sub license, and/or sell\n * copies of the Software, and to permit persons to whom the\n * Software is furnished to do so, subject to the following\n * conditions:\n *\n * The above copyright notice and this permission notice shall be\n * included in all copies or substantial portions of the Software.\n *\n * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,\n * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES\n * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND\n * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT\n * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,\n * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING\n * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR\n * OTHER DEALINGS IN THE SOFTWARE.\n */\n\n/* global module */\n}.call(window));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvbWFpbi5qcz8zNDc5Il0sIm5hbWVzIjpbIm1vZHVsZSIsImV4cG9ydHMiXSwibWFwcGluZ3MiOiI7Ozs7O0FBZ0NBOzs7O0FBQ0E7Ozs7QUFDQTs7OztBQUNBOzs7O0FBQ0E7Ozs7OztBQUVBOztBQUVBOzs7Ozs7QUFNQUEsT0FBT0MsT0FBUDtBQUNBO0FBL0NBOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUE4QkEsbUIiLCJmaWxlIjoiOC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qKlxuICogQmFiZWwgKyBXZWJwYWNrIHdvcmthcm91bmQgZm9yIGF1dG9OdW1lcmljXG4gKlxuICogQGF1dGhvciBBbGV4YW5kcmUgQm9ubmVhdSA8YWxleGFuZHJlLmJvbm5lYXVAbGludXhmci5ldT5cbiAqIEBjb3B5cmlnaHQgwqkgMjAxNyBBbGV4YW5kcmUgQm9ubmVhdVxuICpcbiAqIFRoZSBNSVQgTGljZW5zZSAoaHR0cDovL3d3dy5vcGVuc291cmNlLm9yZy9saWNlbnNlcy9taXQtbGljZW5zZS5waHApXG4gKlxuICogUGVybWlzc2lvbiBpcyBoZXJlYnkgZ3JhbnRlZCwgZnJlZSBvZiBjaGFyZ2UsIHRvIGFueSBwZXJzb25cbiAqIG9idGFpbmluZyBhIGNvcHkgb2YgdGhpcyBzb2Z0d2FyZSBhbmQgYXNzb2NpYXRlZCBkb2N1bWVudGF0aW9uXG4gKiBmaWxlcyAodGhlIFwiU29mdHdhcmVcIiksIHRvIGRlYWwgaW4gdGhlIFNvZnR3YXJlIHdpdGhvdXRcbiAqIHJlc3RyaWN0aW9uLCBpbmNsdWRpbmcgd2l0aG91dCBsaW1pdGF0aW9uIHRoZSByaWdodHMgdG8gdXNlLFxuICogY29weSwgbW9kaWZ5LCBtZXJnZSwgcHVibGlzaCwgZGlzdHJpYnV0ZSwgc3ViIGxpY2Vuc2UsIGFuZC9vciBzZWxsXG4gKiBjb3BpZXMgb2YgdGhlIFNvZnR3YXJlLCBhbmQgdG8gcGVybWl0IHBlcnNvbnMgdG8gd2hvbSB0aGVcbiAqIFNvZnR3YXJlIGlzIGZ1cm5pc2hlZCB0byBkbyBzbywgc3ViamVjdCB0byB0aGUgZm9sbG93aW5nXG4gKiBjb25kaXRpb25zOlxuICpcbiAqIFRoZSBhYm92ZSBjb3B5cmlnaHQgbm90aWNlIGFuZCB0aGlzIHBlcm1pc3Npb24gbm90aWNlIHNoYWxsIGJlXG4gKiBpbmNsdWRlZCBpbiBhbGwgY29waWVzIG9yIHN1YnN0YW50aWFsIHBvcnRpb25zIG9mIHRoZSBTb2Z0d2FyZS5cbiAqXG4gKiBUSEUgU09GVFdBUkUgSVMgUFJPVklERUQgXCJBUyBJU1wiLCBXSVRIT1VUIFdBUlJBTlRZIE9GIEFOWSBLSU5ELFxuICogRVhQUkVTUyBPUiBJTVBMSUVELCBJTkNMVURJTkcgQlVUIE5PVCBMSU1JVEVEIFRPIFRIRSBXQVJSQU5USUVTXG4gKiBPRiBNRVJDSEFOVEFCSUxJVFksIEZJVE5FU1MgRk9SIEEgUEFSVElDVUxBUiBQVVJQT1NFIEFORFxuICogTk9OSU5GUklOR0VNRU5ULiBJTiBOTyBFVkVOVCBTSEFMTCBUSEUgQVVUSE9SUyBPUiBDT1BZUklHSFRcbiAqIEhPTERFUlMgQkUgTElBQkxFIEZPUiBBTlkgQ0xBSU0sIERBTUFHRVMgT1IgT1RIRVIgTElBQklMSVRZLFxuICogV0hFVEhFUiBJTiBBTiBBQ1RJT04gT0YgQ09OVFJBQ1QsIFRPUlQgT1IgT1RIRVJXSVNFLCBBUklTSU5HXG4gKiBGUk9NLCBPVVQgT0YgT1IgSU4gQ09OTkVDVElPTiBXSVRIIFRIRSBTT0ZUV0FSRSBPUiBUSEUgVVNFIE9SXG4gKiBPVEhFUiBERUFMSU5HUyBJTiBUSEUgU09GVFdBUkUuXG4gKi9cblxuLyogZ2xvYmFsIG1vZHVsZSAqL1xuXG5pbXBvcnQgQXV0b051bWVyaWMgZnJvbSAnLi9BdXRvTnVtZXJpYyc7XG5pbXBvcnQgQXV0b051bWVyaWNFdmVudHMgZnJvbSAnLi9BdXRvTnVtZXJpY0V2ZW50cyc7XG5pbXBvcnQgQXV0b051bWVyaWNPcHRpb25zIGZyb20gJy4vQXV0b051bWVyaWNPcHRpb25zJztcbmltcG9ydCBBdXRvTnVtZXJpY0RlZmF1bHRTZXR0aW5ncyBmcm9tICcuL0F1dG9OdW1lcmljRGVmYXVsdFNldHRpbmdzJztcbmltcG9ydCBBdXRvTnVtZXJpY1ByZWRlZmluZWRPcHRpb25zIGZyb20gJy4vQXV0b051bWVyaWNQcmVkZWZpbmVkT3B0aW9ucyc7XG5cbi8qIGVzbGludCBuby11bnVzZWQtdmFyczogMCAqL1xuXG4vKipcbiAqIFRoaXMgZmlsZSBzZXJ2ZSBhcyB0aGUgbWFpbiBlbnRyeSBwb2ludCB0byB0aGUgbGlicmFyeS5cbiAqIGNmLiB3b3JrYXJvdW5kIGRldGFpbGVkIGhlcmUgaHR0cDovL3N0YWNrb3ZlcmZsb3cuY29tL2EvMzM2ODM0OTUvMjgzNDg5OFxuICpcbiAqIEB0eXBlIHtBdXRvTnVtZXJpY31cbiAqL1xubW9kdWxlLmV4cG9ydHMgPSBBdXRvTnVtZXJpYztcbi8vVE9ETyBBbHNvIGV4cG9ydCB0aGUgQXV0b051bWVyaWNFbnVtIG1vZHVsZVxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vc3JjL21haW4uanMiXSwic291cmNlUm9vdCI6IiJ9')
        }])
    })
}
}, [76]);
webpackJsonp([6], [function(n, e, t) {
    "use strict";

    function o(n) {
        return "[object Array]" === w.call(n)
    }

    function i(n) {
        return "[object ArrayBuffer]" === w.call(n)
    }

    function r(n) {
        return "undefined" != typeof FormData && n instanceof FormData
    }

    function f(n) {
        return "undefined" != typeof ArrayBuffer && ArrayBuffer.isView ? ArrayBuffer.isView(n) : n && n.buffer && n.buffer instanceof ArrayBuffer
    }

    function s(n) {
        return "string" == typeof n
    }

    function c(n) {
        return "number" == typeof n
    }

    function a(n) {
        return void 0 === n
    }

    function l(n) {
        return null !== n && "object" == typeof n
    }

    function p(n) {
        return "[object Date]" === w.call(n)
    }

    function u(n) {
        return "[object File]" === w.call(n)
    }

    function x(n) {
        return "[object Blob]" === w.call(n)
    }

    function m(n) {
        return "[object Function]" === w.call(n)
    }

    function h(n) {
        return l(n) && m(n.pipe)
    }

    function d(n) {
        return "undefined" != typeof URLSearchParams && n instanceof URLSearchParams
    }

    function b(n) {
        return n.replace(/^\s*/, "").replace(/\s*$/, "")
    }

    function y() {
        return ("undefined" == typeof navigator || "ReactNative" !== navigator.product) && ("undefined" != typeof window && "undefined" != typeof document)
    }

    function g(n, e) {
        if (null !== n && void 0 !== n)
            if ("object" != typeof n && (n = [n]), o(n))
                for (var t = 0, i = n.length; t < i; t++) e.call(null, n[t], t, n);
            else
                for (var r in n) Object.prototype.hasOwnProperty.call(n, r) && e.call(null, n[r], r, n)
    }

    function v() {
        function n(n, t) {
            "object" == typeof e[t] && "object" == typeof n ? e[t] = v(e[t], n) : e[t] = n
        }
        for (var e = {}, t = 0, o = arguments.length; t < o; t++) g(arguments[t], n);
        return e
    }

    function z(n, e, t) {
        return g(e, function(e, o) {
            n[o] = t && "function" == typeof e ? E(e, t) : e
        }), n
    }
    var E = t(7),
        _ = t(37),
        w = Object.prototype.toString;
    n.exports = {
        isArray: o,
        isArrayBuffer: i,
        isBuffer: _,
        isFormData: r,
        isArrayBufferView: f,
        isString: s,
        isNumber: c,
        isObject: l,
        isUndefined: a,
        isDate: p,
        isFile: u,
        isBlob: x,
        isFunction: m,
        isStream: h,
        isURLSearchParams: d,
        isStandardBrowserEnv: y,
        forEach: g,
        merge: v,
        extend: z,
        trim: b
    }
}, , function(n, e) {
    function t() {
        throw new Error("setTimeout has not been defined")
    }

    function o() {
        throw new Error("clearTimeout has not been defined")
    }

    function i(n) {
        if (l === setTimeout) return setTimeout(n, 0);
        if ((l === t || !l) && setTimeout) return l = setTimeout, setTimeout(n, 0);
        try {
            return l(n, 0)
        } catch (e) {
            try {
                return l.call(null, n, 0)
            } catch (e) {
                return l.call(this, n, 0)
            }
        }
    }

    function r(n) {
        if (p === clearTimeout) return clearTimeout(n);
        if ((p === o || !p) && clearTimeout) return p = clearTimeout, clearTimeout(n);
        try {
            return p(n)
        } catch (e) {
            try {
                return p.call(null, n)
            } catch (e) {
                return p.call(this, n)
            }
        }
    }

    function f() {
        h && x && (h = !1, x.length ? m = x.concat(m) : d = -1, m.length && s())
    }

    function s() {
        if (!h) {
            var n = i(f);
            h = !0;
            for (var e = m.length; e;) {
                for (x = m, m = []; ++d < e;) x && x[d].run();
                d = -1, e = m.length
            }
            x = null, h = !1, r(n)
        }
    }

    function c(n, e) {
        this.fun = n, this.array = e
    }

    function a() {}
    var l, p, u = n.exports = {};
    ! function() {
        try {
            l = "function" == typeof setTimeout ? setTimeout : t
        } catch (n) {
            l = t
        }
        try {
            p = "function" == typeof clearTimeout ? clearTimeout : o
        } catch (n) {
            p = o
        }
    }();
    var x, m = [],
        h = !1,
        d = -1;
    u.nextTick = function(n) {
        var e = new Array(arguments.length - 1);
        if (arguments.length > 1)
            for (var t = 1; t < arguments.length; t++) e[t - 1] = arguments[t];
        m.push(new c(n, e)), 1 !== m.length || h || i(s)
    }, c.prototype.run = function() {
        this.fun.apply(null, this.array)
    }, u.title = "browser", u.browser = !0, u.env = {}, u.argv = [], u.version = "", u.versions = {}, u.on = a, u.addListener = a, u.once = a, u.off = a, u.removeListener = a, u.removeAllListeners = a, u.emit = a, u.prependListener = a, u.prependOnceListener = a, u.listeners = function(n) {
        return []
    }, u.binding = function(n) {
        throw new Error("process.binding is not supported")
    }, u.cwd = function() {
        return "/"
    }, u.chdir = function(n) {
        throw new Error("process.chdir is not supported")
    }, u.umask = function() {
        return 0
    }
}, function(n, e, t) {
    "use strict";

    function o(n, e) {
        if (!(n instanceof e)) throw new TypeError("Cannot call a class as a function")
    }
    var i = function() {
            function n(n, e) {
                for (var t = 0; t < e.length; t++) {
                    var o = e[t];
                    o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(n, o.key, o)
                }
            }
            return function(e, t, o) {
                return t && n(e.prototype, t), o && n(e, o), e
            }
        }(),
        r = {
            emitDelay: 10,
            strictMode: !1
        },
        f = function() {
            function n() {
                var e = arguments.length <= 0 || void 0 === arguments[0] ? r : arguments[0];
                o(this, n);
                var t = void 0,
                    i = void 0;
                t = e.hasOwnProperty("emitDelay") ? e.emitDelay : r.emitDelay, this._emitDelay = t, i = e.hasOwnProperty("strictMode") ? e.strictMode : r.strictMode, this._strictMode = i, this._listeners = {}, this.events = []
            }
            return i(n, [{
                key: "_addListenner",
                value: function(n, e, t) {
                    if ("function" != typeof e) throw TypeError("listener must be a function"); - 1 === this.events.indexOf(n) ? (this._listeners[n] = [{
                        once: t,
                        fn: e
                    }], this.events.push(n)) : this._listeners[n].push({
                        once: t,
                        fn: e
                    })
                }
            }, {
                key: "on",
                value: function(n, e) {
                    this._addListenner(n, e, !1)
                }
            }, {
                key: "once",
                value: function(n, e) {
                    this._addListenner(n, e, !0)
                }
            }, {
                key: "off",
                value: function(n, e) {
                    var t = this,
                        o = this.events.indexOf(n);
                    n && -1 !== o && (e ? function() {
                        var i = [],
                            r = t._listeners[n];
                        r.forEach(function(n, t) {
                            n.fn === e && i.unshift(t)
                        }), i.forEach(function(n) {
                            r.splice(n, 1)
                        }), r.length || (t.events.splice(o, 1), delete t._listeners[n])
                    }() : (delete this._listeners[n], this.events.splice(o, 1)))
                }
            }, {
                key: "_applyEvents",
                value: function(n, e) {
                    var t = this._listeners[n];
                    if (t && t.length) {
                        var o = [];
                        t.forEach(function(n, t) {
                            n.fn.apply(null, e), n.once && o.unshift(t)
                        }), o.forEach(function(n) {
                            t.splice(n, 1)
                        })
                    } else if (this._strictMode) throw "No listeners specified for event: " + n
                }
            }, {
                key: "emit",
                value: function(n) {
                    for (var e = this, t = arguments.length, o = Array(t > 1 ? t - 1 : 0), i = 1; i < t; i++) o[i - 1] = arguments[i];
                    this._emitDelay ? setTimeout(function() {
                        e._applyEvents.call(e, n, o)
                    }, this._emitDelay) : this._applyEvents(n, o)
                }
            }, {
                key: "emitSync",
                value: function(n) {
                    for (var e = arguments.length, t = Array(e > 1 ? e - 1 : 0), o = 1; o < e; o++) t[o - 1] = arguments[o];
                    this._applyEvents(n, t)
                }
            }, {
                key: "destroy",
                value: function() {
                    this._listeners = {}, this.events = []
                }
            }]), n
        }();
    n.exports = f
}, function(n, e) {
    function t(n, e) {
        var t = n[1] || "",
            i = n[3];
        if (!i) return t;
        if (e && "function" == typeof btoa) {
            var r = o(i);
            return [t].concat(i.sources.map(function(n) {
                return "/*# sourceURL=" + i.sourceRoot + n + " */"
            })).concat([r]).join("\n")
        }
        return [t].join("\n")
    }

    function o(n) {
        return "/*# sourceMappingURL=data:application/json;charset=utf-8;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(n)))) + " */"
    }
    n.exports = function(n) {
        var e = [];
        return e.toString = function() {
            return this.map(function(e) {
                var o = t(e, n);
                return e[2] ? "@media " + e[2] + "{" + o + "}" : o
            }).join("")
        }, e.i = function(n, t) {
            "string" == typeof n && (n = [
                [null, n, ""]
            ]);
            for (var o = {}, i = 0; i < this.length; i++) {
                var r = this[i][0];
                "number" == typeof r && (o[r] = !0)
            }
            for (i = 0; i < n.length; i++) {
                var f = n[i];
                "number" == typeof f[0] && o[f[0]] || (t && !f[2] ? f[2] = t : t && (f[2] = "(" + f[2] + ") and (" + t + ")"), e.push(f))
            }
        }, e
    }
}, function(n, e, t) {
    "use strict";
    (function(e) {
        function o(n, e) {
            !i.isUndefined(n) && i.isUndefined(n["Content-Type"]) && (n["Content-Type"] = e)
        }
        var i = t(0),
            r = t(39),
            f = {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            s = {
                adapter: function() {
                    var n;
                    return "undefined" != typeof XMLHttpRequest ? n = t(8) : void 0 !== e && (n = t(8)), n
                }(),
                transformRequest: [function(n, e) {
                    return r(e, "Content-Type"), i.isFormData(n) || i.isArrayBuffer(n) || i.isBuffer(n) || i.isStream(n) || i.isFile(n) || i.isBlob(n) ? n : i.isArrayBufferView(n) ? n.buffer : i.isURLSearchParams(n) ? (o(e, "application/x-www-form-urlencoded;charset=utf-8"), n.toString()) : i.isObject(n) ? (o(e, "application/json;charset=utf-8"), JSON.stringify(n)) : n
                }],
                transformResponse: [function(n) {
                    if ("string" == typeof n) try {
                        n = JSON.parse(n)
                    } catch (n) {}
                    return n
                }],
                timeout: 0,
                xsrfCookieName: "XSRF-TOKEN",
                xsrfHeaderName: "X-XSRF-TOKEN",
                maxContentLength: -1,
                validateStatus: function(n) {
                    return n >= 200 && n < 300
                }
            };
        s.headers = {
            common: {
                Accept: "application/json, text/plain, */*"
            }
        }, i.forEach(["delete", "get", "head"], function(n) {
            s.headers[n] = {}
        }), i.forEach(["post", "put", "patch"], function(n) {
            s.headers[n] = i.merge(f)
        }), n.exports = s
    }).call(e, t(2))
}, function(n, e, t) {
    (function(e) {
        function o(n) {
            return "object" == typeof n && null !== n
        }

        function i(n) {
            switch (Object.prototype.toString.call(n)) {
                case "[object Error]":
                case "[object Exception]":
                case "[object DOMException]":
                    return !0;
                default:
                    return n instanceof Error
            }
        }

        function r(n) {
            return "[object ErrorEvent]" === Object.prototype.toString.call(n)
        }

        function f(n) {
            return "[object DOMError]" === Object.prototype.toString.call(n)
        }

        function s(n) {
            return "[object DOMException]" === Object.prototype.toString.call(n)
        }

        function c(n) {
            return void 0 === n
        }

        function a(n) {
            return "function" == typeof n
        }

        function l(n) {
            return "[object Object]" === Object.prototype.toString.call(n)
        }

        function p(n) {
            return "[object String]" === Object.prototype.toString.call(n)
        }

        function u(n) {
            return "[object Array]" === Object.prototype.toString.call(n)
        }

        function x(n) {
            if (!l(n)) return !1;
            for (var e in n)
                if (n.hasOwnProperty(e)) return !1;
            return !0
        }

        function m() {
            try {
                return new ErrorEvent(""), !0
            } catch (n) {
                return !1
            }
        }

        function h() {
            try {
                return new DOMError(""), !0
            } catch (n) {
                return !1
            }
        }

        function d() {
            try {
                return new DOMException(""), !0
            } catch (n) {
                return !1
            }
        }

        function b() {
            if (!("fetch" in X)) return !1;
            try {
                return new Headers, new Request(""), new Response, !0
            } catch (n) {
                return !1
            }
        }

        function y() {
            if (!b()) return !1;
            try {
                return new Request("pickleRick", {
                    referrerPolicy: "origin"
                }), !0
            } catch (n) {
                return !1
            }
        }

        function g() {
            return "function" == typeof PromiseRejectionEvent
        }

        function v(n) {
            function e(e, t) {
                var o = n(e) || e;
                return t ? t(o) || o : o
            }
            return e
        }

        function z(n, e) {
            var t, o;
            if (c(n.length))
                for (t in n) k(n, t) && e.call(null, t, n[t]);
            else if (o = n.length)
                for (t = 0; t < o; t++) e.call(null, t, n[t])
        }

        function E(n, e) {
            return e ? (z(e, function(e, t) {
                n[e] = t
            }), n) : n
        }

        function _(n) {
            return !!Object.isFrozen && Object.isFrozen(n)
        }

        function w(n, e) {
            if ("number" != typeof e) throw new Error("2nd argument to `truncate` function should be a number");
            return "string" != typeof n || 0 === e ? n : n.length <= e ? n : n.substr(0, e) + "…"
        }

        function k(n, e) {
            return Object.prototype.hasOwnProperty.call(n, e)
        }

        function O(n) {
            for (var e, t = [], o = 0, i = n.length; o < i; o++) e = n[o], p(e) ? t.push(e.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1")) : e && e.source && t.push(e.source);
            return new RegExp(t.join("|"), "i")
        }

        function C(n) {
            var e = [];
            return z(n, function(n, t) {
                e.push(encodeURIComponent(n) + "=" + encodeURIComponent(t))
            }), e.join("&")
        }

        function F(n) {
            if ("string" != typeof n) return {};
            var e = n.match(/^(([^:\/?#]+):)?(\/\/([^\/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?$/),
                t = e[6] || "",
                o = e[8] || "";
            return {
                protocol: e[2],
                host: e[4],
                path: e[5],
                relative: e[5] + t + o
            }
        }

        function S() {
            var n = X.crypto || X.msCrypto;
            if (!c(n) && n.getRandomValues) {
                var e = new Uint16Array(8);
                n.getRandomValues(e), e[3] = 4095 & e[3] | 16384, e[4] = 16383 & e[4] | 32768;
                var t = function(n) {
                    for (var e = n.toString(16); e.length < 4;) e = "0" + e;
                    return e
                };
                return t(e[0]) + t(e[1]) + t(e[2]) + t(e[3]) + t(e[4]) + t(e[5]) + t(e[6]) + t(e[7])
            }
            return "xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx".replace(/[xy]/g, function(n) {
                var e = 16 * Math.random() | 0;
                return ("x" === n ? e : 3 & e | 8).toString(16)
            })
        }

        function A(n) {
            for (var e, t = [], o = 0, i = 0, r = " > ".length; n && o++ < 5 && !("html" === (e = j(n)) || o > 1 && i + t.length * r + e.length >= 80);) t.push(e), i += e.length, n = n.parentNode;
            return t.reverse().join(" > ")
        }

        function j(n) {
            var e, t, o, i, r, f = [];
            if (!n || !n.tagName) return "";
            if (f.push(n.tagName.toLowerCase()), n.id && f.push("#" + n.id), (e = n.className) && p(e))
                for (t = e.split(/\s+/), r = 0; r < t.length; r++) f.push("." + t[r]);
            var s = ["type", "name", "title", "alt"];
            for (r = 0; r < s.length; r++) o = s[r], (i = n.getAttribute(o)) && f.push("[" + o + '="' + i + '"]');
            return f.join("")
        }

        function D(n, e) {
            return !!(!!n ^ !!e)
        }

        function R(n, e) {
            return c(n) && c(e)
        }

        function T(n, e) {
            return !D(n, e) && (n = n.values[0], e = e.values[0], n.type === e.type && n.value === e.value && (!R(n.stacktrace, e.stacktrace) && M(n.stacktrace, e.stacktrace)))
        }

        function M(n, e) {
            if (D(n, e)) return !1;
            var t = n.frames,
                o = e.frames;
            if (void 0 === t || void 0 === o) return !1;
            if (t.length !== o.length) return !1;
            for (var i, r, f = 0; f < t.length; f++)
                if (i = t[f], r = o[f], i.filename !== r.filename || i.lineno !== r.lineno || i.colno !== r.colno || i.function !== r.function) return !1;
            return !0
        }

        function L(n, e, t, o) {
            if (null != n) {
                var i = n[e];
                n[e] = t(i), n[e].__raven__ = !0, n[e].__orig__ = i, o && o.push([n, e, i])
            }
        }

        function B(n, e) {
            if (!u(n)) return "";
            for (var t = [], o = 0; o < n.length; o++) try {
                t.push(String(n[o]))
            } catch (n) {
                t.push("[value cannot be serialized]")
            }
            return t.join(e)
        }

        function I(n) {
            return ~-encodeURI(n).split(/%..|./).length
        }

        function N(n) {
            return I(JSON.stringify(n))
        }

        function U(n) {
            if ("string" == typeof n) {
                return w(n, 40)
            }
            if ("number" == typeof n || "boolean" == typeof n || void 0 === n) return n;
            var e = Object.prototype.toString.call(n);
            return "[object Object]" === e ? "[Object]" : "[object Array]" === e ? "[Array]" : "[object Function]" === e ? n.name ? "[Function: " + n.name + "]" : "[Function]" : n
        }

        function P(n, e) {
            return 0 === e ? U(n) : l(n) ? Object.keys(n).reduce(function(t, o) {
                return t[o] = P(n[o], e - 1), t
            }, {}) : Array.isArray(n) ? n.map(function(n) {
                return P(n, e - 1)
            }) : U(n)
        }

        function q(n, e, t) {
            if (!l(n)) return n;
            e = "number" != typeof e ? J : e, t = "number" != typeof e ? K : t;
            var o = P(n, e);
            return N(Y(o)) > t ? q(n, e - 1) : o
        }

        function $(n, e) {
            if ("number" == typeof n || "string" == typeof n) return n.toString();
            if (!Array.isArray(n)) return "";
            if (n = n.filter(function(n) {
                    return "string" == typeof n
                }), 0 === n.length) return "[object has no keys]";
            if (e = "number" != typeof e ? W : e, n[0].length >= e) return n[0];
            for (var t = n.length; t > 0; t--) {
                var o = n.slice(0, t).join(", ");
                if (!(o.length > e)) return t === n.length ? o : o + "…"
            }
            return ""
        }

        function H(n, e) {
            function t(n) {
                return u(n) ? n.map(function(n) {
                    return t(n)
                }) : l(n) ? Object.keys(n).reduce(function(e, o) {
                    return i.test(o) ? e[o] = r : e[o] = t(n[o]), e
                }, {}) : n
            }
            if (!u(e) || u(e) && 0 === e.length) return n;
            var o, i = O(e),
                r = "********";
            try {
                o = JSON.parse(Y(n))
            } catch (e) {
                return n
            }
            return t(o)
        }
        var Y = t(12),
            X = "undefined" != typeof window ? window : void 0 !== e ? e : "undefined" != typeof self ? self : {},
            J = 3,
            K = 51200,
            W = 40;
        n.exports = {
            isObject: o,
            isError: i,
            isErrorEvent: r,
            isDOMError: f,
            isDOMException: s,
            isUndefined: c,
            isFunction: a,
            isPlainObject: l,
            isString: p,
            isArray: u,
            isEmptyObject: x,
            supportsErrorEvent: m,
            supportsDOMError: h,
            supportsDOMException: d,
            supportsFetch: b,
            supportsReferrerPolicy: y,
            supportsPromiseRejectionEvent: g,
            wrappedCallback: v,
            each: z,
            objectMerge: E,
            truncate: w,
            objectFrozen: _,
            hasKey: k,
            joinRegExp: O,
            urlencode: C,
            uuid4: S,
            htmlTreeAsString: A,
            htmlElementAsString: j,
            isSameException: T,
            isSameStacktrace: M,
            parseUrl: F,
            fill: L,
            safeJoin: B,
            serializeException: q,
            serializeKeysForMessage: $,
            sanitize: H
        }
    }).call(e, t(1))
}, function(n, e, t) {
    "use strict";
    n.exports = function(n, e) {
        return function() {
            for (var t = new Array(arguments.length), o = 0; o < t.length; o++) t[o] = arguments[o];
            return n.apply(e, t)
        }
    }
}, function(n, e, t) {
    "use strict";
    (function(e) {
        var o = t(0),
            i = t(40),
            r = t(42),
            f = t(43),
            s = t(44),
            c = t(9),
            a = "undefined" != typeof window && window.btoa && window.btoa.bind(window) || t(45);
        n.exports = function(n) {
            return new Promise(function(l, p) {
                var u = n.data,
                    x = n.headers;
                o.isFormData(u) && delete x["Content-Type"];
                var m = new XMLHttpRequest,
                    h = "onreadystatechange",
                    d = !1;
                if ("test" === e.env.NODE_ENV || "undefined" == typeof window || !window.XDomainRequest || "withCredentials" in m || s(n.url) || (m = new window.XDomainRequest, h = "onload", d = !0, m.onprogress = function() {}, m.ontimeout = function() {}), n.auth) {
                    var b = n.auth.username || "",
                        y = n.auth.password || "";
                    x.Authorization = "Basic " + a(b + ":" + y)
                }
                if (m.open(n.method.toUpperCase(), r(n.url, n.params, n.paramsSerializer), !0), m.timeout = n.timeout, m[h] = function() {
                        if (m && (4 === m.readyState || d) && (0 !== m.status || m.responseURL && 0 === m.responseURL.indexOf("file:"))) {
                            var e = "getAllResponseHeaders" in m ? f(m.getAllResponseHeaders()) : null,
                                t = n.responseType && "text" !== n.responseType ? m.response : m.responseText,
                                o = {
                                    data: t,
                                    status: 1223 === m.status ? 204 : m.status,
                                    statusText: 1223 === m.status ? "No Content" : m.statusText,
                                    headers: e,
                                    config: n,
                                    request: m
                                };
                            i(l, p, o), m = null
                        }
                    }, m.onerror = function() {
                        p(c("Network Error", n, null, m)), m = null
                    }, m.ontimeout = function() {
                        p(c("timeout of " + n.timeout + "ms exceeded", n, "ECONNABORTED", m)), m = null
                    }, o.isStandardBrowserEnv()) {
                    var g = t(46),
                        v = (n.withCredentials || s(n.url)) && n.xsrfCookieName ? g.read(n.xsrfCookieName) : void 0;
                    v && (x[n.xsrfHeaderName] = v)
                }
                if ("setRequestHeader" in m && o.forEach(x, function(n, e) {
                        void 0 === u && "content-type" === e.toLowerCase() ? delete x[e] : m.setRequestHeader(e, n)
                    }), n.withCredentials && (m.withCredentials = !0), n.responseType) try {
                    m.responseType = n.responseType
                } catch (e) {
                    if ("json" !== n.responseType) throw e
                }
                "function" == typeof n.onDownloadProgress && m.addEventListener("progress", n.onDownloadProgress), "function" == typeof n.onUploadProgress && m.upload && m.upload.addEventListener("progress", n.onUploadProgress), n.cancelToken && n.cancelToken.promise.then(function(n) {
                    m && (m.abort(), p(n), m = null)
                }), void 0 === u && (u = null), m.send(u)
            })
        }
    }).call(e, t(2))
}, function(n, e, t) {
    "use strict";
    var o = t(41);
    n.exports = function(n, e, t, i, r) {
        var f = new Error(n);
        return o(f, e, t, i, r)
    }
}, function(n, e, t) {
    "use strict";
    n.exports = function(n) {
        return !(!n || !n.__CANCEL__)
    }
}, function(n, e, t) {
    "use strict";

    function o(n) {
        this.message = n
    }
    o.prototype.toString = function() {
        return "Cancel" + (this.message ? ": " + this.message : "")
    }, o.prototype.__CANCEL__ = !0, n.exports = o
}, function(n, e) {
    function t(n, e) {
        for (var t = 0; t < n.length; ++t)
            if (n[t] === e) return t;
        return -1
    }

    function o(n, e, t, o) {
        return JSON.stringify(n, r(e, o), t)
    }

    function i(n) {
        var e = {
            stack: n.stack,
            message: n.message,
            name: n.name
        };
        for (var t in n) Object.prototype.hasOwnProperty.call(n, t) && (e[t] = n[t]);
        return e
    }

    function r(n, e) {
        var o = [],
            r = [];
        return null == e && (e = function(n, e) {
                return o[0] === e ? "[Circular ~]" : "[Circular ~." + r.slice(0, t(o, e)).join(".") + "]"
            }),
            function(f, s) {
                if (o.length > 0) {
                    var c = t(o, this);
                    ~c ? o.splice(c + 1) : o.push(this), ~c ? r.splice(c, 1 / 0, f) : r.push(f), ~t(o, s) && (s = e.call(this, f, s))
                } else o.push(s);
                return null == n ? s instanceof Error ? i(s) : s : n.call(this, f, s)
            }
    }
    e = n.exports = o, e.getSerialize = r
}, function(n, e, t) {
    "use strict";

    function o(n) {
        return n && n.__esModule ? n : {
            default: n
        }
    }

    function i(n, e) {
        if (!(n instanceof e)) throw new TypeError("Cannot call a class as a function")
    }
    Object.defineProperty(e, "__esModule", {
        value: !0
    });
    var r = function() {
            function n(n, e) {
                for (var t = 0; t < e.length; t++) {
                    var o = e[t];
                    o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(n, o.key, o)
                }
            }
            return function(e, t, o) {
                return t && n(e.prototype, t), o && n(e, o), e
            }
        }(),
        f = t(15),
        s = o(f),
        c = t(34),
        a = o(c),
        l = t(35),
        p = o(l),
        u = t(17),
        x = o(u),
        m = t(54),
        h = o(m),
        d = function() {
            function n() {
                i(this, n), this.oid = null, this.calculationMatrix = new s.default(this), this.quoteObject = new a.default(this), this.dynamicButtonset = new p.default(this), this.referral = new x.default, this.sanctions = new h.default
            }
            return r(n, [{
                key: "init",
                value: function() {
                    var n = this;
                    this.oid = $("#offer_oid").val(), this.calculationMatrix.init(), this.calculationMatrix.on("post-calculation", function() {
                        n.dynamicButtonset.reload(), n.referral.highlight()
                    }), this.calculationMatrix.on("before-calculation", function() {
                        n.referral.highlight(!1).resetMessages()
                    }), this.oid && ($.get("/referral-conditions/quote/" + this.oid + "/referrals").done(function(e) {
                        n.referral.addReferralMessages(e).highlight()
                    }), $.get("/sanctions/quote/" + this.oid).done(function(e) {
                        n.sanctions.setSanctions(e).display()
                    }))
                }
            }, {
                key: "createObject",
                value: function(n, e) {
                    var t = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null;
                    this.quoteObject.createObject(n, e, t)
                }
            }]), n
        }();
    e.default = d
}, function(n, e, t) {
    n.exports = t(36)
}, function(n, e, t) {
    "use strict";

    function o(n) {
        return n && n.__esModule ? n : {
            default: n
        }
    }

    function i(n, e) {
        if (!(n instanceof e)) throw new TypeError("Cannot call a class as a function")
    }

    function r(n, e) {
        if (!n) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        return !e || "object" != typeof e && "function" != typeof e ? n : e
    }

    function f(n, e) {
        if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function, not " + typeof e);
        n.prototype = Object.create(e && e.prototype, {
            constructor: {
                value: n,
                enumerable: !1,
                writable: !0,
                configurable: !0
            }
        }), e && (Object.setPrototypeOf ? Object.setPrototypeOf(n, e) : n.__proto__ = e)
    }
    Object.defineProperty(e, "__esModule", {
        value: !0
    });
    var s = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(n) {
            return typeof n
        } : function(n) {
            return n && "function" == typeof Symbol && n.constructor === Symbol && n !== Symbol.prototype ? "symbol" : typeof n
        },
        c = function() {
            function n(n, e) {
                for (var t = 0; t < e.length; t++) {
                    var o = e[t];
                    o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(n, o.key, o)


