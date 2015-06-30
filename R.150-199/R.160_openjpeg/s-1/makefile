#C_SRCS := test.c convert.c
C_SRCS := test.c
C_SRCS_2 := convert.c
#C_SRCS := main.cpp
C_OBJ := main.o
C_OBJ_2 := convert.o
C_EXE := main.exe

#DRAWSTUFF_OBJ	:= C:\ode-0.11.1\build\ODE_D_2\obj\DebugDoubleLib\ODE_D_2\drawstuff\src\resources.res

#INC:=	-IC:/WORKS/WS/WS_Research/R.150-199/R.160_openjpeg/s-1/include
INC:=	-I./include
#INC:=	-Iinclude
#INC:=	-IC:\ode-0.11.1\include

LIBS:=	-lopenjp2
#LIBS:=	-lode_doubled -ldrawstuffd -luser32 -lwinmm -lgdi32 -lopengl32 -lglu32
#LIBS:=	-ldrawstuffd

LIBS_DIR:=	-LC:/WORKS/Downloads/openjpeg-2.1.0-win32-x86/lib
#LIBS_DIR:=	-LC:\WORKS\Downloads\openjpeg-2.1.0-win32-x86\lib
#LIBS_DIR:=	-LC:\WORKS\Downloads\openjpeg-2.1.0-win32-x86\lib -LC:\WORKS\Downloads\openjpeg-2.1.0-win32-x86\bin
#LIBS_DIR:=	C:\WORKS\Downloads\openjpeg-2.1.0-win32-x86\lib

RM	:= del

# All Target
all: $(C_EXE)
#all: make_obj
#all: clean ODE_D_2.exe



$(C_EXE): make_obj
#ODE_D_2.exe: make_obj
#ODE_D_2.exe: $(OBJS) $(USER_OBJS)
	
	echo "linking..."
	
#	gcc $(LIBS_DIR) -o $(C_EXE) $(C_OBJ) $(LIBS)  $(INC)
	gcc $(LIBS_DIR) -o $(C_EXE) $(C_OBJ) $(C_OBJ_2) $(LIBS)  $(INC)
	
#	gcc -L$(LIBS_DIR) -o $(C_EXE) $(C_OBJ) $(LIBS)  $(INC)
#	gcc -L$(LIBS_DIR) -o $(C_EXE) $(C_OBJ) $(LIBS)
#	g++ -L"C:\ode-0.11.1\lib\DebugDoubleLib" -o "ODE_D_2.exe" $(C_OBJ) $(DRAWSTUFF_OBJ) $(LIBS)
	
#	g++.exe -L..\..\lib\DebugDoubleLib -o ..\..\ode_executables\DebugDoubleLib\ODE_D_2.exe  obj\DebugDoubleLib\ODE_D_2\build\ODE_D_2\main.o obj\DebugDoubleLib\ODE_D_2\drawstuff\src\resources.res  -lode_doubled -ldrawstuffd -luser32 -lwinmm -lgdi32 -lopengl32 -lglu32
	
#	g++ $(C_SRCS) $(INC) -S -o $(C_OBJ)
#	@echo 'Building target: $@'
#	@echo 'Invoking: MinGW C++ Linker'
#	g++ -L"C:\ode-0.11.1\lib\DebugDoubleLib" -o "ODE_D_2.exe" $(OBJS) $(USER_OBJS) $(LIBS)
#	@echo 'Finished building target: $@'
#	@echo ' '

make_obj:

	echo "creating obj files..."
	
#	echo g++ $(C_SRCS) $(INC) -S -o $(C_OBJ)

	gcc -c $(C_SRCS) -o $(C_OBJ) $(INC)
	gcc -c $(C_SRCS_2) -o $(C_OBJ_2) $(INC)
	
#	gcc -c $(C_SRCS) -o $(C_OBJ)
#	g++ -g -D_DEBUG -DdDOUBLE -DWIN32 $(C_SRCS) $(INC) -c -o $(C_OBJ)
#	g++ -g -D_DEBUG -DdDOUBLE -DWIN32 $(C_SRCS) $(INC) -S -o $(C_OBJ)
	
	
clean:
	
	$(RM) $(C_OBJ)
	