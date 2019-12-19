const express = require("express");
const app = express();
const crud = require("../nodeMysql/CRUD");
const cors = require("cors");
const bodyParser = require("body-parser");
const userRouter = require("./routers/users");
// 使用跨域中间件
app.use(cors());
app.use(bodyParser.json());
app.use("/", userRouter);

//全局拦截器,中间键都用APP.use
app.use("/all_students", (req, res, next) => {
    const token = req.headers.token;
    if (token) {
        console.log(`Token为: ${token}`);
        next();
    } else {
        res.send({ "code": 403, "error": "请先登录" });
    }
});

// GET API
// get()的第一个参数是访问途径，：占位符
app.get("/all_students/:id", (req, res, next) => {
    console.log(req);
    const key = req.headers.key;
    if (key) {
        console.log(`Key为: ${key}`);
        next();
    } else {
        res.send({ "code": 402, "error": "请先登录" });
    }
}, async (req, res) => {
    const id = req.params.id;
    const name = req.query.name;
    try {
        const students = await crud.select();
        res.send({ "code": 200, "data": students });
    } catch (e) {
        res.send({ "code": 500, "error": e });
    }
});

//增加信息到数据库
app.post("/register", async (req, res) => {
    const student = req.body;
    const message = "Insert success";
    if (!student) {
        res.send({ "code": 400, "error": "No student given." });
    } else {
        if(!student.age || !student.name){
            res.send({ "code": 400, "error": "Name and age can not be null." });
        }else{
            try {
                const result = await crud.insert(student.name, student.age);
                res.send({ "code": 200, message, "data": result });
            } catch (e) {
                res.send({ "code": 500, "error": e });
            }
        }
        
    }

});



app.listen(8080, () => {
    console.log("Server is running on 8080...");
});