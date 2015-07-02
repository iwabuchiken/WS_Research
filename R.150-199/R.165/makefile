C_SRCS := main.c
C_OBJ := main.o
C_EXE := main.exe

INC:=	-I./include

#LIBS:=	-lopenjp2

#LIBS_DIR:=	-LC:/WORKS/Downloads/openjpeg-2.1.0-win32-x86/lib

RM	:= del

# All Target
all: $(C_EXE)



$(C_EXE): make_obj

	echo "linking..."
	
	gcc $(LIBS_DIR) -o $(C_EXE) $(C_OBJ) $(LIBS)  $(INC)
	
make_obj:

	echo "creating obj files..."
	
	gcc -c $(C_SRCS) -o $(C_OBJ) $(INC)
	
clean:
	
	$(RM) $(C_OBJ)
	