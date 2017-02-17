{meta_html bodyattr array('class'=>'')}
<div id="wrapper">
    {$NAV}
    {$HEADER}
    {$MAIN}
</div>
<div class="modal inmodal" id="remoteModal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="remoteModal">
</div>

{literal}
    <script type="text/javascript">
        // clear date
        function clearDate(_this)
        {
            $(_this).closest(".form-group").find("input").val("");
            return false;
        }
    </script>
{/literal}