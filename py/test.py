import smtplib
import sys
x = sys.argv[1]
print("hey ",x)
y = sys.argv[2]
print("hey ",y)

# creates SMTP session
s = smtplib.SMTP('smtp.gmail.com', 587)
  
# start TLS for security
s.starttls()
  
# Authentication
s.login("placementtrainingkj@gmail.com", "testkj23$")
  
# message to be sent
message = ('''Hello,
This email is from the placement training group.
One of your student has requested for a meeting for counselling. Email id of that student is {}'''.format(y) )
  
# sending the mail
s.sendmail("placementtrainingkj@gmail.com", x , message)
  
# terminating the session
s.quit()




