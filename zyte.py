import glob
import os
print('======================================================================')
print('|#| ███████╗██╗   ██╗████████╗███████╗ |#|         zyte v.0        |#|')
print('|#| ╚══███╔╝╚██╗ ██╔╝╚══██╔══╝██╔════╝ |#| ----------------------- |#|')
print('|#|   ███╔╝  ╚████╔╝    ██║   █████╗   |#| Create Javascript based |#| ')
print('|#|  ███╔╝    ╚██╔╝     ██║   ██╔══╝   |#| Micro Web Applications! |#|')
print('|#| ███████╗   ██║      ██║   ███████╗ |#| ----------------------- |#|')
print('|#| ╚══════╝   ╚═╝      ╚═╝   ╚══════╝ |#| (c) Bryce Mercines 2016 |#|')
print('======================================================================')



# init()
# check the current

#list of registered commands
cmd = ["build","test","exit","init","help"]
 
print("zyte compiler commands = |build|test|exit|init|help\n") 

command = input("zyte:>")

#commands

def build( ):
	print("======================================================================")
	print("|#|                       Building zyte app                        |#|")
	print("======================================================================")
	print("\n")
#build HTML files	
for filename in glob.iglob('./*.html'):
     print("▲"+filename)
     print("compiling....")
     # remove backslash
     file = filename.replace('.\\','')
     with open(file, 'r') as xfile:
          htmldata = xfile.read()
     # start validating data files
     

# create build folder
if not os.path.isdir("build"):
       os.makedirs("build") 



def kernel( cmd ):
	if cmd == "build":
		build( )
	elif cmd == "test":
		print("test is requested")
	elif cmd == "exit":
	    print("exit is requested")
	elif cmd == "init":
	    print("init is requested")
	elif cmd == "help":
	    print("help is requested")        	

if command in cmd:
	kernel( command )
else:
	print(command+" -command not found")



