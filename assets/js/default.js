$(function(){
    
    $('#lang').change(function(){
        var lang = $('#lang').val();
        if(lang === 'ES'){
            $('title').html('Bienvenido :D');
            $('#bienvenido').html('Bienvenido :D');
            $('#descripcion').html('Gracias por estar aquí en la página inicial del TvK Framework. \n\
                                    Esta es la versión 1.0, la primera que existe. \n\
                                    Lo puedes usar como gustes y pues, sólo eso... úsalo cuando quieras \n\
                                    (creo que esto debería ser gratis, pero no sé por qué si solo lo uso yo y nadie más). \n\
                                    Lo hice por aprender y también por diversión. \n\
                                    Así que, disfrútalo (si es que lo llegas a usar...) :D');
            $('#estas').html('Estás aquí :D');
            $('#copyrigth').html('&copy; 2014 - Creado por Johan Pineda :D');
        }
        if(lang === 'EN'){
            $('title').html('Welcome :D');
            $('#bienvenido').html('Welcome :D');
            $('#descripcion').html("Thanks for being here on the home page of TvK Framework. \n\
                                    This is version 1.0, the first that exists. \n\
                                    You can use it as you like and then just that ... use it whenever you want \n\
                                    (I think this should be free, but I don't know why if I only use it myself \n\
                                    and no one else). I did it for learning and for fun.\n\
                                    So, enjoy it! (if you get to use...) :D");
            $('#estas').html('You are here :D');
            $('#copyrigth').html('&copy; 2014 - Created by Johan Pineda :D');
        }        
        if(lang === 'DE'){
            $('title').html('Willkommen :D');
            $('#bienvenido').html('Willkommen :D');
            $('#descripcion').html("Danke, dass ihr hier auf der Homepage des TvK Framework. \n\
                                    Dies ist die Version 1.0, die erste, die es gibt. Sie können es verwenden, \n\
                                    wie Sie möchten, und dann nur, dass ... benutzen, wann immer Sie wollen \n\
                                    (ich denke, das sollte frei sein, aber ich weiß nicht, denn wenn ich es nur mich und \n\
                                    sonst niemand). Ich tat es für das Lernen und für Spaß. \n\
                                    Also, genießen Sie es! (wenn Sie zu bedienen...) :D");
            $('#estas').html('Sie sind hier :D');
            $('#copyrigth').html('&copy; 2014 - Erstellt von Johan Pineda :D');
        }
        if(lang === 'FR'){
            $('title').html('Accueil :D');
            $('#bienvenido').html('Accueil :D');
            $('#descripcion').html("Merci d'être ici sur la page d'accueil du cadre de TvK Framework. \n\
                                    C'est la version 1.0, la première qui existe. Vous pouvez l'utiliser comme vous \n\
                                    le souhaitez et puis juste que ... utiliser chaque fois que vous voulez (je pense \n\
                                    que cela devrait être gratuit, mais je ne sais pas parce que si je ne l'utilise que \n\
                                    moi-même et personne d'autre). Je l'ai fait pour l'apprentissage et pour le plaisir. \n\
                                    Alors, profitez-en! (si vous arrivez à utiliser...) :D");
            $('#estas').html('Vous êtes ici :D');
            $('#copyrigth').html('&copy; 2014 - Créé par Johan Pineda :D');
        }
        if(lang === 'IT'){
            $('title').html('Benvenuto :D');
            $('#bienvenido').html('Benvenuto :D');
            $('#descripcion').html("Grazie per essere qui sulla home page di TvK Framework. Questa è la versione 1.0, \n\
                                    la prima lì. Potete usarlo come ti piace e poi basta che ... usare ogni volta che \n\
                                    volete (credo che questo dovrebbe essere gratuito, ma non so perché se si utilizza solo \n\
                                    io e nessun altro). L'ho fatto per l'apprendimento e per divertimento. Così, godere \n\
                                    (se si arriva a usare...) :D");
            $('#estas').html('Tu sei qui :D');
            $('#copyrigth').html('&copy; 2014 - Creato da Johan Pineda :D');
        }
        if(lang === 'POR'){
            $('title').html('Bem-vindo :D');
            $('#bienvenido').html('Bem-vindo :D');
            $('#descripcion').html('Obrigado por estar aqui na home page da TVK Framework. Esta é a versão 1.0, o primeiro \n\
                                    lá. Você pode usá-lo como quiser e depois é só que ... usá-la sempre que quiser \n\
                                    (eu acho que isso deve ser livre, mas não sei porque, se você usá-lo apenas a mim mesmo \n\
                                    e mais ninguém). Eu fiz isso para aprender e para se divertir. Portanto, aproveite-lo \n\
                                    (se você começa a usar...) :D');
            $('#estas').html('Você está aqui :D');
            $('#copyrigth').html('&copy; 2014 - Criado por Johan Pineda :D');            
        }
        if(lang === '中国'){
            $('title').html('欢迎 :D');
            $('#bienvenido').html('欢迎 :D');
            $('#descripcion').html('感谢能在这里TvK 框架。这是1.0版，第一那里。你可以使用它，只要你喜欢，然后只是...使用它时，你想要的\n\
                                    （我想这应该是免费的，但不知道是因为如果你只使用它自己而不是别人）。我这么做是为了学习和乐趣。因此，享受它\n\
                                    （如果你使用......）:D');
            $('#estas').html('您现在的位置 :D');
            $('#copyrigth').html('&copy; 2014 - 创建者约翰·皮内达 :D');
        }
        if(lang === '日本'){
            $('title').html('歓迎 :D');
            $('#bienvenido').html('歓迎 :D');
            $('#descripcion').html('TVKフレームワークのホームページにここにいてくれてありがとうございます。これは、\n\
                                    存在していることを最初のバージョン1.0です。あなたが好きな、ちょうどそのように、あなたがそれを使用す\n\
                                    ることができます...あなたはそれを使用するたびに（私は、これは無料であるべきだと思いますが、私はそれ\n\
                                    を自分自身と他の誰を使用している場合ので、私は知りません）。私は楽しみのために、学習のためにそれをやった。\n\
                                    だから、それをお楽しみください！（あなたが使用して取得した場合···）:D');
            $('#estas').html('現在地 :D');
            $('#copyrigth').html('&copy; 2014 - ヨハン·ピネダによって作成された :D');
        }
        if(lang === '한국'){
            $('title').html('환영 :D');
            $('#bienvenido').html('환영 :D');
            $('#descripcion').html('TVK 프레임 워크의 홈 페이지에 여기있는을위한 감사합니다. 이 버전 1.0, 존재하는 첫 번째입니다. \n\
                                    당신이 좋아하고 그냥 당신이 그것을 사용할 수 있습니다 ... 당신이 원하는 때마다 (나는이 무료로해야한다고 \n\
                                    생각하지만, 나는 단지 그것을 자신과 또 다른 사람을 사용하면이 때문에 없음)를 사용합니다. 나는 학습과 \n\
                                    재미를 위해 그것을했다. 그래서, 그것을 즐길! (당신이 사용하는 얻는 경우에...) :D');
            $('#estas').html('현재 위치 :D');
            $('#copyrigth').html('&copy; 2014 - 요한 피네다에 의해 만들어진 :D');
        }
    });
    
});