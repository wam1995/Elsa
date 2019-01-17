<?php
    /**
     * The template for comments on emoji 
     * 
     * @author Maine <maine@cainiaofly.com>
     * @license GPL-3.0
     */
?>
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
    function grin(tag) {
        var myField;
        tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
            myField = document.getElementById('comment');
        } else {
            return false;
        }
        if (document.selection) {
            myField.focus();
            sel = document.selection.createRange();
            sel.text = tag;
            myField.focus();
        }
        else if (myField.selectionStart || myField.selectionStart == '0') {
            var startPos = myField.selectionStart;
            var endPos = myField.selectionEnd;
            var cursorPos = endPos;
            myField.value = myField.value.substring(0, startPos)
                          + tag
                          + myField.value.substring(endPos, myField.value.length);
            cursorPos += tag.length;
            myField.focus();
            myField.selectionStart = cursorPos;
            myField.selectionEnd = cursorPos;
        }
        else {
            myField.value += tag;
            myField.focus();
        }
    }
/* ]]> */
</script>
<?php $smilies = '
<a href="javascript:grin(\':razz:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/razz.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':evil:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/evil.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':exclaim:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/exclaim.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':smile:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/smile.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':redface:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/redface.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':biggrin:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/biggrin.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':surprised:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/surprised.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':eek:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/eek.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':confused:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/confused.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':idea:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/idea.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':lol:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/lol.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':mad:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/mad.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':twisted:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/twisted.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':rolleyes:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/rolleyes.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':wink:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/wink.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':cool:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/cool.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':arrow:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/arrow.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':neutral:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/neutral.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':cry:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/cry.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':mrgreen:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/mrgreen.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':drooling:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/drooling.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':cowboy:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/cowboy.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':persevering:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/persevering.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':symbols:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/symbols.png" alt="" class="size-smiley"/></a>
<a href="javascript:grin(\':shit:\')"><img src="'.get_bloginfo("template_url").'/images/emoji/shit.png" alt="" class="size-smiley"/></a>
'?>