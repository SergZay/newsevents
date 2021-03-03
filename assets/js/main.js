// Filter Ajax
function postData(url, postData, onSuccess, onError) {
    var data = new FormData();
    var xml = new XMLHttpRequest();

    for (const [key, value] of Object.entries(postData)) {
        data.append(key, value);
    }

    xml.onreadystatechange = function () {
        if (xml.readyState == 4) {
            switch (xml.status) {
                case 200:
                    onSuccess(xml);
                    break;
                default:
                    onError(xml);
            }
        }
    }

    xml.open("POST", url, false);
    xml.send(data);
}

let categoryNews = document.querySelectorAll(".menu-news a");
if (categoryNews != null) {
    categoryNews.forEach(function (item) {
        item.addEventListener("click", function (e) {
            e.preventDefault();

            document.querySelector(".menu-news a.current").classList.remove('current');
            item.classList.add('current');
            console.log(item.getAttribute('href'));
            let idTaxonomy = item.getAttribute('href');

            postData(MyAjax.ajaxurl, {
                action: 'filter_news',
                category: idTaxonomy
            }, function (xml) {
                var obj = xml.responseText;
                document.querySelector(".news__wrapper .row").innerHTML = '';
                document.querySelector(".news__wrapper .row").innerHTML = obj;
            }, function () {

            });
        });
    });
}

let categoryEvents = document.querySelector('.news-select');
if (categoryEvents != null) {
    categoryEvents.addEventListener('change', function () {
        console.log('You selected: ', this.value);

        postData(MyAjax.ajaxurl, {
            action: 'filter_events',
            category: this.value
        }, function (xml) {
            var obj = xml.responseText;
            document.querySelector(".news__wrapper--events .row").innerHTML = '';
            document.querySelector(".news__wrapper--events .row").innerHTML = obj;
        }, function () {

        });

    });
}