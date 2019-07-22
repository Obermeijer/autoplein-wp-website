(function() {
     window.InlineShortcodeView_icontexttabs = window.InlineShortcodeView_vc_row.extend({
            render: function() {
                debugger;
                window.InlineShortcodeView_icontexttabs.__super__.render.call(this);
                [].slice.call(document.querySelectorAll('.tabs')).forEach(function(el) {
                    new CBPFWTabs(el);
                });
                return this;
            }

      });
     window.InlineShortcodeView_icontexttab = vc.shortcode_view.extend({
            render: function() {
                debugger;
                window.InlineShortcodeView_icontexttab.__super__.render.call(this);
                [].slice.call(document.querySelectorAll('.tabs')).forEach(function(el) {
                    new CBPFWTabs(el);
                });
                return this;
            }

      });
	
})();

