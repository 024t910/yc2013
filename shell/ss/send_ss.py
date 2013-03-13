#! /usr/bin/python
# -*- encoding: utf-8 -*-

import urllib
import urllib2
import random
import os.path
import StringIO
import os

#boundary用に文字列を指定
boundary = '-----------hogehoge'

#右列を更新する場合はright、左列を更新する場合はleftを指定
side = 'right'


filename = os.environ['HOME']+'/ss/capture.png';
s = StringIO.StringIO()
s.write('--%s\r\n' % boundary)
s.write('Content-Disposition: form-data; name="image"; filename="%s"\r\n' % (os.path.split(filename)[1]))
s.write('Content-Type: application/octet-stream\r\n')
s.write('\r\n')

f = open(filename , 'rb').read()
s.write(f)
s.write('\r\n')
s.write('--%s\r\n' % boundary)
s.write('Content-Disposition: form-data; name="side"\r\n')
s.write('\r\n')
s.write('%s\r\n' % side)
s.write('--%s--\r\n' % boundary)
data = s.getvalue()

#update_ss.phpをアップした場所をリクエスト先に指定
req = urllib2.Request('http://www.hogehoge.jp/update_ss.php', data)
req.add_header('Content-Type', 'multipart/form-data;  boundary=%s' % boundary)
print urllib2.urlopen(req).read()
