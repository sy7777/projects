const express = require("express");
const router = express.Router();
const userService = require("../dao/userdao")

router.post("/users/register", async (req, res) => {
    //结构化赋值，和body里面键名完全一致，便于赋值
    const { email, password } = req.body;
    if (!email || !password) {
        res.send({ "code": 402, "error": "username or password needed!" })

    } else {
        try {
            const results = await userService.insertUser(email, password);
            res.send({ code: 200, data: results });
        } catch (e) {
            res.send({ "code": 500, "error": e });
        }


    }
})
module.exports = router;