package br.com.victorblq.domain.controller;

import java.io.IOException;
import java.io.InputStream;
import java.nio.file.Files;
import java.nio.file.Paths;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;

public class UploadsController {
	
	private String imageUploadPath;
	
	public ResponseEntity<InputStream> getImage(@PathVariable("imageName") String imageName) throws IOException {
		InputStream imageInputStream = Files.newInputStream(Paths.get(this.imageUploadPath+"/"+imageName));
		
		return new ResponseEntity<InputStream>(imageInputStream, HttpStatus.OK);
	}
}
