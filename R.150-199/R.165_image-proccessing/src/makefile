C_SRCS := main.c
C_OBJ := main.o lib.o
#C_OBJ := main.o
C_EXE := main.exe

INC:=	-I.
#INC:=	-I./include

DEPS:=	lib.h

#LIBS:=	-lopenjp2

#LIBS_DIR:=	-LC:/WORKS/Downloads/openjpeg-2.1.0-win32-x86/lib

RM	:= del

#$(C_EXE): %.o
#	gcc -o $@ $^ $(INC)
$(C_EXE): $(C_OBJ)
	gcc -o $@ $^ $(INC)

#REF http://www.cs.colby.edu/maxwell/courses/tutorials/maketutor/
#REF "the $< is the first item in the dependencies list"
#REF "the -o $@ says to put the output of the compilation in the file named on the left side of the :"
%.o: %.c $(DEPS)

	gcc -c -o $@ $< $(INC)


## All Target
#all: $(C_EXE)
#
#
#
#$(C_EXE): make_obj
#
#	echo "linking..."
#	
#	gcc $(LIBS_DIR) -o $(C_EXE) $(C_OBJ) $(LIBS)  $(INC)
#	
#make_obj:
#
#	echo "creating obj files..."
#	
#	gcc -c $(C_SRCS) -o $(C_OBJ) $(INC)
#	
clean:
	
	$(RM) $(C_OBJ)
#	