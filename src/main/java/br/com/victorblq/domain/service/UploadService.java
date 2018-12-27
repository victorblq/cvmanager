package br.com.victorblq.domain.service;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.StandardCopyOption;

import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

@Service
public class UploadService {
	
	public String store(MultipartFile file, Path path) {
		try {
			Files.copy(file.getInputStream(), path.resolve(file.getOriginalFilename()), StandardCopyOption.REPLACE_EXISTING);
			
			return file.getOriginalFilename();
		} catch (IOException e) {
			e.printStackTrace();
			throw new RuntimeException("Fail to store the file!");
		}
	}

	public void initImageDir(Path path) {
		try {
			if(!Files.exists(path) || !Files.isDirectory(path)) {
				Files.createDirectories(path);
			}
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
}