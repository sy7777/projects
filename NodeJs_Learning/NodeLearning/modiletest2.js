const {hello, test} = require("./moduletest1");

console.log(hello.key1 === undefined);
console.log(hello["key2"]);