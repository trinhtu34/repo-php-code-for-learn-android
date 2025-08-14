# Cấu trúc API

http://13.213.63.200/ Tên folder / api.php
example : http://13.213.63.200/wssach_object/api.php
http://13.213.63.200/wssach_object/api.php?action=getds

# Đề 1

đăng nhập và lấy thông tin hàng hóa
Login dùng POST , gethanghoa dùng get

# Đề 2

đăng nhập và lấy thông tin sách
login dùng POST , getsach dùng GET
getsachnew dùng GET nhưng sẽ có lấy tất cả thông tin nếu không truyền dữ liệu vào Parameters

# Đề 3

đăng nhập và lấy thông tin sách
login dùng GET , getsach dùng POST
getsachnew dùng POST nhưng khác với getsach ở chỗ là getsach phải truyền Params vào là tên tác giả thì mới có data trả về .

# lab 8

## ARRAY

### wssach

api tất cả dùng GET trả về array
| Key |value |
|------|------|
| user | admin|
| pass | abcd |

### wssach_post

api tất cả dùng POST trả về array
| key | value |
|-----------|----------|
| username | host |
| password | 123 |

## OBJECT

### wwsach_object

api dùng GET trả về object
| Key | value |
|-----------|----------|
| user | admin |
| pass | abcd |

### wssach_post_object

api dùng POST trả về object
| key | value |
|-----------|----------|
| username | host |
| password | 123 |

### nhanvienapi_array và nhanvienapi_object

_2 api này chỉ khác nhau kiểu dữ liệu trả về thôi , còn api thì y hệt_
login GET
| Key | value |
|-----------|----------|
| user | admin |
| pass | abcd |

login POST
| key | value |
|----------|------|
| username | host |
| password | 123 |


'''
http://13.213.63.200/nhanvienapi_array/api_get.php?action=getall
'''

'''
http://13.213.63.200/nhanvienapi_array/api_post.php
'''

'''
http://13.213.63.200/nhanvienapi_array/login_get.php?user=admin&pass=abcd
'''

'''
http://13.213.63.200/nhanvienapi_array/login_post.php
'''

'''
http://13.213.63.200/nhanvienapi_array/api_get.php?action=add&tennv=tutrinh&luongcb=69
'''

'''
http://13.213.63.200/nhanvienapi_array/api_get.php?action=remove&manv=1
'''

'''
http://13.213.63.200/nhanvienapi_array/api_get.php?action=update&manv=1&tennv=tutrinhngoc&luongcb=96
'''
