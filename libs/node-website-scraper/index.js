import scrape from "website-scraper"; // only as ESM, no CommonJS

const options = {
  urls: ["http://gamesforaliving.com/"],
  directory: "./out/",
};

// // with async/await
async function main() {
  const result = await scrape(options);
  console.log(result);
}

main();
// with promise
// scrape(options).then((result) => {
//   // eslint-disable-next-line no-console
//   console.log(result);
// });
