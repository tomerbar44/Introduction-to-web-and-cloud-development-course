const url =
    'https://api.taboola.com/1.2/json/apitestaccount/recommendations.get?app.type=web&app.apikey=7be65fc78e52c11727793f68b06d782cff9ede3c&source.id=/digiday-publishing-summit/&source.url=https%3A//blog.taboola.com/digiday-publishing-summit/&source.type=text&placement.organic-type=mix&placement.visible=true&placement.available=true&placement.rec-count=6&placement.name=BelowArticleThumbnails&placement.thumbnail.width=640&placement.thumbnail.height=480&user.session=init';

const container = document.getElementById('list');

async function fetchData() {
    const res = await fetch(url);
    const data = await res.json();
    drawItems(data.list, container);
}

function drawItems(items, target) {
    for (let item of items) {
        console.log('item', item);
        console.log(decodeURIComponent(item.thumbnail[0].url));
        const itemDiv = `
         <div class='item'>
		 <a href="${item.url}"><img src="${decodeURIComponent(item.thumbnail[0].url)}"/></a>
		 <p class='desc'> <a href="${item.url}">${item.description || ''}</a></p>
            <p class='category'> ${item.categories.join()} </p>
            <a class='branding' href="${item.url}"> ${item.branding} </a>
         </div>
      `;
        container.innerHTML += itemDiv;
    }
}

function init() {
    fetchData();
}

init();