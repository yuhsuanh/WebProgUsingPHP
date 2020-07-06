<footer>
    <small>&copy; 2020 | Intro to Web Programming | Yu-Hsuan Huang</small>
    <div id="plemx-root"></div>
</footer>


<!--Here include JavaScript such as JQuery, bootstrap or others... -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Weather Widget -->
<script type="text/javascript">
    var _plm = _plm || [];
    _plm.push(['_btn', 124047]);
    _plm.push(['_loc','twxx0021']);
    _plm.push(['location', document.location.host ]);
    (function(d,e,i) {
        if (d.getElementById(i)) return;
        var px = d.createElement(e);
        px.type = 'text/javascript';
        px.async = true;
        px.id = i;
        px.src = ('https:' == d.location.protocol ? 'https:' : 'http:') + '//widget.twnmm.com/js/btn/pelm.js?orig=en_ca';
        var s = d.getElementsByTagName('script')[0];

        var py = d.createElement('link');
        py.rel = 'stylesheet'
        py.href = ('https:' == d.location.protocol ? 'https:' : 'http:') + '//widget.twnmm.com/styles/btn/styles.css'

        s.parentNode.insertBefore(px, s);
        s.parentNode.insertBefore(py, s);
    })(document, 'script', 'plmxbtn');
</script>

</body>
</html>