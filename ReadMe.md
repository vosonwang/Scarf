#更新日志
##2016-9-2
### 更新
1. 完成收货记录删除雏形

##2016-9-1
### 更新
1. 完成收获记录新增雏形

##2016-8-29
### 更新
1. 更新了数据模型，详见database/scarf_diagram.mwb
2. 新增了收货记录（完善ing)

##2016-8-25
### 更新
1. 序号固定方法更新为二分法，现在记录索引可以累加
2. 更新增加行输入框上键盘修饰符

## 2016-8-24
### 更新
1. 增加了发货记录的索引,固定了记录间的次序
2. 修复价格和条数不输入,保存金额会变成0

### bug
1. 选中多列,也可以点增加按钮,进行插入
2. 记录索引没能累加


### improve
1. 修改Vue键盘修饰符
2. 加入一个消息功能

## 2016-8-22
### 更新
1. 优化了插入部分的js,为用户输入加入了新的过滤器
2. 第二次新增行,用户之前的信息会先保存

## 2016-8-20
### 更新
1. 新增发货记录批量删除功能
2. 添加新的行之前如果有没保存的数据会提示先保存

## 2016-8-19
### imporve
1. 增加的行数没用完也会提示请输入...,应该直接保存去掉没填的行
2. 打开增加行模态框时需要聚焦到input框上
3. 将页面刷新优化为ajax取数据

## 2016-8-18
### 更新
1. 调整了input.insertRows的类为col-xs，解决手机端input框和按钮无法并列的问题
2. 修复了16081701，如果没添加数据，按保存会提示请先增加记录
3. 修改了选中行的背景色样式和文字样式
4. 给输入行数的input框，添加一个回车即等同按下按钮的事件


## 2016-8-17
### 更新
1. 修改了增加行的逻辑
2. 修复了取消选中行后,点击删除会删除数据的bug
3. 修改了选中行的背景色样式
4. 修改modelview文件夹名为ViewModel

### bug
1. 在没添加行之前，保存按钮仍然可用。


## 2016-8-16
###更新
1. 增加了批量添加功能


## 2016-8-15
###更新
1. 增加了favicon

## 2016-8-14
### 更新
1. 增加了删除前选中行的样式变化效果

### bug
1. 如果空提交,会502 Bad Way。--虽然现在js阻止了空提交。


