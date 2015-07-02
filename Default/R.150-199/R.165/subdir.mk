################################################################################
# Automatically-generated file. Do not edit!
################################################################################

# Add inputs and outputs from these tool invocations to the build variables 
C_SRCS += \
../R.150-199/R.165/main.c 

OBJS += \
./R.150-199/R.165/main.o 

C_DEPS += \
./R.150-199/R.165/main.d 


# Each subdirectory must supply rules for building sources it contributes
R.150-199/R.165/%.o: ../R.150-199/R.165/%.c
	@echo 'Building file: $<'
	@echo 'Invoking: GCC C Compiler'
	gcc -I"C:\MinGW\mingw32\i686-w64-mingw32\include" -O2 -g -Wall -c -fmessage-length=0 -MMD -MP -MF"$(@:%.o=%.d)" -MT"$(@:%.o=%.d)" -o "$@" "$<"
	@echo 'Finished building: $<'
	@echo ' '


