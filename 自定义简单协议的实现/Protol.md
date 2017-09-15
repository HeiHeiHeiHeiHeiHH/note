说明:
  1 客服端发送数据的报头  什么时候结束一次发送。
    以LHYJ#作为一数据包的其实。 结束以\r\n标记. 
    默认格式LHYJ#CTYPE#DATA\n\r\n;
    CTYPE：数据格式(json和序列化)  JSON 、 DPHP
    所以默认的最短数据包长度为13（数据data为空的情况）
  2 真实数据的解析 。 
    json_decode or unserialize 
  3 发送返回结果的加密数据。
    统一采用json编码发送数据
    格式 {data}\r\n 结束;