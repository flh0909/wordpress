/**
 * Created by Administrator on 2015/7/25.
 */

+(function($){
    $(document).ready(function(){

        if( $('.bdsharebuttonbox').length ){
            if( $('.article-content').length ) $('.article-content img').attr('data-tag', 'bdshare')


            window._bd_share_config={
                "common":{
                    "bdSnsKey":{
                        "tqq":_deel.appkey.tqq || null,
                        "tsina":_deel.appkey.tsina || null,
                        "t163":_deel.appkey.t163 || null,
                        "tsohu":_deel.appkey.tsohu || null,
                    },
                    "bdText":"",
                    "bdMini":"2",
                    "bdMiniList":false,
                    "bdPic":"",
                    "bdStyle":"1",
                    "bdSize":"16"
                },
                "share":{},
                "image":{
                    tag: 'bdshare',
                    "viewList":["qzone","tsina","tqq","renren","weixin"],
                    "viewText":" ",
                    "viewSize":"16"
                }/*,
                 "selectShare":{
                 "bdContainerClass":'article-content',
                 "bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]
                 }*/
            };


            with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
        }


        // lazy avatar
        $('.content .avatar, .sidebar .avatar, .pagecontent .avatar').lazyload({
            placeholder: _deel.url+'/img/default.png',
            event: 'scrollstop'
        });

        $('.wp-smiley').lazyload({
            placeholder: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC',
            event: 'scrollstop'
        });

        if( _deel.ajaxpager ){
            // next page
            $.ias({
                thresholdMargin: -100,
                triggerPageThreshold: 5,
                history: false,
                container : '.content',
                item: '.excerpt',
                pagination: '.pagination',
                next: '.next-page a',
                loader: '<div class="pagination-loading">数据载入中...</div>',
                trigger: '下一页',
                onPageChange: function(pageNum, pageUrl, scrollOffset) {
                    window._gaq && window._gaq.push(['_trackPageview', jQuery('<a/>').attr('href',pageUrl)[0].pathname.replace(/^[^\/]/,'/')]);
                }
            });
        }


        window.prettyPrint && window.prettyPrint()

        /* components
         * ====================================================
         */
        if( $('.article-content').length ) $('.article-content a').tooltip({container: 'body'})

        if( $('.d_reader').length ) $('.d_reader a').tooltip({container: 'body'})

        if( $('.d_slidebanner').length ) $('.d_slidebanner').each(function(){ $(this).iSlider()})

        if( $('.readers').length ) $('.readers .avatar').parent().tooltip({container: 'body'})

        $('.article-content').removeAttr('height')


        /* sidebar scroll !ie6
         * ====================================================
         */
        if( !is_ie6() && $('.sidebar').length ){
            var rollbox = $('.sidebar .widget'), rolllen = rollbox.length;
            if( rolllen && 0<_deel.roll[0]<=rolllen && 0<_deel.roll[1]<=rolllen ){
                $(window).scroll(function(){
                    var roll = document.documentElement.scrollTop+document.body.scrollTop;
                    if( roll>rollbox.eq(rolllen-1).offset().top+rollbox.eq(rolllen-1).height() ){
                        if( $('.widgetRoller').length==0 ){
                            rollbox.parent().append( '<div class="widgetRoller"></div>' );
                            rollbox.eq(_deel.roll[0]-1).clone().appendTo('.widgetRoller');
                            if( _deel.roll[0]!==_deel.roll[1] )
                                rollbox.eq(_deel.roll[1]-1).clone().appendTo('.widgetRoller')
                            var toper = 10;
                            if($('.navbar-wrap').css('position')=='fixed') toper = 42;
                            $('.widgetRoller').css({position:'fixed',top:toper,zIndex:0,width:360});
                        }else{
                            $('.widgetRoller').fadeIn(300);
                        }
                    }else{
                        $('.widgetRoller').hide();
                    }
                })
            }

            $(window).scroll(function(){
                var scroller = $('.rollto');
                document.documentElement.scrollTop+document.body.scrollTop>200?scroller.fadeIn():scroller.fadeOut();
            })
        }

        /* nav for tablet and phone
         * ====================================================
         */
        $('.navbar .nav:first').after('<div class="screen-mini"><button data-type="screen-nav" class="btn btn-inverse screen-nav"><i class="icon-tasks icon-white"></i></button></div>')


        /* append body code
         * ====================================================
         */
        $('body').append('<div class="modal hide fade" id="feed" tabindex="-1" style="width:400px;margin-left:-200px;"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h3>订阅'+_deel.name+'</h3></div><div class="modal-body"><p><strong>订阅地址</strong><br><input type="text" class="input-block-level" value="'+_deel.rss+'" readonly=""></p>'+(_deel.maillist?'<p><form class="subscribe-mail" action="http://list.qq.com/cgi-bin/qf_compose_send" target="_blank" method="post"><input type="hidden" name="t" value="qf_booked_feedback"><input type="hidden" name="id" value="'+_deel.maillistCode+'"><strong>邮件订阅</strong><br><div class="form-inline clearfix"><input class="pull-left" style="width:300px;" id="to" name="to" type="email" placeholder="a@b.com"><input class="btn btn-primary pull-right" style="width:51px;" type="submit" value="订阅"></div></form></p>':'')+'</div></div><div class="rollto"><button class="btn " data-type="totop" title="返回顶部">返回<br/>顶部</button>'+(_deel.commenton?'<button class="btn " data-type="torespond" title="发表评论">发表<br/>评论</button>':'')+'</div>')


        /* after feed show
         * ====================================================
         */
        $('#feed').on('shown', function(){
            $('#feed input:first').select()
        })


        /* event click
         * ====================================================
         */
        $(document).on('click', function(e){
            e = e || window.event;
            var target = e.target || e.srcElement, _ta = $(target)

            if( _ta.hasClass('disabled') ) return
            if( _ta.parent().attr('data-type') ) _ta = $(_ta.parent()[0])
            if( _ta.parent().parent().attr('data-type') ) _ta = $(_ta.parent().parent()[0])

            var type = _ta.attr('data-type')

            switch( type ){
                case 'screen-nav':
                    var el = $('.navbar .nav'), so = $('.navbar .nav')

                    el.toggleClass('active')
                    so.slideToggle(300)

                    break; case 'totop':
                scrollTo()

                break; case 'torespond':
                //scrollTo('#respond')
                scrollTo('.ds-replybox')
                //$('#comment').focus()
                $('.ds-textarea-wrapper textarea').focus()

                case 'comment-insert-smilie':
                    if( !$('#comment-smilies').length ){
                        $('#commentform .comt-box').append('<div id="comment-smilies" class="hide"></div>')
                        var res = ''
                        for( key in options.smilies ){
                            res += '<img data-simle="'+key+'" data-type="comment-smilie" src="'+_deel.url+'/img/smilies/icon_'+options.smilies[key]+'.gif">'
                        }
                        $('#comment-smilies').html( res )
                    }
                    $('#comment-smilies').slideToggle(100)


                    break; case 'comment-smilie':
                grin( _ta.attr('data-simle') )
                _ta.parent().slideUp(300)

                break; case 'switch-author':
                $('.comt-comterinfo').slideToggle(300);
                $('#author').focus();


                break;
            }
        })


        /* comment
         * ====================================================
         */
        var options = {
            smilies: {
                'mrgreen': 'mrgreen',
                'razz': 'razz',
                'sad': 'sad',
                'smile': 'smile',
                'oops': 'redface',
                'grin': 'biggrin',
                'eek': 'surprised',
                '???': 'confused',
                'cool': 'cool',
                'lol': 'lol',
                'mad': 'mad',
                'twisted': 'twisted',
                'roll': 'rolleyes',
                'wink': 'wink',
                'idea': 'idea',
                'arrow': 'arrow',
                'neutral': 'neutral',
                'cry': 'cry',
                '?': 'question',
                'evil': 'evil',
                'shock': 'eek',
                '!': 'exclaim'
            }
        }

        $('.commentlist .url').attr('target','_blank')

        $('#comment-author-info p input').focus(function() {
            $(this).parent('p').addClass('on')
        })
        $('#comment-author-info p input').blur(function() {
            $(this).parent('p').removeClass('on')
        })

        $('#comment').focus(function(){
            if( $('#author').val()=='' || $('#email').val()=='' ) $('.comt-comterinfo').slideDown(300)
        })

        var edit_mode = '0',
            txt1 = '<div class="comt-tip comt-loading">正在提交, 请稍候...</div>',
            txt2 = '<div class="comt-tip comt-error">#</div>',
            txt3 = '">提交成功',
            cancel_edit = '取消编辑',
            edit,
            num = 1,
            comm_array = [];
        comm_array.push('');

        $comments = $('#comments-title');
        $cancel = $('#cancel-comment-reply-link');
        cancel_text = $cancel.text();
        $submit = $('#commentform #submit');
        $submit.attr('disabled', false);
        $('.comt-tips').append(txt1 + txt2);
        $('.comt-loading').hide();
        $('.comt-error').hide();
        $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
        $('#commentform').submit(function() {
            $('.comt-loading').show();
            $submit.attr('disabled', true).fadeTo('slow', 0.5);
            if (edit) $('#comment').after('<input type="text" name="edit_id" id="edit_id" value="' + edit + '" style="display:none;" />');
            $.ajax({
                url: _deel.url+'/ajax/comment.php',
                data: $(this).serialize(),
                type: $(this).attr('method'),
                error: function(request) {
                    $('.comt-loading').hide();
                    $('.comt-error').show().html(request.responseText);
                    setTimeout(function() {
                            $submit.attr('disabled', false).fadeTo('slow', 1);
                            $('.comt-error').fadeOut()
                        },
                        3000)
                },
                success: function(data) {
                    $('.comt-loading').hide();
                    comm_array.push($('#comment').val());
                    $('textarea').each(function() {
                        this.value = ''
                    });
                    var t = addComment,
                        cancel = t.I('cancel-comment-reply-link'),
                        temp = t.I('wp-temp-form-div'),
                        respond = t.I(t.respondId),
                        post = t.I('comment_post_ID').value,
                        parent = t.I('comment_parent').value;
                    if (!edit && $comments.length) {
                        n = parseInt($comments.text().match(/\d+/));
                        $comments.text($comments.text().replace(n, n + 1))
                    }
                    new_htm = '" id="new_comm_' + num + '"></';
                    new_htm = (parent == '0') ? ('\n<ol style="clear:both;" class="commentlist commentnew' + new_htm + 'ol>') : ('\n<ul class="children' + new_htm + 'ul>');
                    ok_htm = '\n<span id="success_' + num + txt3;
                    ok_htm += '</span><span></span>\n';

                    if( parent == '0' ){
                        if( $('#postcomments .commentlist').length ){
                            $('#postcomments .commentlist').before(new_htm);
                        }else{
                            $('#respond').after(new_htm);
                        }
                    }else{
                        $('#respond').after(new_htm);
                    }

                    $('#comment-author-info').slideUp()

                    console.log( $('#new_comm_' + num) )
                    $('#new_comm_' + num).hide().append(data);
                    $('#new_comm_' + num + ' li').append(ok_htm);
                    $('#new_comm_' + num).fadeIn(4000);
                    $body.animate({
                            scrollTop: $('#new_comm_' + num).offset().top - 200
                        },
                        500);
                    $('.comt-avatar .avatar').attr('src',$('.commentnew .avatar:last').attr('src'));
                    countdown();
                    num++;
                    edit = '';
                    $('*').remove('#edit_id');
                    cancel.style.display = 'none';
                    cancel.onclick = null;
                    t.I('comment_parent').value = '0';
                    if (temp && respond) {
                        temp.parentNode.insertBefore(respond, temp);
                        temp.parentNode.removeChild(temp)
                    }
                }
            });
            return false
        });
        addComment = {
            moveForm: function(commId, parentId, respondId, postId, num) {
                var t = this,
                    div, comm = t.I(commId),
                    respond = t.I(respondId),
                    cancel = t.I('cancel-comment-reply-link'),
                    parent = t.I('comment_parent'),
                    post = t.I('comment_post_ID');
                if (edit) exit_prev_edit();
                num ? (t.I('comment').value = comm_array[num], edit = t.I('new_comm_' + num).innerHTML.match(/(comment-)(\d+)/)[2], $new_sucs = $('#success_' + num), $new_sucs.hide(), $new_comm = $('#new_comm_' + num), $new_comm.hide(), $cancel.text(cancel_edit)) : $cancel.text(cancel_text);
                t.respondId = respondId;
                postId = postId || false;
                if (!t.I('wp-temp-form-div')) {
                    div = document.createElement('div');
                    div.id = 'wp-temp-form-div';
                    div.style.display = 'none';
                    respond.parentNode.insertBefore(div, respond)
                } ! comm ? (temp = t.I('wp-temp-form-div'), t.I('comment_parent').value = '0', temp.parentNode.insertBefore(respond, temp), temp.parentNode.removeChild(temp)) : comm.parentNode.insertBefore(respond, comm.nextSibling);
                $body.animate({
                        scrollTop: $('#respond').offset().top - 180
                    },
                    400);
                if (post && postId) post.value = postId;
                parent.value = parentId;
                cancel.style.display = '';
                cancel.onclick = function() {
                    if (edit) exit_prev_edit();
                    var t = addComment,
                        temp = t.I('wp-temp-form-div'),
                        respond = t.I(t.respondId);
                    t.I('comment_parent').value = '0';
                    if (temp && respond) {
                        temp.parentNode.insertBefore(respond, temp);
                        temp.parentNode.removeChild(temp)
                    }
                    this.style.display = 'none';
                    this.onclick = null;
                    return false
                };
                try {
                    t.I('comment').focus()
                } catch(e) {}
                return false
            },
            I: function(e) {
                return document.getElementById(e)
            }
        };
        function exit_prev_edit() {
            $new_comm.show();
            $new_sucs.show();
            $('textarea').each(function() {
                this.value = ''
            });
            edit = ''
        }
        var wait = 15,
            submit_val = $submit.val();
        function countdown() {
            if (wait > 0) {
                $submit.val(wait);
                wait--;
                setTimeout(countdown, 1000)
            } else {
                $submit.val(submit_val).attr('disabled', false).fadeTo('slow', 1);
                wait = 15
            }
        }


        /* functions
         * ====================================================
         */
        function scrollTo(name, speed){
            if( !speed ) speed = 300
            if( !name ){
                $('html,body').animate({scrollTop: 0},speed)
            }else{
                if( $(name).length>0 ){
                    $('html,body').animate({scrollTop: $(name).offset().top},speed)
                }
            }
        }

        function is_ie6() {
            if ($.browser.msie) {
                if ($.browser.version == "6.0") return true;
            }
            return false;
        }

        function grin(tag) {
            tag = ' :' + tag + ': ';
            myField = document.getElementById('comment');
            document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : insertTag(tag)
        }

        function insertTag(tag) {
            myField = document.getElementById('comment');
            myField.selectionStart || myField.selectionStart == '0' ? (startPos = myField.selectionStart, endPos = myField.selectionEnd, cursorPos = startPos, myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length), cursorPos += tag.length, myField.focus(), myField.selectionStart = cursorPos, myField.selectionEnd = cursorPos) : (myField.value += tag, myField.focus())
        }

    })
})(window.jQuery);