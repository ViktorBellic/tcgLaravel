var url = 'http://127.0.0.1:8000';
window.addEventListener('load', function(){

    $('#btn-like').css('cursor','pointer');
    $('#btn-dislike').css('cursor','pointer');

    //boton de like
    function like(){
        $('#btn-like').unbind('click').click(function(){
            console.log('like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src',url+'/img/redHeart.png');
            var url1 = url+'/like/'+$(this).data('id');
            $.ajax({
                url: url1,
                type: 'GET',
                success: function(response){
                    console.log(response);
                    if(response.like){
                       console.log('Has dado like a la publicacion');
                    }else{
                        console.log('Error al dar like');
                    }
                }
            });
            dislike();
        });
    }
    like();
    //boton de dislike
    function dislike(){
        $('.btn-dislike').unbind('click').click(function(){
            console.log('dislike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src',url+'/img/greyHeart.png');
            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    console.log(response);
                    if(response.like){
                       console.log('Has dado dislike a la publicacion');
                    }else{
                        console.log('Error al dar like');
                    }

                }
            });
            like();
        });
    }
    dislike();

    //buscador
    $('#buscador').submit(function(e){

        $(this).attr('action',url+'/gente/'+$('#buscador #search').val());

    });
});
